<?php

// Include your database connection code (e.g., database.php)
$mysqli = require __DIR__ . "/database.php";

// Check if it's a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get complaint ID and new status from the POST data
    $complaintId = $_POST['id'];
    $newStatus = $_POST['status'];

    // Update the status in the database
    $updateSql = "UPDATE complaints SET status = ? WHERE id = ?";
    $stmt = $mysqli->prepare($updateSql);

    if ($stmt) {
        $stmt->bind_param("si", $newStatus, $complaintId);
        $stmt->execute();

        // Close the statement
        $stmt->close();

        // Send a JSON response indicating success
        echo json_encode(['success' => true]);
    } else {
        // Send a JSON response indicating failure
        echo json_encode(['success' => false, 'error' => $mysqli->error]);
    }
} else {
    // Send a JSON response indicating that it's not a valid request
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
}

?>