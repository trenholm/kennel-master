<?php
// retrieve the post data
$username = $_REQUEST['inputUsername'];
$password = $_REQUEST['inputPassword'];
$confirmPassword = $_REQUEST['inputConfirmPassword'];
$email = $_REQUEST['inputEmail'];
$creditCard = $_REQUEST['inputCreditCard'];
$kennelName = $_REQUEST['inputKennelName'];
$address = $_REQUEST['inputAddress'];
$breeds = $_REQUEST['inputBreeds'];

// check if user already exists in the database? (or client-side?)

// TODO need to include the breeds!!
$document = array(
	"username" => $username,
	"password" => $password,
	"email" => $email,
	"creditcard" => $creditCard,
	"kennelName" => $kennelName,
	"address" => $address
);

// if successfully registered, save username to session and redirect to the dashboard
$collection->insert($document);


// Query for the database
$query = array('username'=>$username, 'password'=>$password);

// Select a collection
$collection = $db->users;

// Find everything in the collection (for the logged-in user)
$cursor = $collection->find($query);

// If signed in correctly (i.e. only one result was returned for given username and password)
if ($cursor->count() == 1) {
	// Store the username in the session
	$_SESSION['username'] = $username;

	// Redirect to the dashboard
	header("Cache-Control: no-cache");
	header('Location: index.php', true, 302);
}
// FAIL - redirect user to welcome page, highlighting error (username/password) and setting value for username?
else {
	$_SESSION['error']['message'] = "There was a problem with your username/password combination. Please try again.";
	$_SESSION['error']['username'] = $username;
	// -------- "shake" the login since you failed??
	header('Location: welcome.php', true, 302);
}

?>
