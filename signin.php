<?php

$username = $_REQUEST['inputUsername'];
$password = $_REQUEST['inputPassword'];

$errorMsg = "";
$numRows = "";

// to prevent script injections & attacks
$username = htmlspecialchars($username);
// SALT the password??

// TODO check if user is in database
// check if password matches
// log user in (session)
// redirect user to dashboard (successful)
// FAIL - redirect user to welcome page, highlighting error (username/password) and setting value for username?
// -------- "shake" the login since you failed??

// if successful {
 
// Store the username in the session
session_start();
$_SESSION['username'] = $username;

// Redirect to the dashboard
header("Cache-Control: no-cache");
header('Location: index.php', true, 302);

// }

?>
