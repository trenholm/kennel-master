/**
* Code for handling interactions on the dog details page
*/

/**
 * Code to run when the document is first ready (initialized)
 */
$(document).ready(function() {
	
	// Display the account information
	displayInformation();
});

/**
 * Function to retrieve the dog details from the given list item (table row)
 * and insert them into the corresponding row
 */
function displayInformation() {
	// Provide the drop-down list of breeds
		$.post("db/getAccount.php", function(data) { 
			var results = jQuery.parseJSON(data);
			console.log('[Results]', results);

			var breeds = $('<ul>').attr('class', 'inline');
			$.each(results['breeds'], function() {
				// var item = $('<span>').attr('class', 'label').text(this);
				breeds.append($('<li>').html(this));
			});
			$('#breeds').data('data-store', results['breeds']);
			$('#breeds').html(breeds);

			console.log($('#breeds').data('data-store'));


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

	// // Iterate through each td of the row
	// $(listItem).find('td').each(function() {
	// 	var id = $(this).attr("id");
	// 	var row = $('#'+id,'#detail-pane');

	// 	// Store the value with the row and display the contents
	// 	var val = $(this).data('data-store');
	// 	row.data('data-store',val);
	// 	row.html(val);		
	// });

	// // Add click-listeners / links to Sire and Dame fields
	// $('#dame', '#detail-pane').on("click", function(){
	// 	var dog = findDogFromList($(this).text());
	// 	displayInformation($(dog).parent());
	// });

	// // Display any litters if appropriate
	// var id = $('#registration', '#detail-pane').data('data-store');
	// var name = $('#name', '#detail-pane').data('data-store');
	// displayLitters(id, name);
}