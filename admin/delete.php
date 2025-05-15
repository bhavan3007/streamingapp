<?php
include('../includes/db.php');
$result = $collection->find(); // Fetch all movies
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Movies</title>
    <link rel="icon" type="image/png" href="../assests/logo.png">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="a1">
        <img class="a2" src="../assests/logo.png" alt="App Logo">
        <div class="b1">
            <menu class="a3">
                <li><a href="index.php">Home</a></li>
                <li><a href="add.html">Add</a></li>
                <li><a href="update.php">Update</a></li>
                <li class="active">Delete</li>
                <li><a href="manage_users.php">Manage-Users</a></li>
                <li class="logout"><a href="/videostream/auth/">Logout</a></li>
                <img class="a4" src="../assests/admin.jpg">
            </menu>
        </div>
    </div>

    <h4 style="color:white; display: flex; justify-content: space-between; align-items: center;">
        Delete Movies
        <input type="text" id="searchInput" placeholder="Search by title..." 
            style="padding: 6px; border-radius: 30px; margin-left: 30px; border: 1px solid black; width: 200px;">
    </h4>

    <div style="padding: 30px;" id="movieList">
        <?php foreach ($result as $movie): ?>
            <div class="movie-item" style="background:#222; color:white; padding:20px; margin-bottom:20px; border-radius:10px;">
                <h4 class="movie-title"><?php echo htmlspecialchars($movie['title']); ?></h4>
                <p><strong>Type:</strong> <?php echo htmlspecialchars($movie['type']); ?></p>
                <p><strong>Description:</strong> <?php echo htmlspecialchars($movie['description']); ?></p>
                <img src="../<?php echo $movie['thumbnail']; ?>" alt="Thumbnail" width="400px"><br><br>
                <form method="POST" action="delete_action.php" 
                      onsubmit="return confirm('Are you sure you want to delete this movie?');">
                    <input type="hidden" name="id" value="<?php echo (string)$movie->_id; ?>">
                    <button type="submit" 
                            style="background:#e50914; padding:10px 20px; color:white; border:none; border-radius:5px;">
                        Delete
                    </button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>

    <script>
    document.getElementById('searchInput').addEventListener('input', function () {
        const query = this.value.toLowerCase();
        const movies = document.querySelectorAll('.movie-item');

        movies.forEach(movie => {
            const title = movie.querySelector('.movie-title').textContent.toLowerCase();
            movie.style.display = title.includes(query) ? 'block' : 'none';
        });
    });
    </script>
</body>
</html>
