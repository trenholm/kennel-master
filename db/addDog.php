<?php
// Retrieve the 


// Connect to the MongoDB
$m = new MongoClient();

// Select the database
$db = $m->kennelmaster;

// Select a collection
$collection = $db->dogs;

// Insert the dog into the collection
//$document = array( "callname" => "DIVA", "gender" => "female");
//$collection->insert($document);

?>
