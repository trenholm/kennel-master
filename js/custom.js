$(".chzn-select").chosen();


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