<?php
session_start();

// If the user is not logged in, ALWAYS redirect to the welcome page
if ( !isset($_SESSION['username']) ) {
	header("Cache-Control: no-cache");
    header('Location: welcome.php', true, 302);
}

?>
