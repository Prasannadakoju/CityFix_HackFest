<?php

$mysqli = require __DIR__ . "/database.php";

// Check if complaint ID is provided in the URL
if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Fetch details of the specific complaint
    $sql = "SELECT * FROM complaints c,worker w WHERE c.user_id = $userId AND c.id=w.complaint_id";
    $result = $mysqli->query($sql);

    // if (!$result) {
    //     die("Error: " . $mysqli->error);
    // }
    if ($result) {
        // Fetch complaint details
        $notification = $result->fetch_assoc();
    } else {
        // Handle case where complaint does not exist
        echo "Error: Complaint not found.";
        exit; // terminate the script after handling the error
    }
}  else {
    // Handle case where complaint ID is not provided in the URL
    echo "Error: Complaint ID not provided.";
}
$sql1 = "SELECT * FROM userlogin";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="js/validationreset.js" defer></script>
    <link rel="stylesheet" href="notif.css">
    <title>Notifications</title>
    <script>

function updateStatus(status) {
    const complaintId = <?php echo $notification['complaint_id']; ?>;
    fetch(`userupdate.php`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `id=${complaintId}&status=${status}`,
    })
    .then(response => response.json())
    .then(data => {
        // Handle the response if needed
        console.log('Status updated successfully:', data);
    })
    .catch(error => console.error('Error updating status:', error));
}

</script>
</head>-

<body
    style="background: #1CD8D2;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #93EDC7, #1CD8D2);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #93EDC7, #1CD8D2); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */">
    <nav class="navbar fixed-top navbar-expand-md navbar-light bg-light"
        style="height:13%;background: #1CD8D2;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #93EDC7, #1CD8D2);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #93EDC7, #1CD8D2); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */">
        <a href="http://localhost/CityFix/userhome.php" style="text-decoration: none; color:#00827f;margin-left:10px;"><i class="fa-solid fa-arrow-left" id="arrow"></i></a>
        <div class="container-fluid">
            <a href="#" class="navbar-brand mx-auto-3">
                <i class="fa-solid fa-tree-city" style="color:#00827f;font-size:30px"></i>
                <span id="logo-name" style="color:#00827f; font-size:xx-large;"><b><span
                            style="color: #fff; font-weight: bold; font-size:xxx-large;">C</span>ity<span
                            style="color: #fff; font-weight: bold; font-size:xxx-large;">F</span>ix</b></span>
            </a>
            <div class="sidebar">
                <ul id="sidemenu">
                    <li><a href="http://localhost/CityFix/userhome.php">Home</a></li>
                    <li><a href="notif.php?id=<?php echo $user["id"]; ?>">Notifications</a></li>
                    <li><a href="#3" data-toggle="modal" data-target="#profile">Profile</a></li>
                </ul>
            </div>
        </div>
    </nav>
      <!-- Profile-->
    <!-- Profile-->
    <div class="modal" id="profile">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    
                    <h2>Hi! <?= htmlspecialchars($user["name"]) ?>😊</h2>
                  
                </div>
                <div class="modal-body">
                    <i class="fa-solid fa-envelope"></i>
                   
                    <p><?= htmlspecialchars($user["email"]) ?><p>
                    
                    <h5>Update Password</h5>
                    <form action="passwordreset.php" method="post" id="reset" novalidate>
                        <input type="text" name="email" value="<?php echo $user['email']; ?>" hidden>
                    <p style="font-size:13px; font-weight:bold; color:#00827f">New Password:</p>
                    <input type="password" name="new_password" id="new_password" style="border-radius: 4px; border:none; height:35px; width: 400px; background-color: #cfebeb;color:black " required><br><br>
                    <p style="font-size:13px; font-weight:bold; color:#00827f">Confirm Password:</p>
                    <input type="password" name="confirm_password" id="confirm_password" style="border-radius: 4px; border:none; height: 35px; width: 400px; background-color: #cfebeb;color:black" required><br><br>
                    <button type="submit" class="btn btn2" style="color: #fff; font-size: 12px; font-weight: bold;background-color:#00827f;">Submit</button>
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


      <!-- problems -->
      <div class="container-fluid" style="margin-top:130px;" id="cards1">
        <div class="row" style="margin-left:30px;">
            <div class="col">
                <h2 style="color:#0a5251; font-size:35px"><i class="fa-solid fa-bell"></i> Notifications</h2>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top:50px;">
        <!-- accepted -->
        <?php if ($notification !== null) : ?>

        <?php if($notification["status"]=='accepted'|| $notification["status"]=='no'): ?>
        <div class="row" style="margin-bottom:20px;">
            <div class="card" style="background-color: #c6e9e9;">
                
                <div class="card-body">
                    <h5 class="card-title" style="color:#00827f">Problem Accepted <i class="fa-solid fa-thumbs-up"></i></h5>
                    <p class="card-text">Thank you for submitting the problem, your Problem ID is <?php echo $notification["id"];?>
                </p>
                </div>
            </div>
            </div>
            <?php endif; ?>
            <?php if($notification["status"]=='rejected'): ?>
            <!-- rejected -->
            <div class="row" style="margin-bottom:20px;">

                <div class="card" style="background-color: #c6e9e9;">
                    
                    <div class="card-body">
                        <h5 class="card-title" style="color:#00827f">Problem Rejected <i class="fa-solid fa-thumbs-down"></i></h5>
                        <p class="card-text">Please try again later.</p>
                    </div>
                </div>
                </div>
            <?php endif; ?>
                <!-- details -->
                <?php if($notification["status"]=='accepted' || $notification["status"]=='yes' || $notification["status"]=='no'): ?>
                <div class="row" style="margin-bottom:20px;">
                    <div class="card" style="background-color: #c6e9e9;">
                       
                        <div class="card-body">
                            <h5 class="card-title" style="color:#00827f">Worker Details <i class="fa-solid fa-helmet-safety"></i></h5>
                            <p class="card-text">
                                Name of the worker: <?php echo $notification["worker_name"]; ?><br>
                                Conatct Number: <?php echo $notification["phone_number"]; ?>
                            </p>
                        </div>
                    </div>
                    </div>
                <!-- date -->
                <div class="row" style="margin-bottom:20px;">

                    <div class="card" style="background-color: #c6e9e9;">
                        
                        <div class="card-body">
                            <h5 class="card-title" style="color:#00827f">Date of Arrival <i class="fa-solid fa-calendar-days"></i></h5>
                            <p class="card-text"><?php echo $notification["date_of_joining"]; ?></p>
                        </div>
                    </div>
                    </div>
                    
                    <!-- yes/no -->
                    <div class="row" style="margin-bottom:20px;">

                        <div class="card" style="background-color: #c6e9e9;">
                            
                            <div class="card-body">
                                <h5 class="card-title" style="color:#00827f">Has the problem been successfully resolved<i class="fa-solid fa-question"></i></h5>
                                <p class="card-text">
                                    
                                    <button type="submit" class="btn btn2" onclick="updateStatus('yes')"
                                        style="color: #fff; font-size: 12px; font-weight: bold;background: #00827f;"> <i class="fa-solid fa-check"></i> YES</button>
                                    <button type="submit" class="btn btn2" onclick="updateStatus('no')"
                                        style="color: #fff; font-size: 12px; font-weight: bold;background: #00827f;"> <i class="fa-solid fa-circle-xmark"></i> NO</button> 
                                    
                                </p>
                            </div>
                        </div>
                        </div>

                        <?php if($notification["status"]=='yes'): ?>

                        <div class="row" style="margin-bottom:20px;">


                        <div class="card" style="background-color: #c6e9e9;">
                                
                                <div class="card-body">
                                    <h5 class="card-title">🥳🥳🥳</h5>
                                    <p class="card-text">That's fantastic! If you need any further assistance in the future, feel free to contact us</p>
                                </div>
                            </div>
                        </div>

                        <?php endif; ?>

                        <?php if($notification["status"]=='no'): ?>
                            <div class="row" style="margin-bottom:20px;">

                                <div class="card" style="background-color: #c6e9e9;">
                                   
                                    <div class="card-body">
                                        <h5 class="card-title">🛠️🧰🙏</h5>
                                        <p class="card-text">Thank you for the update. We'll continue to work on resolving the issue.</p>
                                    </div>
                                </div>
                                </div>
                                <?php endif; ?>
                    <?php endif; ?>
                    <?php else : ?>
                       <h3 style="text-align:center;"> No Updates</h3>
                        <?php endif; ?>
        </div>