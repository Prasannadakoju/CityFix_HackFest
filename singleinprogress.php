<?php

$mysqli = require __DIR__ . "/database.php";

// Check if complaint ID is provided in the URL
if (isset($_GET['id'])) {
    $complaintId = $_GET['id'];

    // Fetch details of the specific complaint
    $sql = "SELECT c.*, w.* FROM complaints c LEFT JOIN worker w ON c.id = w.complaint_id WHERE c.id = $complaintId";
    $result = $mysqli->query($sql);

    if (!$result) {
        die("Error: " . $mysqli->error);
    }

    // Check if complaint exists
    if ($result->num_rows > 0) {
        // Fetch complaint details
        $complaint = $result->fetch_assoc();
    } else {
        // Handle case where complaint does not exist
        echo "Error: Complaint not found.";
    }
} else {
    // Handle case where complaint ID is not provided in the URL
    echo "Error: Complaint ID not provided.";
}
$sql1 = "SELECT * FROM adminlogin";
$result1 = $mysqli->query($sql1);

// Check if the second query was successful
if ($result1) {
    // Fetch user details
    $user = $result1->fetch_assoc();
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

    <link rel="stylesheet" href="singleinprogress.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title> inprogress Problem details</title>
     <!--model-->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!--js -->
<script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="js/validationreset.js" defer></script>
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
        <div class="container ">
            <a href="#" class="navbar-brand mx-auto-3">
                <i class="fa-solid fa-tree-city" style="color:#00827f;font-size:30px"></i>
                <span id="logo-name" style="color:#00827f; font-size:xx-large;"><b><span
                            style="color: #fff; font-weight: bold; font-size:xxx-large;">C</span>ity<span
                            style="color: #fff; font-weight: bold; font-size:xxx-large;">F</span>ix</b></span>
            </a>
            <div class="sidebar">
                <ul id="sidemenu">
                <li><a href="http://localhost/CityFix/adminhome.php">Home</a></li>
                    
                    <li><a href="graph.php?id=<?php echo $user["id"];?>">Dashoard</a></li>
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
                
                    <h2>Hi! <?= htmlspecialchars($user["name"]) ?>😊</h2>
                    
        
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <i class="fa-solid fa-envelope"></i>
                    
                    <p><?= htmlspecialchars($user["email"]) ?><p>
                    
                    <h5>Update Password</h5>
                    <form action="passwordresetadmin.php" method="post" id="reset" novalidate>
                    <input type="text" name="email" value="<?php echo $user['email']; ?>" hidden>
                    <p style="font-size:13px; font-weight:bold; color:#00827f">New Password:</p>
                    <input type="password" name="new_password" id="new_password" style="border-radius: 4px; border:none; height:35px; width: 400px; background-color: #cfebeb;color:black "><br><br>
                    <p style="font-size:13px; font-weight:bold; color:#00827f">Confirm Password:</p>
                    <input type="password" name="confirm_password" id="confirm_password" style="border-radius: 4px; border:none; height: 35px; width: 400px; background-color: #cfebeb;color:black"><br><br>
                    <button type="submit" class="btn btn2"style="color: #fff; font-size: 12px; font-weight: bold; background-color:#00827f">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" onclick="logout()" class="btn btn2" style="color: #fff; font-size: 14px; font-weight: bold;background-color:#00827f"><i
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
    <!-- problem details -->

    <div class="container-fluid" style=" margin-top:160px;height:auto">

        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <form action="">
                    <p style="font-size:20px; font-weight:bold; margin-left:70px; color:#00827f">Problem ID:</p>
                    <input type="text" name="id" value="<?php echo $complaint['id']; ?>"
                        style="border-radius: 4px; border:none; height: 40px; width: 500px; margin-left: 70px; background-color: #f6f8f8;"><br><br>
                    <p style="font-size:20px; font-weight:bold; margin-left:70px; color:#00827f">Problem Category:</p>
                    <input type="text" name="category" value="<?php echo $complaint['category']; ?>"
                        style="border-radius: 4px; border:none; height: 40px; width: 500px; margin-left: 70px; background-color: #f6f8f8;"><br><br>
                    <p style="font-size:20px; font-weight:bold; margin-left:70px; color:#00827f">Problem Title:</p>
                    <input type="text" name="problem_title" value="<?php echo $complaint['problem_title']; ?>"
                        style="border-radius: 4px; border:none; height: 40px; width: 500px; margin-left: 70px; background-color: #f6f8f8;"><br><br>
                    <p style="font-size:20px; font-weight:bold; margin-left: 70px; color:#00827f">Problem Description:
                    </p>
                    <textarea
                        style="border-radius: 4px; border:none; height: 120px; width: 500px; margin-left: 70px; background-color: #f6f8f8;"><?php echo $complaint['problem_description']; ?></textarea>

                    <br><br>
                    <p style="font-size:20px; font-weight:bold; margin-left:70px; color:#00827f">Location:</p>
                    <input type="text" name="location" value="<?php echo $complaint['location']; ?>"
                        style="border-radius: 4px; border:none; height: 40px; width: 500px; margin-left: 70px; background-color: #f6f8f8;"><br><br>
                    <p style="font-size:20px; font-weight:bold; margin-left: 70px; color:#00827f">Location Description:
                    <p style="font-size: 10px; font-weight:light;  margin-left: 70px">
                        <i>H.No,Street,Landmark,City,Postal Code,State,Country</i>
                    </p>
                    </p>
                    <textarea
                        style="border-radius: 4px; border:none; height: 120px; width: 500px; margin-left: 70px; background-color: #f6f8f8;"><?php echo $complaint['location_description']; ?></textarea>
                    <br><br>
                    <h2 style="margin-left: 70px;color: #006764;text-decoration: underline;">User Details</h2>
                    <p style="font-size:20px; font-weight:bold; margin-left:70px; color:#00827f">Name:</p>
                    <input type="text" name="user_name" value="<?php echo $complaint['user_name']; ?>"
                        style="border-radius: 4px; border:none; height: 40px; width: 500px; margin-left: 70px; background-color: #f6f8f8;"><br><br>
                    <p style="font-size:20px; font-weight:bold; margin-left:70px; color:#00827f">Phone No:</p>
                    <input type="text" name="phone_number" value="<?php echo $complaint['phone_number']; ?>"
                        style="border-radius: 4px; border:none; height: 40px; width: 500px; margin-left: 70px; background-color: #f6f8f8;"><br><br>
                    <p style="font-size:20px; font-weight:bold; margin-left:70px; color:#00827f">Email:</p>
                    <input type="text" name="email" value="<?php echo $complaint['email']; ?>"
                        style="border-radius: 4px; border:none; height: 40px; width: 500px; margin-left: 70px; background-color: #f6f8f8;"><br><br>
                    

                </form>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 justify-content-center">
                <p style="font-size:28px; font-weight:bold;color:#00827f;text-align: center;">Image</p>
                <div class="hero">
                    <p id="image-link" hidden></p>
                    <label for="input-file" id="drop-area">
                        <div id="img-view">
                            <img id="image-display" src="" alt="Uploaded Image">
                        </div>
                    </label>
                </div>
                <div style="margin-top:70px;"><form><h2 style="margin-left: 70px;color: #006764;text-decoration: underline;"> Worker Details</h2>
                    <p style="font-size:20px; font-weight:bold; margin-left:70px; color:#00827f">Name:</p>
                    <input type="text" name="user_name" value="<?php echo $complaint['worker_name']; ?>"
                        style="border-radius: 4px; border:none; height: 40px; width: 500px; margin-left: 70px; background-color: #f6f8f8;"><br><br>
                    <p style="font-size:20px; font-weight:bold; margin-left:70px; color:#00827f">Phone No:</p>
                    <input type="text" name="w_phone_number" value="<?php echo $complaint['w_phone_number']; ?>"
                        style="border-radius: 4px; border:none; height: 40px; width: 500px; margin-left: 70px; background-color: #f6f8f8;"><br><br>
                    <p style="font-size:20px; font-weight:bold; margin-left:70px; color:#00827f">Date:</p>
                    <input type="text" name="date_of_joining" value="<?php echo $complaint['date_of_joining']; ?>"
                        style="border-radius: 4px; border:none; height: 40px; width: 500px; margin-left: 70px; background-color: #f6f8f8;"
                        required>
                    <br></form></div>
            </div>
            
            <script>
    // Retrieve the image link from PHP (use PHP to echo the image link directly into JavaScript)
    var imageLink = "<?php echo $complaint['image_link']; ?>";

    // Set the src attribute of the image element
    document.getElementById('image-display').src = imageLink;
</script>
        </div>
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