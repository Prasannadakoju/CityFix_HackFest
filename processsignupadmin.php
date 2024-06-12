<?php

if (empty($_POST["name"])) {
    die("Name is required");
}

if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if (!preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if (!preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords must match");
}
if (empty($_POST["location"])) {
    die("Location is required");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
$mysqli = require __DIR__ . "/database.php";


$checkSql = "SELECT COUNT(*) FROM adminlogin WHERE email = ?";
$checkStmt = $mysqli->prepare($checkSql);
$checkStmt->bind_param("s", $_POST["email"]);
$checkStmt->execute();
$checkStmt->bind_result($emailCount);
$checkStmt->fetch();
$checkStmt->close();

if ($emailCount > 0) {
    // Email already exists, handle accordingly
    echo "Email already taken. Please choose a different email.";
} else {
    $sql = "INSERT INTO adminlogin (name, email, password_hash,location)
        VALUES (?, ?, ?, ?)";

    $stmt = $mysqli->stmt_init();

    if (!$stmt->prepare($sql)) {
        die("SQL error: " . $mysqli->error);
    }
    $stmt->bind_param("ssss",
        $_POST["name"],
        $_POST["email"],
        $password_hash,
        $_POST["location"]);

    $stmt->execute();
    header("Location: loginadmin.php");
    exit;
}
