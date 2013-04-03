<?php
// Destroy the session variables
session_start();
session_destroy();

// Redirect to the welcome page
header("Cache-Control: no-cache");
header('Location: welcome.php', true, 302);
?>
