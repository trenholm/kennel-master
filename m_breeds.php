<?php
// POTENTIALLY HOW TO CONNECT TO MONGODB ON GPU1
//$m = new MongoClient( "mongodb://gpu1.ddl.ok.ubc.ca:28017" );

// Connect to the MongoDB
$m = new MongoClient();

// Select the database
$db = $m->kennelmaster;

// Select a collection
$collection = $db->breeds;

// Find everything in the collection
$cursor = $collection->find();

// iterate through the results
foreach ($cursor as $document) {
        echo $document['name'] . " <br />";
}

?>
