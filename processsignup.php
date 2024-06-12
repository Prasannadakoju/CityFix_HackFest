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

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
$mysqli = require __DIR__ . "/database.php";
$checkSql = "SELECT COUNT(*) FROM userlogin WHERE email = ?";
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
    $sql = "INSERT INTO userlogin (name, email, password_hash)
        VALUES (?, ?, ?)";

    $stmt = $mysqli->stmt_init();

    if (!$stmt->prepare($sql)) {
        die("SQL error: " . $mysqli->error);
    }
    $stmt->bind_param("sss",
        $_POST["name"],
        $_POST["email"],
        $password_hash);

    $stmt->execute();
    header("Location: login.php");
    exit;
}

//echo "Signup successful";
// {
//     echo "Signup successful";
// } else {
//     if ($mysqli->errno === 1062) {
//          // Duplicate entry error
//         echo "Email already taken. Please choose a different email.";
//     } else {
//          // Other errors
//         echo "Error: " . $mysqli->errno . " - " . $mysqli->error;
//         }
// }
                               