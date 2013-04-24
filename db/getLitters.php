<?php
session_start();

// Retrieve the new dog information from the request
$registration = $_REQUEST['inputRegistration'];
$name = $_REQUEST['inputName'];

// Get the collection name
$username = $_SESSION['username'];
$dbname = $username.'_dogs';

// Connect to the MongoDB
$m = new MongoClient();

// Select the database
$db = $m->kennelmaster;

// Select a collection
$collection = $db->$dbname;

// If both registration number and name provided
if ( isset($_REQUEST['inputRegistration']) && isset($_REQUEST['inputName']) ) {
	// Find all litters for specified dog
	$cursor = $collection->find(array('registration' => $registration, 'name' => $name))->sort(array("name" => 1));
}
else {
	// Otherwise retrieve all litters
	$cursor = $collection->find(array("gender" => "Female"))->sort(array("name" => 1));
}

// Store the results in an array (in session!)
$dog = $cursor;

// For retrieval using JSON/JQUERY
$list = array();
foreach ($dog as $document) {
	$list[] = $document;
}
echo json_encode($list);

// Set the cursor back to the top of the list
$dog->rewind();

?>
