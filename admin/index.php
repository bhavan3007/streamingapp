<?php
include('../includes/db.php');
$result = $collection->find(); // This should now work
?>


<!DOCTYPE html>
<html>
<head>
    <title>Video Streaming App admin</title>
    <link rel="icon" type="image/png" href="../assests/logo.png">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <!-- Navbar -->
    <div class="a1">
        <img class="a2" src="../assests/logo.png" alt="App Logo">
        <div class="b1">
            <menu class="a3">
                <li class="active">Home</li>
                <li><a href="add.html">Add</a></li>
                <li><a href="update.php">Update</a></li>
                <li><a href="delete.php">Delete</a></li>
                <li><a href="manage_users.php">Manage Users</a></li>
                <li class="logout"><a href="/videostream/auth/">Logout</a></li>
                <img class="a4" src="../assests/admin.jpg">
            </menu>
        </div>
    </div>

    <!-- Movie Cards -->
     <h2>Uploaded Movies</h2>
<div class="movie-section">
    <button class="scroll-btn left" onclick="scrollMovies('left')">&#9664;</button>
    
    <div class="movie-scroll-wrapper">
        <div class="movie-scroll-container" id="movieContainer">
            <?php foreach ($result as $movie): ?>
            <div class="movie-card">
                <a href="view.php?id=<?php echo (string)$movie->_id; ?>">
                    <img src="../<?php echo $movie['thumbnail']; ?>" alt="Thumbnail">
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <button class="scroll-btn right" onclick="scrollMovies('right')">&#9654;</button>
</div>
<h3>Dashboard</h3>


<script>
    const container = document.getElementById('movieContainer');
    const leftBtn = document.querySelector('.scroll-btn.left');
    const rightBtn = document.querySelector('.scroll-btn.right');

    // Initially hide the left button
    leftBtn.style.display = 'none';

    function scrollMovies(direction) {
        const scrollAmount = 300;

        if (direction === 'left') {
            container.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
        } else {
            container.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        }

        // After scroll, check position and toggle buttons
        setTimeout(() => {
            if (container.scrollLeft > 0) {
                leftBtn.style.display = 'block';
            } else {
                leftBtn.style.display = 'none';
            }
        }, 400); // Wait for scroll animation
    }
</script>


</body>
</html>
