<?php
include('connect.php');

// Collect form data
$email = $_POST['email'];
$password = $_POST['password'];

// Find the user in MongoDB
$user = $usersCollection->findOne(['email' => $email]);

if ($user && password_verify($password, $user['password'])) {
    echo "<script>alert('Login Successful!'); window.location.href='../admin/index.php';</script>";
} else {
    echo "<script>alert('Invalid email or password.'); window.location.href='index.html';</script>";
}
?>
