<?php
include('../includes/db.php');

$id = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];
$type = $_POST['movietype'];

$updateFields = [
    'title' => $title,
    'description' => $description,
    'type' => $type
];

// Handle new thumbnail upload
if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] == 0) {
    $thumbPath = 'uploads/thumbs/' . basename($_FILES['thumbnail']['name']);
    move_uploaded_file($_FILES['thumbnail']['tmp_name'], "../" . $thumbPath);
    $updateFields['thumbnail'] = $thumbPath;
}

// Handle new video upload
if (isset($_FILES['video']) && $_FILES['video']['error'] == 0) {
    $videoPath = 'uploads/videos/' . basename($_FILES['video']['name']);
    move_uploaded_file($_FILES['video']['tmp_name'], "../" . $videoPath);
    $updateFields['video'] = $videoPath;
}

$collection->updateOne(
    ['_id' => new MongoDB\BSON\ObjectId($id)],
    ['$set' => $updateFields]
);

header("Location: update.php");
exit;
