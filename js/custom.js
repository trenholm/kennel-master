/**
 * Functions that must be initialized when the page loads
 */
$(document).ready(function() {
    // activate the chosen plugin
    $(".chzn-select").chosen();
    // activate the table sorter plug-in
    $(".tablesorter").tablesorter({
        theme : 'bootstrap',
        headerTemplate : '{content} {icon}',
        widgets : ['zebra','columns', 'uitheme']
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
 * 
 */
$('.list-item').on("click", function() {
	// Retrieve the dog details from the list
	$(this).find('td').each(function() {
		var row = $(this).attr("id");
		var val = $(this).html();
		var next = $('#'+row,'#detail-pane');
		next.html(val);
	});

	// store the registration id with the delete button 
	var regID = $(this).find('#registration', this).html();
	var next = $('#btn-remove','#detail-pane');
	next.data("id",regID);

	toggleDetails();	
});

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
