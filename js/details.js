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
});

/**
 * Function to switch the visibility between list and details
 */
function toggleDetails() {
	$("#list-pane").slideToggle();
	$("#detail-pane").slideToggle();
}

/**
 * Give list items the click functionality
 * TODO: implement (hover) CSS for better usability
 */
$('.list-item').on("click", function() {
	// Retrieve the dog details from the list
	displayInformation(this);

	// store the registration id with the delete button 
	var regID = $(this).find('#registration', this).html();
	var next = $('#btn-remove','#detail-pane');
	next.data("id",regID);

	toggleDetails();	
});

/**
 * Function to retrieve the dog details from the given list item (table row)
 * and insert them into the corresponding row
 */
function displayInformation(listItem) {
	// Iterate through each td of the row
	$(listItem).find('td').each(function() {
		var row = $(this).attr("id");
		var val = $(this).html();
		var next = $('#'+row,'#detail-pane');

		// Store the value with the row and display the contents
		next.data('data-store',val);
		next.html(val);
	});

	// Add click-listeners / links to Sire and Dame fields
	$('#dame', '#detail-pane').on("click", function(){
		var dog = findDogFromList($(this).text());
		displayInformation($(dog).parent());
	});
}

/**
 * Function to allow user to remove a dog from the database
 */
$('#btn-remove').on("click", function() {
	var regID = $(this).data("id");
	// Display the confirmation dialog box
	$('#removeDogPanel').modal('show');

	// Execute the removal of the dog
	$('#removeBtn').on("click", function() {
		$.post("db/removeDog.php", {
			'inputRegistration': regID
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
 *
 */
function findDogFromList(name) {
	// toggleDetails();
	var item = $('tr.list-item').find('td#name:contains('+name+')');
	// displayInformation($(item).parent());
	// toggleDetails();
	return item;
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
			var row = $(this).attr("id");
			var next = $('#'+row,'#detail-pane').not('.dog-name').not('#registration');
			var val = next.data('data-store');
			var item = '<input type="text" id="input'+row+'" name="input'+row+'" placeholder="'+row+'" value="'+val+'">';
			next.html(item);
		});

		// Provide the drop-down list of breeds
		$.post("db/getBreeds.php", function(data) { 
			var breed = $('#breed', '#detail-pane');
			var list = jQuery.parseJSON(data);

			var current = breed.data('data-store');

			// Build the select list
			var sel = $('<select class="chzn-select" type="text" id="inputbreed" name="inputbreed" tab-index="-1" data-placeholder="Breed">');
			jQuery.each(list, function(){
				if (this.name == current) {
					sel.append($('<option selected>').attr('value', this.name).text(this.name));
				}
				else {
					sel.append($('<option>').attr('value', this.name).text(this.name));
				}
			});

			// Place the select list in the appropriate row
			breed.html(sel);

			// Ensure the Chosen plugin is active for this drop-down only
		    $("#inputbreed").chosen();

		});
	}
}

/**
 * Function to update the database with changes to the dog's details
 */
function cancelEdit() {	
	// Restore the values to the detail rows
	$('#detail-pane').find('td').each(function() {
		var row = $(this).attr("id");
		var next = $('#'+row,'#detail-pane');
		var val = next.data('data-store');
		next.html(val);
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
		var row = $(this).attr("id");
		var next = $('#'+row,'#detail-pane').not('#registration');
		var oldval = next.data('data-store');
		var newval = $('#input'+row);
		changes[row] = newval.val();
	});

	console.log("{C}", changes);

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
		.done(function() { 
			// If successful, reload the page (with message?)
			console.log("Dog was updated successfully"); 
		})
		.fail(function() {
			// If it fails...
			console.log("Failed to update"); 
		});

	// Restore the values of the detail rows with updated info
	$('#detail-pane').find('td').each(function() {
		var row = $(this).attr("id");
		var next = $('#'+row,'#detail-pane');
		var val = changes[row];
		next.data('data-store', val);
		next.html(val);
	});

	// Update the values of the list rows with updated info
	var item = $('tr.list-item').find('td#registration:contains('+regID+')');
	$(item).siblings().each(function() {
		var row = $(this).attr("id");
		var val = changes[row];
		$(this).data('data-store', val);
		$(this).html(val);
	});

}

/**
 *
 */
function displayLitters(name) {
	$.post("db/getLitters.php", {
		'inputName' : name
	})
	.done(function(data) {
		var list = jQuery.parseJSON(data);
		console.log(list);
	}).fail(function() {

	});
}