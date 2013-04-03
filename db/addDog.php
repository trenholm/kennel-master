<?php
session_start();

// Retrieve the new dog information from the request
$registration = $_REQUEST['inputRegistration'];
$name = $_REQUEST['inputName'];
$callname = $_REQUEST['inputCallname'];
$gender = $_REQUEST['inputGender'];
$sire = $_REQUEST['inputSire'];
$dame = $_REQUEST['inputDame'];
$dateofbirth = $_REQUEST['inputDateOfBirth'];

// Get the collection name
$username = $_SESSION['username'];
$dbname = $username.'_dogs';

// Connect to the MongoDB
$m = new MongoClient();

// Select the database
$db = $m->kennelmaster;

// Select a collection
$collection = $db->$dbname;

// Insert the dog into the collection
$document = array( 
	"registration" => $registration,
	"name" => $name,
	"callname" => $callname,
	"gender" => $gender,
	"sire" => $sire,
	"dame" => $dame,
	"date_of_birth" => $dateofbirth
);

//$collection->insert($document);

// redirect back to the dog-list (dogs.php)
// display success message?

?>
