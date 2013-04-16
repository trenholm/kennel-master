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
 * TODO implement hover CSS for better usability
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
 * Function to enable in-place editing
 */
function editAll() {
	var isEditing = $('#btn-edit').data('isEditing');
	if(isEditing) {
		// Change button colour and description
		$('#btn-edit').removeClass('btn-success');
		$('#btn-edit').addClass('btn-info');
		$('#btn-edit').html('<i class="icon-edit"></i> Edit Details');

		// Save any changes made to the database
		saveChanges();

		// Set editing flag to false
		$('#btn-edit').data('isEditing', false);
	}
	else {
		// Change button colour and description
		$('#btn-edit').removeClass('btn-info');
		$('#btn-edit').addClass('btn-success');
		$('#btn-edit').html('<i class="icon-ok"></i> Save Details');

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
			var sel = $('<select class="chzn-select" type="text" id="inputbreed" name="inputbreed" data-placeholder="Breed">');
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

		// Set editing flag to true
		$('#btn-edit').data('isEditing', true);
	}

	// Toggle the visibility of the Cancel Button
	$('#btn-cancel').toggle();
}

/**
 * Function to update the database with changes to the dog's details
 */
function cancelEdit() {	
	// Change button colour and description
	$('#btn-edit').removeClass('btn-success');
	$('#btn-edit').addClass('btn-info');
	$('#btn-edit').html('<i class="icon-edit"></i> Edit Details');
	
	// Restore the values to the detail rows
	$('#detail-pane').find('td').each(function() {
		var row = $(this).attr("id");
		var next = $('#'+row,'#detail-pane');
		var val = next.data('data-store');
		next.html(val);
	});

	// Set editing flag to false
	$('#btn-edit').data('isEditing', false);

	// Toggle the visibility of the Cancel Button
	$('#btn-cancel').hide();
}

/**
 * 
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

	// post changes to updateDogs.php?
	$.post("db/updateDog.php", {
			'inputRegistration': changes['registration']
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
	var par = $('tr.list-item').find('td#registration:contains('+regID+')');
	$(par).siblings().each(function() {
		var row = $(this).attr("id");
		var val = changes[row];
		$(this).data('data-store', val);
		$(this).html(val);
	});

}