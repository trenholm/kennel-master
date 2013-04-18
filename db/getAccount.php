<?php
session_start();

// Get the collection name
$username = $_SESSION['username'];
$dbname = 'users';

// Connect to the MongoDB
$m = new MongoClient();

// Select the database
$db = $m->kennelmaster;

// Select a collection
$collection = $db->$dbname;

// Find everything in the collection (for the logged-in user)
$cursor = $collection->find(array('username'=>$username));

// Store the results in an array (in session!?)
$account = $cursor;

// For retrieval using JSON/JQUERY
$result = array();
foreach ($account as $document) {
	$result = array(
		"username" => $document['username']
		,"password" => $document['password']
		,"email" => $document['email']
		,"creditcard" => $document['creditcard']
		,"kennelName" => $document['kennelName']
		,"address" => $document['address']
		,"breeds" => $document['breeds']
	);
}
echo json_encode($result);

// Set the cursor back to the top of the list
$account->rewind();

?>
