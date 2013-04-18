<?php
session_start();

// Retrieve the username/password from the POST request
$username = $_REQUEST['inputUsername'];
$password = $_REQUEST['inputPassword'];

// Query for the database
$query = array('username'=>$username, 'password'=>$password);
$dbname = 'users';

// to prevent script injections & attacks
// $username = htmlspecialchars($username);
// TODO SALT the password??

// Connect to the MongoDB
$m = new MongoClient();

// Select the database
$db = $m->kennelmaster;

// Select a collection
$collection = $db->$dbname;

// Find everything in the collection (for the logged-in user)
$cursor = $collection->find($query);

// If signed in correctly (i.e. only one result was returned for given username and password)
if ($cursor->count() == 1) {
	// Store the username in the session
	$_SESSION['username'] = $username;

	// Redirect to the dashboard
	header("Cache-Control: no-cache");
	header('Location: ../index.php', true, 302);
}
// FAIL - redirect user to welcome page, highlighting error (username/password) and setting value for username?
else {
	$_SESSION['error']['message'] = "There was a problem with your username/password combination. Please try again.";
	$_SESSION['error']['username'] = $username;
	// -------- "shake" the login since you failed??
	header('Location: ../welcome.php', true, 302);
}


?>
