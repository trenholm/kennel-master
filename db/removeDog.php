<?php
session_start();

// Retreive the registration of the dog to remove
$registration = $_REQUEST['inputRegistration'];

// Get the collection name
$username = $_SESSION['username'];
$dbname = $username.'_dogs';

// Connect to the MongoDB
$m = new MongoClient();

// Select the database
$db = $m->kennelmaster;

// Select a collection
$collection = $db->$dbname;

// Remove the chosen dog
$collection->remove(array("registration" => $registration), array("justOne" => true));

// If successfully removed the dog
if ($collection) {
	// Redirect back to the dog-list (dogs.php)
	header("Cache-Control: no-cache");
	header('Location: ../dogs.php', true, 302);
	// TODO: display success message?
}
else {
	// Redirect back to the dog-list (dogs.php)
	header("Cache-Control: no-cache");
	header('Location: ../dogs.php', true, 302);
	// TODO: display failure message?
}

?>
