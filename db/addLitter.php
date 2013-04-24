<?php
session_start();

// Retrieve the dame's information and that of her litter from the request
$registration = $_REQUEST['inputRegistration'];
$dame = $_REQUEST['inputDame'];
$sire = $_REQUEST['inputSire'];
$birthdate = $_REQUEST['inputBirthdate'];
$breed = $_REQUEST['inputBreeds'];
$puppies = $_REQUEST['inputPuppies'];

// puppies should be an array each dog's regNum, name, gender, ?callname
// sire, dame, birthdate, breed all provided from above

// SAMPLE MONGODB STATEMENT
// db.drryan_dogs.update({"registration":"95"},{$push:{"litters": {$each: [{"sire":"Father Figure", "birthdate":"2008-12-25", "puppies":["Buster Trenholm", "Deputy Drover"]},{"sire":"Hank the Cowdog", "birthdate":"2010-09-21", "puppies":["Alpha Primus", "Mother Dearest"]}]}}})

// Get the collection name
$username = $_SESSION['username'];
$dbname = $username.'_dogs';

// Connect to the MongoDB
$m = new MongoClient();

// Select the database
$db = $m->kennelmaster;

// Select a collection
$collection = $db->$dbname;

// For each of the puppies
// insert new puppy into the DB
// Store puppy regName (unchanging) in an array

// Then insert the litter meta-info into the dog's litter sub-document
$document = array( 
	"birthdate" => $birthdate
	,"sire" => $sire
	,"breed" => $breed
	,"puppies" => $puppies
);

$collection->update(array('registration' => $registration, 'name' => $dame), $document);

// Insert each puppy into the dog list?!

// Redirect back to the dog-list (dogs.php)
header("Cache-Control: no-cache");
header('Location: ../dogs.php', true, 302);

// TODO: display success message?

?>
