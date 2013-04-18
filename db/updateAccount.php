<?php
session_start();

// Retrieve the new account information from the request
$username = $_REQUEST['inputUsername'];
$password = $_REQUEST['inputPassword'];
$confirmPassword = $_REQUEST['inputConfirmPassword'];
$email = $_REQUEST['inputEmail'];
$creditCard = $_REQUEST['inputCreditCard'];
$kennelName = $_REQUEST['inputKennelName'];
$address = $_REQUEST['inputAddress'];
$breeds = $_REQUEST['inputBreeds'];

// Get the collection name
$username = $_SESSION['username'];
$dbname = 'users';

// Connect to the MongoDB
$m = new MongoClient();

// Select the database
$db = $m->kennelmaster;

// Select a collection
$collection = $db->$dbname;

// Set up the document to be inserted
$document = array(
	"username" => $username
	,"password" => $password
	,"email" => $email
	,"creditcard" => $creditCard
	,"kennelName" => $kennelName
	,"address" => $address
	,"breeds" => $breeds
);

// Will only update the single document that has the provided registration number
$collection->update(array("username" => $username), $document);

// TODO: display success message?
echo "Successfully updated details!";

?>
