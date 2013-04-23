/**
* Code for handling interactions on the dog details page
*/

/**
 * Code to run when the document is first ready (initialized)
 */
$(document).ready(function() {
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

	// Display the litters
	displayLitters();
});

/**
 * Function to display litters
 */
function displayLitters() {
	// Retreive the litters from the database
	$.post("db/getAllLitters.php")
	.done(function(results) {
		var data = jQuery.parseJSON(results);
		console.log(data);
		var table = $('table','#litter-list');
		if(data) {
			$(data).each(function() {
				// Fill the litters table with the relevant information
				var dame = this['name'];
				$(this['litters']).each(function() {
					var sire = this['sire'];
					var birthdate = this['birthdate'];
					var puppies = this['puppies'];
					var row = $('<tr>');
					row.append('<th>Date:</th><td>'+birthdate+'</td>');
					row.append('<th>Dame:</th><td>'+dame+'</td>');
					row.append('<th>Sire:</th><td>'+sire+'</td>');
					var list = $('<ul>').attr('class', 'inline');
					$(puppies).each(function() {
						var item = $('<li>').html(this+',');
						// TODO: allow linking of puppy to rest of dog list??
						list.append(item);
					});
					var pups = $('<tr>').append('<td>').attr('colspan',6).html(list);
					table.append(row, pups);
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
}