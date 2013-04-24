/**
 * Functions that must be initialized when the page loads
 */
$(document).ready(function() {
    // Activate the chosen plugin where required
    $('.chzn-select', '#addLitterPanel').chosen();
    $('.chzn-select', '#addDogPanel').chosen();
    $(".chzn-select").chosen();

    // activate the table sorter plug-in
    $(".tablesorter").tablesorter({
        theme : 'bootstrap',
        headerTemplate : '{content} {icon}',
        widgets : ['zebra','columns', 'uitheme']
    });


    // Disable press enter to submit for in-line search forms
    $('.form-search').keypress(function(e) {
        if (e.which == 13) {
            e.preventDefault();
            return false;
        }
    });
});

