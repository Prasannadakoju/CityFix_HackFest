<?php

$mysqli = require __DIR__ . "/database.php";
$sql = "SELECT * FROM adminlogin";
$result = $mysqli->query($sql);

// Check if the second query was successful
if ($result) {
    // Fetch user details
    $user = $result->fetch_assoc();
} else {
    // Handle the case where the second query failed
    die("Error: " . $mysqli->error);
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="graph.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--model-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <!--js -->
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="js/validationreset.js" defer></script>


    <title>graphs</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body
    style="background: #1CD8D2;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #93EDC7, #1CD8D2);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #93EDC7, #1CD8D2); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */">

    <nav class="navbar fixed-top navbar-expand-md navbar-light bg-light"
        style="height:13%;background: #1CD8D2;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #93EDC7, #1CD8D2);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #93EDC7, #1CD8D2); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */">
        <a href="http://localhost/CityFix/adminhome.php" style="text-decoration: none; color:#00827f;margin-left:5px;"><i
                class="fa-solid fa-arrow-left" id="arrow"></i></a>
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
                    <li><a href="">DashBoard</a></li>
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

                    <h2>Hi!
                        <?= htmlspecialchars($user["name"]) ?>😊
                    </h2>


                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <i class="fa-solid fa-envelope"></i>

                    <p>
                        <?= htmlspecialchars($user["email"]) ?>
                    <p>

                    <h5>Update Password</h5>
                    <form action="passwordresetadmin.php" method="post" id="reset" novalidate>
                        <input type="text" name="email" value="<?php echo $user['email']; ?>" hidden>
                        <p style="font-size:13px; font-weight:bold; color:#00827f">New Password:</p>
                        <input type="password" name="new_password" id="new_password"
                            style="border-radius: 4px; border:none; height:35px; width: 400px; background-color: #cfebeb;color:black "><br><br>
                        <p style="font-size:13px; font-weight:bold; color:#00827f">Confirm Password:</p>
                        <input type="password" name="confirm_password" id="confirm_password"
                            style="border-radius: 4px; border:none; height: 35px; width: 400px; background-color: #cfebeb;color:black"><br><br>
                        <button type="submit" class="btn btn2"
                            style="color: #fff; font-size: 12px; font-weight: bold; background-color:#00827f">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" onclick="logout()" class="btn btn2"
                        style="color: #fff; font-size: 14px; font-weight: bold;background-color:#00827f"><i
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


    <!-- graphs -->
    <div class="container-fluid container-chart" style="  width: 100%;
    max-width: 1200px;
    margin-top: 100px;">
        <h2 style="color: #00827f;">Overall Problem Status</h2>
        <canvas id="overallProblemChart" width="600" height="350"></canvas>

        <h2 style="margin-top:120px;color: #00827f;">Category-wise Problem Status</h2>
        <canvas id="categoryProblemChart" width="600" height="400"></canvas>

        
    <script>
        // Overall Problem Status (Previous Chart)
        var overallData = {
            labels: ['Submitted', 'In Progress', 'Completed'],
            datasets: [{
                label: 'Number of Problems',
                data: [
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
                    echo "0"; // Default value if no complaints
                }
            ?>,
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
                    echo "0"; // Default value if no complaints
                }
            ?>, 
            <?php
                $sql1 = "SELECT COUNT(*) as complaint_count FROM complaints WHERE status = 'yes'";
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
                    echo "0"; // Default value if no complaints
                }
            ?>], // Replace with your actual data
                backgroundColor: [
                    'rgba(255, 99, 132, 0.7)', // Submitted
                    'rgb(213,213,217)', // In Progress
                    '#0096c7' // Completed
                ],
                borderColor: [
                    'rgba(255, 99, 132, 0.7)', // Submitted
                    'rgb(213,213,217)', // In Progress
                    'rgb(40,120,163)' // Completed
                ],
                borderWidth: 1
            }]
        };

        var overallOptions = {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };

        var overallCtx = document.getElementById('overallProblemChart').getContext('2d');
        var overallChart = new Chart(overallCtx, {
            type: 'bar',
            data: overallData,
            options: overallOptions
        });

        // Category-wise Problem Status (New Chart)
        var categoryData = {
            labels: ['Water', 'Streetlights', 'Animals', 'Garbage', 'Drainage', 'Public Facilities', 'Others'],
            datasets: [{
                label: 'Number of Problems',
                data: [<?php
                $sql1 = "SELECT COUNT(*) as complaint_count FROM complaints WHERE category = 'Water'";
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
                    echo "0"; // Default value if no complaints
                }
            ?>, 
            <?php
                $sql1 = "SELECT COUNT(*) as complaint_count FROM complaints WHERE category = 'Street Lights'";
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
                    echo "0"; // Default value if no complaints
                }
            ?>, 
            <?php
                $sql1 = "SELECT COUNT(*) as complaint_count FROM complaints WHERE category = 'Animals'";
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
                    echo "0"; // Default value if no complaints
                }
            ?>, 
            <?php
                $sql1 = "SELECT COUNT(*) as complaint_count FROM complaints WHERE category = 'Garbage'";
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
                    echo "0"; // Default value if no complaints
                }
            ?>, 
            <?php
                $sql1 = "SELECT COUNT(*) as complaint_count FROM complaints WHERE category = 'Drainage'";
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
                    echo "0"; // Default value if no complaints
                }
            ?>, 
            <?php
                $sql1 = "SELECT COUNT(*) as complaint_count FROM complaints WHERE category = 'Public Facilities'";
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
                    echo "0"; // Default value if no complaints
                }
            ?>, 
            <?php
                $sql1 = "SELECT COUNT(*) as complaint_count FROM complaints WHERE category = 'Others'";
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
                    echo "0"; // Default value if no complaints
                }
            ?>], // Replace with your actual data for each category
                backgroundColor: [
                    '#004953',
                    '#26626c',
                    '#427c86',
                    '#5d96a2',
                    '#78b2be',
                    '#94cfda',
                    '#b1ecf8'
                ],
                borderColor: [
                    '#26626c',
                    '#427c86',
                    '#5d96a2',
                    '#78b2be',
                    '#94cfda',
                    '#b1ecf8'
                ],
                borderWidth: 1
            }]
        };

        var categoryOptions = {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };

        var categoryCtx = document.getElementById('categoryProblemChart').getContext('2d');
        var categoryChart = new Chart(categoryCtx, {
            type: 'bar',
            data: categoryData,
            options: categoryOptions
        });
    </script>

    </div>



    <!-- footer -->
    <div class="footer" style="margin-top:80px;">
        <div class="copyright">
            <p>Copyright©ARPDHK. Made with <i class="fa-solid fa-heart"></i> <b>@Team Coderella Squad</b></p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</body>

</html>
