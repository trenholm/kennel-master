/**
* Code for handling interactions on the dog details page
*/

/**
 * Code to run when the document is first ready (initialized)
 */
$(document).ready(function() {
	// Default to not editing the dog details
	$('#btn-edit').data('isEditing', false);
	$('#btn-cancel').hide();

	// Store the contents of each row in a data-store
	$('.list-item').find('td').each(function() {
		var val = $(this).html();
		$(this).data('data-store', val);

		// Hide extra cell contents
		var id = $(this).attr("id");
		if ( id == 'sire' || id == 'dame' || id == 'breed' ) {
			$(this).html('');
		}
	});

	// Activate the quicksearch plugin
	$('input#search').quicksearch('table#dogTable tbody tr', {
        'bind': 'focus keyup keydown'
	});

	// Allow reset button to clear search quickly
	$('#btn-reset').on('click', function() {
        $("#search-bar").triggerHandler("focus");
        $("input#search").val('').focus();
	});

	// While searching, be sure the list of dogs is displaying
	$('#search').on('change', function() {
		cancelEdit();
		if ($("#detail-pane").is(':visible')) {
			toggleDetails();
		}
	});

	// Add the litter section title
	$('#litter-list', '#detail-pane').prepend('<h3>Litters</h3>');

});

/**
 * Give list items the click functionality (click on item, display details)
 * TODO: implement (hover) CSS for better usability
 */
$('.list-item').on("click", function() {
	// Retrieve the dog details from the list
	displayInformation(this);

	// Store the registration id with the delete button 
	var id = $(this).find('#registration', this).html();
	var row = $('#btn-remove','#detail-pane');
	row.data("id", id);

	// Display the details panel
	toggleDetails();	
});

/**
 * Function to allow user to remove a dog from the database
 */
$('#btn-remove').unbind('click').bind('click', function() {
	var id = $(this).data("id");
	// Display the confirmation dialog box
	$('#removeDogPanel').modal('show');

	// Execute the removal of the dog
	$('#removeBtn').unbind('click').bind('click', function() {
		$.post("db/removeDog.php", {
			'inputRegistration': id
		})
		.done(function() { 
			// If successful, reload the page (with message?)
			console.log("Dog was removed"); 
			location.reload(); 
		})
		.fail(function() {
			// If it fails...
			console.log("Failed"); 
		});
	});
});

/**
 * Function to switch the visibility between list and details
 */
function toggleDetails() {
	$("#list-pane").slideToggle();
	$("#detail-pane").slideToggle();
}

/**
 * Function to retrieve the dog details from the given list item (table row)
 * and insert them into the corresponding row
 */
function displayInformation(listItem) {
	// Iterate through each td of the row
	$(listItem).find('td').each(function() {
		var id = $(this).attr("id");
		var row = $('#'+id,'#detail-pane');

		// Store the value with the row and display the contents
		var val = $(this).data('data-store');
		row.data('data-store',val);
		row.html(val);		
	});

	// Add click-listeners / links to Dame & Sire field
	$('#dame, #sire', '#detail-pane').unbind('click').bind('click', function(){
		if ($(this).text()) {
			linkActionToDog($(this).text());
		}
	});

	// Display any litters if appropriate
	var id = $('#registration', '#detail-pane').data('data-store');
	var name = $('#name', '#detail-pane').data('data-store');
	displayLitters(id, name);
}


/**
 * Function to "link" an item/row to the provided dog and display that dog's details
 */
function linkActionToDog(name) {
	var dog = $('tr.list-item').find('td#name:contains('+name+')');
	// Only allow clicking link if NOT editing!
	var isEditing = $('#btn-edit').data('isEditing');
	if (!isEditing) {
		displayInformation($(dog).parent());
	}
}

/**
 * Function to reset the editing options of the dog details page
 */
function resetEditOptions() {
	// Reset the edit button
	$('#btn-edit').removeClass('btn-success');
	$('#btn-edit').addClass('btn-info');
	$('#btn-edit').html('<i class="icon-edit"></i> Edit Details');

	// No longer editing mode
	$('#btn-edit').data('isEditing', false);

	// Hide cancel button
	$('#btn-cancel').hide();
}

/**
 * Function to begin editing dog details
 */
function enterEditMode() {
	// Change button colour and description
	$('#btn-edit').removeClass('btn-info');
	$('#btn-edit').addClass('btn-success');
	$('#btn-edit').html('<i class="icon-ok"></i> Save Details');

	// Set editing flag to true
	$('#btn-edit').data('isEditing', true);

	// Display cencel button
	$('#btn-cancel').show();
}

/**
 * Function to enable in-place editing
 */
function editAll() {
	// Determine if we are in editing mode or not
	var isEditing = $('#btn-edit').data('isEditing');

	if(isEditing) {
		// Save any changes made to the database
		saveChanges();

		// Reset the edit options
		resetEditOptions()
	}
	else {
		// Enter editing details mode
		enterEditMode();

		// Activate input forms where applicable
		$('#detail-pane').find('td').each(function() {
			var id = $(this).attr("id");
			var row = $('#'+id,'#detail-pane').not('.dog-name').not('#registration');
			var val = row.data('data-store');

			var item = $('<input>');
			item.attr('id', 'input'+id);
			item.attr('name', 'input'+id);
			item.attr('placeholder', id);
			item.attr('value', val);
			if (id == 'dateOfBirth') {
				item.attr('type', 'date');
			}
			else {
				item.attr('type', 'text');
			}
			row.html(item);
		});

		// Provide the drop-down list of breeds
		$.post("db/getBreeds.php", function(data) { 
			var breed = $('#breed', '#detail-pane');
			var list = jQuery.parseJSON(data);

			var current = breed.data('data-store');

			// Build the select list
			var select = $('<select>');
			select.attr('class', 'chzn-select');
			select.attr('id', 'inputbreed');
			select.attr('name', 'inputbreed');
			select.attr('tab-index', '-1');
			select.attr('data-placeholder', 'Breed');

			jQuery.each(list, function(){
				if (this.name == current) {
					select.append($('<option selected>').attr('value', this.name).text(this.name));
				}
				else {
					select.append($('<option>').attr('value', this.name).text(this.name));
				}
			});

			// Place the select list in the appropriate row
			breed.html(select);

			// Ensure the Chosen plugin is active for this drop-down only
		    $("#inputbreed").chosen();

		    // Have dropdown for SIRE and DAME potentially???
		});
	}
}

/**
 * Function to update the database with changes to the dog's details
 */
function cancelEdit() {	
	// Restore the values to the detail rows
	$('#detail-pane').find('td').each(function() {
		var id = $(this).attr("id");
		var row = $('#'+id, '#detail-pane');
		var val = row.data('data-store');
		row.html(val);
	});

	// Reset the editing options (exit edit mode)
	resetEditOptions();
}

/**
 * Function to save the changes by the user to the database and update the details and lists to reflect the modifications
 */
function saveChanges() {

	// Array to store changes
	var changes = new Array();
	var regItem = $('#registration','#info-section');
	var regID = regItem.data('data-store');

	// Capture the user's input changes
	$('#detail-pane').find('td').each(function() {
		var id = $(this).attr("id");
		var row = $('#'+id,'#detail-pane').not('#registration');
		var oldval = row.data('data-store');
		var newval = $('#input'+id);
		changes[id] = newval.val();
	});

	// Send the changes to the database
	$.post("db/updateDog.php", {
			'inputRegistration': regID
			,'inputName' : changes['name']
			,'inputCallname' : changes['callname']
			,'inputGender' : changes['gender']
			,'inputSire' : changes['sire']
			,'inputDame' : changes['dame']
			,'inputDateOfBirth' : changes['dateOfBirth']
			,'inputBreeds' : changes['breed']
		})
		.done(function(results) { 
			// If successful, reload the page (with results message?)
			console.log(results); 
		})
		.fail(function() {
			// If it fails...
			console.log("Failed to update"); 
		});

	// Restore the values of the detail rows with updated info
	$('#detail-pane').find('td').each(function() {
		var id = $(this).attr("id");
		var row = $('#'+id,'#detail-pane');
		var val = changes[id];
		row.data('data-store', val);
		row.html(val);
	});

	// Update the values of the list rows with updated info
	var item = $('tr.list-item').find('td#registration:contains('+regID+')');
	$(item).siblings().each(function() {
		var id = $(this).attr("id");
		var val = changes[id];
		$(this).data('data-store', val);
		$(this).html(val);
	});

}

/**
 * Function to display litters
 */
function displayLitters(id, name) {
	// Ensure previous litter list is hidden
	$('#litter-list', '#detail-pane').hide();

	// If female, then display any litters she has
	if ($('#gender', '#detail-pane').data('data-store') == 'Female') {

		// Retreive the litters from the database
		$.post("db/getAllLitters.php")
		.done(function(results) {
			var data = jQuery.parseJSON(results);
			console.log(data);
			var table = $('table','#litter-list');
			if(data) {
				$(data).each(function() {
					var dame = this['name'];
					var breed = this['breed'];

					// Fill the litters table with the relevant information
					$(this['litters']).each(function() {
						var sire = this['sire'];
						var birthdate = this['birthdate'];
						var puppies = this['puppies'];
						var row = $('<tr>');
						row.append('<td>'+dame+'</td>');
						row.append('<td>'+birthdate+'</td>');
						row.append('<td>'+breed+'</td>');
						row.append('<td>'+sire+'</td>');
						var list = $('<ul>').attr('class', 'inline');
						$(puppies).each(function() {
							var item = $('<li>').html(this+',');
							// TODO: allow linking of puppy to rest of dog list??
							list.append(item);
						});
						row.append($('<td>').attr('colspan',6).html(list));
						table.append(row);
					});
				});
			}
			else {
				// Erase any previous litters
				table.html('');
				table.append('<tr><td><em>No litters found.</em></td></tr>');
			}
		}).fail(function() {
			console.log("No litters?");
		});

		// Make the litter list visible
		$('#litter-list', '#detail-pane').show();
	}
}