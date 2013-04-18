<?php
// Connect to the MongoDB
$m = new MongoClient();

// Select the database
$db = $m->kennelmaster;

// Select a collection
$collection = $db->breeds;

// Find everything in the collection
$cursor = $collection->find()->sort(array("name" => 1));

// Store the results in an array (in session!?)
$breeds = $cursor;

// For retrieval using JSON/JQUERY
$list = array();
foreach ($breeds as $document) {
    $list[] = array('_id'=>$document['_id'], 'name'=>$document['name']);
}
echo json_encode($list);

// Set the cursor back to the top of the list
$breeds->rewind();

?>
