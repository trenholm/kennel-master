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
 * Function to 
 */
function showDogPanel() {
	$("#addDogPanel").slideDown();
	$("#content").slideUp();
	// $("#content").fadeOut();
}

/**
 * Function to 
 */
function hideDogPanel() {
	$("#addDogPanel").slideUp();
	$("#content").slideDown();
	// $("#content").fadeIn();
}

