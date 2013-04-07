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
	$(this).find('td').each(function() {
		var row = $(this).attr("id");
		var val = $(this).html();
		var next = $('#'+row,'#detail-pane');
		next.html(val);
	});

	toggleDetails();	
});