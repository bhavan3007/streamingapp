<?php
include('../includes/db.php');
$id = $_GET['id'];
$movie = $collection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Movie</title>
    <link rel="icon" type="image/png" href="../assests/logo.png">
    <link rel="stylesheet" type="text/css" href="addstyle.css">
</head>
<body>
<div class="a1">
    <img class="a2" src="../assests/logo.png" alt="App Logo">
    <div class="b1">
        <menu class="a3">
            <li><a href="index.php">Home</a></li>
            <li><a href="add.html">Add</a></li>
            <li class="active">Update</li>
            <li><a href="delete.php">Delete</a></li>
            <li><a href="manage_users.php">Manage-Users</a></li>
            <li class="logout"><a href="/videostream/auth/">Logout</a></li>
            <img class="a4" src="../assests/admin.jpg">
        </menu>
    </div>
</div>

<div class="form-container">
    <form action="update_process.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <label for="title">Movie Title</label>
        <input type="text" id="title" name="title" value="<?php echo $movie['title']; ?>" required><br>

        <label for="description">Movie Description</label>
        <textarea id="description" name="description" required><?php echo $movie['description']; ?></textarea><br>

        <label for="movietype">Movie Type</label>
        <select id="movietype" name="movietype" required>
            <option value="">-- Select a genre --</option>
            <?php
                $types = ['Horror', 'Action', 'Romance', 'Thriller'];
                foreach ($types as $type) {
                    $selected = ($movie['type'] == $type) ? 'selected' : '';
                    echo "<option value='$type' $selected>$type</option>";
                }
            ?>
        </select>

        <p>Current Thumbnail:</p>
        <img src="../<?php echo $movie['thumbnail']; ?>" alt="Thumbnail" width="200px"><br><br>

        <label for="thumbnail">Update Thumbnail Image (optional)</label>
        <input type="file" id="thumbnail" name="thumbnail" accept="image/*"><br>

        <label for="video">Update Video File (optional)</label>
        <input type="file" id="video" name="video" accept="video/*"><br>

        <button type="submit">Update Movie</button>
    </form>
</div>
</body>
</html>
