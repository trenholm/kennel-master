/**
 * Functions that must be initialized when the page loads
 */
$(document).ready(function() {
    $(".chzn-select").chosen(); 
    $("#dogTable").tablesorter(); 

    $('.header').on(
    	"click", 
    	function(event) {
    		// by default, no sorting
    		$('i[name="sort"]').removeClass();
    		$('i[name="sort"]').addClass("icon-sort");

    		// if sort descending
    		if ($(this).hasClass("headerSortDown")) {
    			$('i[name="sort"]').removeClass();
    			$('i[name="sort"]').addClass("icon-sort");
    			$('i', this).removeClass();
    			$('i', this).addClass("icon-sort-down");
    		}

    		// if sort ascending
    		if ($(this).hasClass("headerSortUp")) {
    			$('i[name="sort"]').removeClass();
    			$('i[name="sort"]').addClass("icon-sort");
    			$('i', this).removeClass();
    			$('i', this).addClass("icon-sort-up");
    		}
    	}
    );
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

