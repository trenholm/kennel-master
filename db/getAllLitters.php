<?php
session_start();

// Get the collection name
$username = $_SESSION['username'];
$dbname = $username.'_dogs';

// Connect to the MongoDB
$m = new MongoClient();

// Select the database
$db = $m->kennelmaster;

// Select a collection
$collection = $db->$dbname;

// Find everything in the collection (for the logged-in user)
$cursor = $collection->find(array("gender" => "Female"))->sort(array("name" => 1));

// Store the results in an array (in session!)
$dogs = $cursor;

// For retrieval using JSON/JQUERY
$list = array();
foreach ($dogs as $document) {
	$list[] = $document;
}
echo json_encode($list);

// Set the cursor back to the top of the list
$dogs->rewind();

?>
