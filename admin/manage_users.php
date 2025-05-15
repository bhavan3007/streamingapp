<?php

include('../includes/db.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Users</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

<div class="filter-section">
    <h2>Manage Users</h2><br></br>

    <!-- Gender Filter -->
    <label for="genderFilter">Gender:</label>
    <select id="genderFilter">
        <option value="">All</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Other">Other</option>
    </select>

    <!-- Age Filter -->
    <label for="ageFilter">Age:</label>
    <input type="number" id="ageFilter" placeholder="Enter Age">

    <!-- Age Condition -->
    <select id="ageCondition">
        <option value="above">Above Given Age</option>
        <option value="below">Below Given Age</option>
    </select>

    <button onclick="applyFilter()">Apply Filter</button>
</div>


<table class="t1" border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>Name</th>
            <th>Gender</th>
            <th>Age</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody id="userTable">
        <!-- AJAX response will populate here -->
    </tbody>
</table>

<script>
    // Function to Apply Filters
    function applyFilter() {
        const gender = document.getElementById('genderFilter').value;
        const age = document.getElementById('ageFilter').value;
        const condition = document.getElementById('ageCondition').value;

        $.ajax({
            url: 'filter_users.php',
            type: 'POST',
            data: {
                gender: gender,
                age: age,
                condition: condition
            },
            success: function(response) {
                $('#userTable').html(response);
            }
        });
    }

    // Load All Users on Page Load
    $(document).ready(function() {
        applyFilter();
    });
</script>

</body>
</html>
