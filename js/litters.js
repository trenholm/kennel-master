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

    // Activate the table sorter plug-in
    $("#litterTable").tablesorter({
        theme : 'bootstrap',
        headerTemplate : '{content} {icon}',
        widgets : ['zebra','columns', 'uitheme']
    });
});

/**
 * Function to display litters
 */
function displayLitters() {
	// Retreive the litters from the database
	$.post("db/getLitters.php")
	.done(function(results) {
		var data = jQuery.parseJSON(results);
		console.log(data);
		var table = $('table','#litter-list');
		// Erase any previous litters
		table.html('');
		if(data) {
			// Add the table headers
			var head = $('<tr>');
			head.append('<th>Dame</th>');
			head.append('<th>Birthdate</th>');
			head.append('<th>Breed</th>');
			head.append('<th>Sire</th>');
			head.append('<th>Puppies</th>');
  			table.append($('<thead>').append(head));

  			// For each row of data
			$(data).each(function() {
				var dame = this['name'];
				var breed = this['breed'];

				if (this['litters']) {
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
						var list = $('<td>');
						$(puppies).each(function() {
							list.append(this+', ');
						});
						row.append(list);
						table.append(row);
					});
				}
			});
		}
		else {
			table.append('<tr><td><em>No litters found.</em></td></tr>');
		}
	}).fail(function() {
		console.log("No litters?");
	});
}