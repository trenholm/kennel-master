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
 * Function to switch between list and details
 */
function toggleDetails() {
	$("#list-pane").toggle("slide", {direction: 'left'});
    $("#detail-pane").toggle("slide", {direction: 'right'});
}