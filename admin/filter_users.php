<?php
include('../auth/connect.php');

// Fetch Filter Parameters
$gender = $_POST['gender'];
$age = $_POST['age'];
$condition = $_POST['condition'];

// Build the filter array
$filter = [];

if ($gender !== "") {
    $filter['gender'] = $gender;
}

if ($age !== "") {
    if ($condition === "above") {
        $filter['age'] = ['$gt' => (int)$age];
    } elseif ($condition === "below") {
        $filter['age'] = ['$lt' => (int)$age];
    }
}

// Query the database (Fixed this line, now uses $usersCollection)
$users = $usersCollection->find($filter);

$output = "";
foreach ($users as $user) {
    $output .= "<tr>
                    <td>{$user['name']}</td>
                    <td>{$user['gender']}</td>
                    <td>{$user['age']}</td>
                    <td>{$user['email']}</td>
                </tr>";
}

echo $output;
?>
