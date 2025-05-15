<?php
include('connect.php');

$adminEmail = "admin@example.com"; // Admin Email
$adminPassword = "admin123";       // Admin Password

$email = $_POST['email'];
$password = $_POST['password'];

if ($email === $adminEmail && $password === $adminPassword) {
    echo "<script>alert('Admin Login Successful'); window.location.href='../admin/index.php';</script>";
} else {
    echo "<script>alert('Invalid Admin Credentials!'); window.location.href='index.html';</script>";
}
?>
