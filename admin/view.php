<?php
require('../includes/db.php');

$id = $_GET['id'];
$movie = $collection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $movie['title']; ?> - Watch</title>
</head>
<body style="background-color: #222; color: white; padding: 20px;">
    <h1><?php echo $movie['title']; ?></h1>
    <p><?php echo $movie['description']; ?> (<?php echo $movie['type']; ?>)</p>

    <video width="720" controls>
        <source src="../<?php echo $movie['video']; ?>" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</body>
</html>
