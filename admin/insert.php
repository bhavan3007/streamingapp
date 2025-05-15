<?php
require '../includes/db.php';

// File upload paths
$thumb = $_FILES['thumbnail']['name'];
$video = $_FILES['video']['name'];

$thumbPath = "../uploads/thumbs/" . basename($thumb);
$videoPath = "../uploads/videos/" . basename($video);

// Move files to their destinations
move_uploaded_file($_FILES['thumbnail']['tmp_name'], $thumbPath);
move_uploaded_file($_FILES['video']['tmp_name'], $videoPath);

// Insert into MongoDB
$collection = $db->movies;
$collection->insertOne([
    'title' => $_POST['title'],
    'description' => $_POST['description'],
    'type' => $_POST['movietype'],
    'thumbnail' => substr($thumbPath, 3),  // remove ../
    'video' => substr($videoPath, 3),
    'uploaded_at' => new MongoDB\BSON\UTCDateTime()
]);

echo "Movie uploaded successfully!";
// After inserting the movie successfully
header("Location: add.html?success=1");
exit();

?>
