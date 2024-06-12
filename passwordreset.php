<?php
if (strlen($_POST["new_password"]) < 8) {
    die("Password must be at least 8 characters");
}

if (!preg_match("/[a-z]/i", $_POST["new_password"])) {
    die("Password must contain at least one letter");
}

if (!preg_match("/[0-9]/", $_POST["new_password"])) {
    die("Password must contain at least one number");
}

if ($_POST["new_password"] !== $_POST["confirm_password"]) {
    die("Passwords must match");
}
$password_hash1 = password_hash($_POST["new_password"], PASSWORD_DEFAULT);
$email = $_POST["email"];
$mysqli = require __DIR__ . "/database.php";
$sql = "UPDATE userlogin SET password_hash = ? WHERE email = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ss", $password_hash1, $email);

// Execute the update
if($stmt->execute()){
    header("Location: userhome.php");
    exit;
}
else{
    echo "Error: " . $stmt->error;
}
// Close statement and connection
$stmt->close();
$mysqli->close();
//print_r($_POST);