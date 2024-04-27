<?php
require_once __DIR__ . "/vendor/autoload.php";
$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->dbforlabs->computers;
$cursor = $collection->find();
foreach ($cursor as $document) {
    print_r($document); echo "<br>";
}
