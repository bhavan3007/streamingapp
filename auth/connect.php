<?php
require __DIR__ . '/../vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$db = $client->movies; // Database name
$usersCollection = $db->users; // User collection
$adminCollection = $db->admin; // Admin collection
?>
