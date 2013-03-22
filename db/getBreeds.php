<?php
// Connect to the MongoDB
$m = new MongoClient();

// Select the database
$db = $m->kennelmaster;

// Select a collection
$collection = $db->breeds;

// Find everything in the collection
$cursor = $collection->find();

// Store the results in an array (in session!)
$breeds = $cursor;

// TEMP: iterate through the results
foreach ($cursor as $document) {
        echo $document['name'] . " <br />";
}

?>
