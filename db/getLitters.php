<?php
session_start();

// Retrieve the new dog information from the request
$registration = $_REQUEST['inputRegistration'];
$name = $_REQUEST['inputName'];

// Get the collection name
$username = $_SESSION['username'];
$dbname = $username.'_litters';

// Connect to the MongoDB
$m = new MongoClient();

// Select the database
$db = $m->kennelmaster;

// Select a collection
$collection = $db->$dbname;

// Find everything in the collection (for the logged-in user)
$cursor = $collection->find(array("registration" => $registration, "name" => $name));

// Store the results in an array (in session!)
$litters = $cursor;

// For retrieval using JSON/JQUERY
$list = array();
foreach ($litters as $document) {
    $list[] = array('name'=>$document['name']);
}
echo json_encode($list);

// Set the cursor back to the top of the list
$litters->rewind();

?>
