<?php
require __DIR__ . '/../vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");

// Select database
$db = $client->movies; // database name

// Existing movies collection
$collection = $db->movies;

// New users collection (for login/registration)

