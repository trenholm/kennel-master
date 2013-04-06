<?php
session_start();

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
$cursor = $collection->find();

// Store the results in an array (in session!)
$litters = $cursor;

?>
