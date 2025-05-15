<?php
include('../includes/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = new MongoDB\BSON\ObjectId($_POST['id']);

    // Optionally fetch the movie first to remove files
    $movie = $collection->findOne(['_id' => $id]);

    // Delete from MongoDB
    $collection->deleteOne(['_id' => $id]);

    // Optionally remove thumbnail and video files
    if ($movie) {
        $thumbnailPath = '../' . $movie['thumbnail'];
        $videoPath = '../' . $movie['video'];

        if (file_exists($thumbnailPath)) {
            unlink($thumbnailPath);
        }
        if (file_exists($videoPath)) {
            unlink($videoPath);
        }
    }

    // Redirect back to delete page
    header("Location: delete.php");
    exit();
}
?>
