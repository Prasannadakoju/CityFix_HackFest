<?php
$mysqli = require __DIR__ . "/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_email = $_POST["email"];
    $location = $_POST["location"];

    // Retrieve user_id from userlogin table based on email
    $user_id_query = "SELECT id FROM userlogin WHERE email = ?";
    $user_id_stmt = $mysqli->prepare($user_id_query);
    $user_id_stmt->bind_param("s", $user_email);

    $user_id = null;

    if ($user_id_stmt->execute()) {
        $user_id_stmt->bind_result($user_id);
        $user_id_stmt->fetch();
    }

    $user_id_stmt->close();

    // Retrieve admin_id from complaints table based on location
    $admin_id_query = "SELECT id FROM adminlogin WHERE location = ?";
    $admin_id_stmt = $mysqli->prepare($admin_id_query);
    $admin_id_stmt->bind_param("s", $location);

    $admin_id = null;

    if ($admin_id_stmt->execute()) {
        $admin_id_stmt->bind_result($admin_id);
        $admin_id_stmt->fetch();
    }

    $admin_id_stmt->close();

    $user_name = $_POST["user_name"];
    $email = $_POST["email"];
    $phone_number = $_POST["phone_number"];
    $problem_title = $_POST["problem_title"];
    $problem_description = $_POST["problem_description"];
    $location = $_POST["location"];
    $location_description = $_POST["location_description"];
    $category = $_POST["selectedCardTitle"];

    // Handle uploaded image
    if (isset($_FILES["uploaded_image"]) && $_FILES["uploaded_image"]["error"] == UPLOAD_ERR_OK) {
        $target_dir = "uploads/";
        $target_file = $target_dir . uniqid() . "_" . basename($_FILES["uploaded_image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowed_types = array("jpg", "jpeg", "png", "gif", "mp4", "mov", "avi");

        if (in_array($imageFileType, $allowed_types)) {
            if (move_uploaded_file($_FILES["uploaded_image"]["tmp_name"], $target_file)) {
                $image_link = $target_file;

                // Handle uploaded video
                if (isset($_FILES["uploaded_video"]) && $_FILES["uploaded_video"]["error"] == UPLOAD_ERR_OK) {
                    $target_dir = "uploads/";
                    $target_file = $target_dir . uniqid() . "_" . basename($_FILES["uploaded_video"]["name"]);
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                    if (in_array($imageFileType, $allowed_types)) {
                        if (move_uploaded_file($_FILES["uploaded_video"]["tmp_name"], $target_file)) {
                            $video_link = $target_file;

                            // Insert data into the complaints table
                            $latitude = isset($_POST['latitude']) ? $_POST['latitude'] : null;
                            $longitude = isset($_POST['longitude']) ? $_POST['longitude'] : null;

                            $sql = "INSERT INTO complaints (user_id, admin_id, user_name, email, phone_number, problem_title, problem_description, location, location_description, category, image_link, video_link, latitude, longitude) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

                            $stmt = $mysqli->prepare($sql);
                            $stmt->bind_param("iissssssssssss", $user_id, $admin_id, $user_name, $email, $phone_number, $problem_title, $problem_description, $location, $location_description, $category, $image_link, $video_link, $latitude, $longitude);

                            if ($stmt->execute()) {
                                header("Location: userhome.php");
                            } else {
                                echo "Error: " . $stmt->error;
                            }

                            $stmt->close();
                        } else {
                            echo "Error uploading video.";
                        }
                    } else {
                        echo "File type not supported. Please upload a video.";
                    }
                } else {
                    echo "No video selected.";
                }
            } else {
                echo "Error uploading image.";
            }
        } else {
            echo "File type not supported. Please upload an image.";
        }
    } else {
        echo "No image selected.";
    }

    $mysqli->close();
}
?>

