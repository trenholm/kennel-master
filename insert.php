<?php
// Connect to the MongoDB
$m = new MongoClient();

// Select the database
$db = $m->kennelmaster;

// Select a collection
$collection = $db->dogs;

// Add records
$document = array(
	"registration" => 1,
	"name" => "chaizels i m de deeva",
	"callname" => "diva",
	"gender" => "female",
	"dame" => 2,
	"sire" => 3,
	"date_of_birth" => "2002-04-23"
);
$collection->insert($document);

?>
