<?php
$mysqli = require __DIR__ . "/database.php";


    $complaint_id = $_POST['complaint_id'];
    $worker_name = $_POST["worker_name"];
    $phone_number = $_POST["phone_number"];
    $date_of_joining=$_POST["date_of_joining"];

    $sql = "INSERT INTO worker (complaint_id, worker_name,w_phone_number, date_of_joining ) VALUES (?, ?, ?, ?)";

    // Bind parameters
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("isss", $complaint_id, $worker_name, $phone_number,$date_of_joining);
    
    if($stmt->execute()){
            header("Location: adminhome.php");
            exit;
        
    };

    $stmt->close();
    $mysqli->close();
    ?>

