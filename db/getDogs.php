<?php
// Connect to the MongoDB
$m = new MongoClient();

// Select the database
$db = $m->kennelmaster;

// Select a collection
$collection = $db->dogs;

// Find everything in the collection (for the logged-in user)
$cursor = $collection->find();

// Store the results in an array (in session!)
$dogs = $cursor;

?>
