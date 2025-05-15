<?php
include('connect.php');

// Collect form data
$name = $_POST['name'];
$gender = $_POST['gender'];
$age = (int)$_POST['age'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Check if user already exists
$existingUser = $usersCollection->findOne(['email' => $email]);

if ($existingUser) {
    echo "<script>alert('Email already registered!'); window.location.href='index.html';</script>";
    exit();
}

// Insert into MongoDB
$insertResult = $usersCollection->insertOne([
    'name' => $name,
    'gender' => $gender,
    'age' => $age,
    'email' => $email,
    'password' => $password
]);

if ($insertResult->getInsertedCount() > 0) {
    echo "<script>alert('Registration Successful!'); window.location.href='../admin/index.php';</script>";
} else {
    echo "<script>alert('Error during registration. Please try again.'); window.location.href='index.html';</script>";
}
?>
