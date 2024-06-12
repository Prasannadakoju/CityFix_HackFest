<?php

session_start();

if (isset($_SESSION["admin_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM adminlogin
            WHERE id = {$_SESSION["admin_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}
// $sql1 = "SELECT COUNT(*) FROM complaints WHERE status = 'Default'";
//     $result1 = $mysqli->query($sql1);

//     if (!$result1) {
//         die("Error: " . $mysqli->error);
//     }

//     // Check if complaint exists
//     //if ($result1->num_rows > 0) {
//         // Fetch complaint details
//         $complaint = $result1->fetch_assoc();
//     //} else {
//         // Handle case where complaint does not exist
//         //echo "0";
//     //}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="adminhome.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>AdminHome</title>
    <!--js-->
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="js/validationreset.js" defer></script>


    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <!-- map -->
    <style>
        /* map */
    #map{
        width:100%;
        height:500px;
        margin-top:120px;
        margin-left: auto;
        margin-right: auto;
        padding: 20px;
        text-align: center;
        border:4px solid #00827f;
        border-radius:15px;
        
    }
    .status-images img {
        height: 40px;
        width: 40px;
       
    }
    </style>
</head>

<body
    style="background: #1CD8D2;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #93EDC7, #1CD8D2);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #93EDC7, #1CD8D2); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */">
    <nav class="navbar fixed-top navbar-expand-md navbar-light bg-light"
        style="height:13%;background: #1CD8D2;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #93EDC7, #1CD8D2);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #93EDC7, #1CD8D2); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */">
        <div class="container-fluid">
            <a href="#" class="navbar-brand mx-auto-3">
                <i class="fa-solid fa-tree-city" style="color:#00827f;font-size:30px"></i>
                <span id="logo-name" style="color:#00827f; font-size:xx-large;"><b><span
                            style="color: #fff; font-weight: bold; font-size:xxx-large;">C</span>ity<span
                            style="color: #fff; font-weight: bold; font-size:xxx-large;">F</span>ix</b></span>
            </a>
            <div class="sidebar">
                <ul id="sidemenu">
                    <li><a href="http://localhost/CityFix/adminhome.php">Home</a></li>
                    <li><a href="graph.php?id=<?php echo $user["id"];?>">Dashboard</a></li>
                    
                    <li><a href="#3" data-toggle="modal" data-target="#profile">Profile</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Profile-->
    <div class="modal" id="profile">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <?php if (isset($user)): ?>
                    <h2>Hi! <?= htmlspecialchars($user["name"]) ?>😊</h2>
                    <?php endif; ?>
        
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <i class="fa-solid fa-envelope"></i>
                    <?php if (isset($user)): ?>
                    <p><?= htmlspecialchars($user["email"]) ?><p>
                    <?php endif; ?>
                    <h5>Update Password</h5>
                    <form action="passwordresetadmin.php" method="post" id="reset" novalidate>
                    <input type="text" name="email" value="<?php echo $user['email']; ?>" hidden>
                    <p style="font-size:13px; font-weight:bold; color:#00827f">New Password:</p>
                    <input type="password" name="new_password" id="new_password" style="border-radius: 4px; border:none; height:35px; width: 400px; background-color: #cfebeb;color:black "><br><br>
                    <p style="font-size:13px; font-weight:bold; color:#00827f">Confirm Password:</p>
                    <input type="password" name="confirm_password" id="confirm_password" style="border-radius: 4px; border:none; height: 35px; width: 400px; background-color: #cfebeb;color:black"><br><br>
                    <button type="submit" class="btn btn2"style="color: #fff; font-size: 12px; font-weight: bold;">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" onclick="logout()" class="btn btn2" style="color: #fff; font-size: 14px; font-weight: bold;"><i
                            class="fa-solid fa-rotate-left"></i> Log Out</button>
                            
                    </div>
                            <script>
                            function logout() {
                            window.location.href = "selectuser.html";
                            }
                            </script>
                
            </div>
        </div>
    </div>
    <!--map-->
   <div class="container">
        <div class="row">
            <div class="col">
                <div id="map"></div>
            </div>
        </div>
    </div>

    <!-- numbers -->
    <div id="services">
        <div class="container">
            <div class="services-list">
                <div>
                    <i class="fa-solid fa-list"></i>
                    <h2 style="font-size:80px;">
                    <h2 style="font-size: 80px;">
    <?php
    $sql1 = "SELECT COUNT(*) as complaint_count FROM complaints WHERE status = 'Default'";
    $result1 = $mysqli->query($sql1);

    if (!$result1) {
        die("Error: " . $mysqli->error);
    }

    $complaint = $result1->fetch_row(); // Use fetch_row for a single value

    if ($complaint) {
        $complaintCount = $complaint[0]; // Access the count value
        echo $complaintCount;
    } else {
        // Handle the case where the query failed or no complaints were found
        echo "Error fetching complaint count.";
    }
    ?>
</h2>
                </h2>
                    <a href="problems.php?id=<?php echo $user["id"]; ?>">PROBLEMS</a>
                </div>
                <div>
                    <i class="fa-solid fa-clock"></i>
                    <h2 style="font-size:80px;">
                    <?php
                    $sql1 = "SELECT COUNT(*) as complaint_count FROM complaints WHERE status = 'accepted' || status='no'";
    $result1 = $mysqli->query($sql1);

    if (!$result1) {
        die("Error: " . $mysqli->error);
    }

    $complaint = $result1->fetch_row(); // Use fetch_row for a single value

    if ($complaint) {
        $complaintCount = $complaint[0]; // Access the count value
        echo $complaintCount;
    } else {
        // Handle the case where the query failed or no complaints were found
        echo "Error fetching complaint count.";
    }
    ?>
</h2>
</h2>
<a href="inprogress.php?id=<?php echo $user["id"]; ?>">IN PROGRESS</a>
                </div>




                <div>
                    <i class="fa-solid fa-check"></i>
                    <h2 style="font-size:80px;">
                    <?php
                    $sql1 = "SELECT COUNT(*) as complaint_count FROM complaints WHERE status = 'yes' ";
    $result1 = $mysqli->query($sql1);

    if (!$result1) {
        die("Error: " . $mysqli->error);
    }

    $complaint = $result1->fetch_row(); // Use fetch_row for a single value

    if ($complaint) {
        $complaintCount = $complaint[0]; // Access the count value
        echo $complaintCount;
    } else {
        // Handle the case where the query failed or no complaints were found
        echo "Error fetching complaint count.";
    }
    ?>
                </h2>
                    <a href="resolved.php?id=<?php echo $user["id"]; ?>">SOLVED</a>
                </div>
            </div>
        </div>
    </div>
    <div class="quotes">
        <div class="row" style="margin-top: 40px;">
            <img src="images/home2.jpeg" alt="quote">
        </div>
    </div>
    <!-- footer -->
    <div class="footer" style="margin-top: 70px;">
        <div class="container">
            <div class="row">
                <div class="contact-left">
                    <h1 class="sub-title">Contact Us</h1>
                    <p><i class="fa-solid fa-envelope"></i>cityfix@gmail.com</p>
                    <div class="social-icons">
                        <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                    <a href="#" class="btn btn2">Support</a>
                </div>
                <div class="contact-right">
                    <form>
                        <input type="text" name="Name" placeholder="Your Name" required>
                        <input type="email" name="Email" placeholder="Your Email" required>
                        <textarea name="Message" rows="6" placeholder="Your Message"></textarea>
                        <button type="submit" class="btn btn2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="copyright">
            <p style="color: #fff;">Copyright©ARPDHK. Made with <i class="fa-solid fa-heart"></i> @Team Coderella Squad
            </p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <!-- maps -->
        
    <script>
    var map = L.map('map').setView([17.4534, 78.6865], 10);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    <?php
        $sql = "SELECT * FROM complaints";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
            echo "var complaintsData = [";
            while ($row = $result->fetch_assoc()) {
                echo "{";
                echo "'coords': [" . floatval($row['latitude']) . ", " . floatval($row['longitude']) . "], ";
                echo "'category': '" . $row['category'] . "'";
                echo "},";
            }
            echo "];";
        }
    ?>

    const customIcon = L.icon({
        iconUrl: 'images/problems.png',
        iconSize: [50, 50],
    });

    complaintsData.forEach(complaint => {
        L.marker(complaint.coords, {
            title: complaint.category,
            icon: customIcon,
        })
            .bindPopup(`<span class="popup">${complaint.category}</span>`)
            .addTo(map);
    });
</script>

</body>

</html>




