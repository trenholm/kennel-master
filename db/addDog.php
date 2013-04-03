<?php
// Retrieve the new dog information from the request
$registration = $_REQUEST['inputRegistration'];
$name = $_REQUEST['inputName'];
$callname = $_REQUEST['inputCallname'];
$gender = $_REQUEST['inputGender'];
$sire = $_REQUEST['inputSire'];
$dame = $_REQUEST['inputDame'];
$dateofbirth = $_REQUEST['inputDateOfBirth'];

// username (i.e. the dog owner!!)
$username = $_SESSION['username'];

// Connect to the MongoDB
$m = new MongoClient();

// Select the database
$db = $m->kennelmaster;

// Select a collection
$collection = $db->dogs;

// Insert the dog into the collection
$document = array( 
	"registration" => $registration,
	"name" => $name,
	"callname" => $callname,
	"gender" => $gender,
	"sire" => $sire,
	"dame" => $dame,
	"dateOfBirth" => $dateofbirth,
	"user" => $username
);

//$collection->insert($document);

// redirect back to the dog-list (dogs.php)
// display success message?

?>
