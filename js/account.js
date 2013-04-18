/**
* Code for handling interactions on the dog details page
*/

/**
 * Code to run when the document is first ready (initialized)
 */
$(document).ready(function() {
	$('#btn-edit').data('isEditing', false);
	$('#btn-cancel').hide();
	
	$('#btn-edit').on('click', function() {
		console.log("edit button clicked");
		//editAccount();
	});
	$('#btn-cancel').on('click', function() {
		console.log("cancel button clicked");
		//resetAccount();
	});

	// Display the account information
	displayInformation();
});

/**
 * Function to retrieve the dog details from the given list item (table row)
 * and insert them into the corresponding row
 */
function displayInformation() {
	// Retrieve the account information from the database
	$.post("db/getAccount.php", function(data) { 
		var results = jQuery.parseJSON(data);
		console.log('[Results]', results);

		// Display the username
		$('#username').html(results['username']);
		$('#username').data('data-store', results['username']);

		// Display the kennel name
		if (results['kennelName']) {
			$('#kennelName').data('data-store', results['kennelName']);
			$('#kennelName').html(results['kennelName']);			
		}
		else {
			$('#kennelName').html('<em>Not provided.</em>');
		}

		// Display the kennel address
		if (results['address']) {
			$('#address').data('data-store', results['address']);
			$('#address').html(results['address']);			
		}
		else {
			$('#address').html('<em>Not provided.</em>');
		}

		// Display list of breeds
		if (results['breeds']) {
			var breeds = $('<ul>').attr('class', 'inline');
			$.each(results['breeds'], function() {
				breeds.append($('<li>').html(this+','));
			});
			$('#breeds').data('data-store', results['breeds']);
			$('#breeds').html(breeds);
		} 
		else {
			$('#breeds').html('<em>None selected.</em>');
		}


		// Display the account email address
		if (results['email']) {
			$('#email').data('data-store', results['email']);
			$('#email').html(results['email']);			
		}
		else {
			$('#email').html('<em>Not provided.</em>');
		}

			// var breed = $('#inputBreeds', '#detail-pane');
			// var list = jQuery.parseJSON(data);

			// var current = breed.data('data-store');

			// // Build the select list
			// var sel = $('<select class="chzn-select" type="text" id="inputbreed" name="inputbreed" tab-index="-1" data-placeholder="Breed">');
			// jQuery.each(list, function(){
			// 	if (this.name == current) {
			// 		sel.append($('<option selected>').attr('value', this.name).text(this.name));
			// 	}
			// 	else {
			// 		sel.append($('<option>').attr('value', this.name).text(this.name));
			// 	}
			// });

			// // Place the select list in the appropriate row
			// breed.html(sel);

			// // Ensure the Chosen plugin is active for this drop-down only
		 //    $("#inputbreed").chosen();

	});
}

function editAccount() {
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
		$('#kennel-section').find('td').each(function() {
			var id = $(this).attr("id");
			var row = $('td#'+id,'#kennel-section').not('#breeds');
			var val = row.data('data-store');
			var item = '<input type="text" id="input'+id+'" name="input'+id+'" placeholder="'+id+'" value="'+val+'">';
			row.html(item);
		});

		// Activate input forms where applicable
		$('#account-section').find('td').each(function() {
			var id = $(this).attr("id");
			var row = $('td#'+id,'#account-section').not('#username');
			var val = row.data('data-store');
			var item = '<input type="text" id="input'+id+'" name="input'+id+'" placeholder="'+id+'" value="'+val+'">';
			row.html(item);
		});

		// Provide the drop-down list of breeds
		$.post("db/getBreeds.php", function(data) { 
			var breed = $('#breeds', '#kennel-section');
			var list = jQuery.parseJSON(data);

			var current = breed.data('data-store');

			// Build the select list
			var sel = $('<select class="chzn-select select-breeds" type="text" multiple="multiple" id="inputbreed[]" name="inputbreed[]" tab-index="-1" data-placeholder="Breed">');
			jQuery.each(list, function(){
				// If one of the breeds already selected, show it as such
				if ($.inArray(this.name, current)) {
					sel.append($('<option selected>').attr('value', this.name).text(this.name));
				}
				else {
					sel.append($('<option>').attr('value', this.name).text(this.name));
				}
			});

			// Place the select list in the appropriate row
			breed.html(sel);

			// Ensure the Chosen plugin is active for this drop-down only
		    $(".select-breeds").chosen();
		});
	}
}

function resetAccount() {
	// Restore the values of the rows
	$('#kennel-section').find('td').each(function() {
		var id = $(this).attr("id");
		var row = $('#'+id, '#kennel-section');
		var val = row.data('data-store');
		row.html(val);

		if (id == 'breeds') {
			var breeds = $('<ul>').attr('class', 'inline');
			$.each(val, function() {
				breeds.append($('<li>').html(this+','));
			});
			row.html(breeds);
		}
	});

	$('#account-section').find('td').each(function() {
		var id = $(this).attr("id");
		var row = $('#'+id, '#account-section');
		var val = row.data('data-store');
		row.html(val);
	});

	// Reset the editing options (exit edit mode)
	resetEditOptions();
}

function saveAccount() {

}


/**
 * Function to reset the editing options of the account details
 */
function resetEditOptions() {
	// Reset the edit button
	$('#btn-edit').removeClass('btn-success');
	$('#btn-edit').addClass('btn-info');
	$('#btn-edit').html('<i class="icon-edit"></i> Edit Account');

	// No longer editing mode
	$('#btn-edit').data('isEditing', false);

	// Hide cancel button
	$('#btn-cancel').hide();
}

/**
 * Function to begin editing account details
 */
function enterEditMode() {
	// Change button colour and description
	$('#btn-edit').removeClass('btn-info');
	$('#btn-edit').addClass('btn-success');
	$('#btn-edit').html('<i class="icon-ok"></i> Save Account');

	// Set editing flag to true
	$('#btn-edit').data('isEditing', true);

	// Display cencel button
	$('#btn-cancel').show();
}