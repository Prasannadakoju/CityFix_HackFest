<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM userlogin
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
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
        <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="js/validationreset.js" defer></script>
    
    <link rel="stylesheet" href="userhome.css">
    <title>UserHome</title>
</head>

<body
    style="background: #1CD8D2;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #93EDC7, #1CD8D2);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #93EDC7, #1CD8D2); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */">
    <nav class="navbar fixed-top navbar-expand-md navbar-light bg-light" style="background: #1CD8D2;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #93EDC7, #1CD8D2);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #93EDC7, #1CD8D2); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */;
           height:13%;box-shadow: 0 1px 7px rgb(57, 181, 186)">
        <div class="container-fluid ">
            <a href="#" class="navbar-brand mx-auto-3">
                <i class="fa-solid fa-tree-city" style="color:#00827f;font-size:30px"></i>
                <span id="logo-name" style="color:#00827f; font-size:xx-large;"><b><span
                            style="color: #fff; font-weight: bold; font-size:xxx-large;">C</span>ity<span
                            style="color: #fff; font-weight: bold; font-size:xxx-large;">F</span>ix</b></span>
            </a>
            <div class="sidebar">
                <ul id="sidemenu">
                    <li><a href="http://localhost/CityFix/userhome.php">Home</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="notif.php?id=<?php echo $user["id"]; ?>">Notifications</a></li>
                    <li><a href="#contact" data-toggle="modal" data-target="#profile">Profile</a></li>
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

                </div>
                <div class="modal-body">
                    <i class="fa-solid fa-envelope"></i>
                    <?php if (isset($user)): ?>
                    <p><?= htmlspecialchars($user["email"]) ?><p>
                    <?php endif; ?>
                    <h5>Update Password</h5>
                    <form action="passwordreset.php" method="post" id="reset" novalidate>
                    <input type="text" name="email" value="<?php echo $user['email']; ?>" hidden>
                    <p style="font-size:13px; font-weight:bold; color:#00827f">New Password:</p>
                    <input type="password" name="new_password" id="new_password" style="border-radius: 4px; border:none; height:35px; width: 400px; background-color: #cfebeb;color:black " required><br><br>
                    <p style="font-size:13px; font-weight:bold; color:#00827f">Confirm Password:</p>
                    <input type="password" name="confirm_password" id="confirm_password" style="border-radius: 4px; border:none; height: 35px; width: 400px; background-color: #cfebeb;color:black" required><br><br>
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

    <!-- 2nd -->

    <div class="container-fluid " style="  margin-top: 90px;height:600px; background: url(images/homeimg.jpeg); " id="part2">

        <div class="row">

            <div class="col-xl-6 col-lg-6 col-md-6" style=" margin: auto; width: 100%; padding: 10px">
                <div class="content">
        
                    <div class="floating" style="color: white;">
                    <p style="font-size:50px;">Empowering Communities,</p>
                    <p style="font-size:50px;">Building Better Cities <i class="fa-solid fa-building-circle-check"
                            style="color:#00827f"></i></p></div>
                    <p style="font-size: larger;color:rgb(181, 169, 169);">Join us on our journey to transform cities <br>one issue at
                        a time. Together, we can create cleaner,
                        safer, and more vibrant<br> communities for generations to come</p>
                </div>

            </div>
        </div>

    </div>


    <!-- 3rd -->


    <div class="container-fluid " style="height:auto;">
        <div class="row">

            <div class="col-xl-6 col-lg-6 col-md-6" style=" margin: auto; width: 100%; padding: 10px">
                <div class="content">
                    <h3 style="font-family:Arial, Helvetica, sans-serif;font-weight: 700;color: #00544F; font-size:45px">SERVICES</h3>
                    <p style="font-size:45px;">Things you can do with CityFix....</p>
                    <p style="font-size: larger;color: #555555;">Discover the possibilities with CityFix, empowering you
                        to report municipal issues, track progress, and collaborate towards a cleaner, safer
                        city.</br></p>
                </div>

            </div>
           
        </div>
        </div>


      
        <!-- service -->
    <div id="services" class="py-5">
        <div class="container-fluid">
            <div class="services-list">
                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <img src="images/gif2.gif" alt="Responsive Website" class="img-fluid rounded-lg"
                            style="height: 500px;width:500px; border-radius: 18px; margin-top: 65px;">
                    </div>
                    <div class="col-lg-6">
                        <div class="ser text-white rounded-lg p-4 mb-4" style="border:4px solid white; margin-top:200px;">
                            <i class="fa-solid fa-circle-question fa-3x"></i>
                            <h2 class="mb-3">Report a Problem</h2>
                            <p class="font-size-medium">
                                Whether it's waste management, sewage, drainage, water supply, or any other municipal
                                concern, our platform empowers you to report issues directly and provide visual
                                documentation.
                            </p>
                            <a href="http://localhost/CityFix/reportuser.php">Learn more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- 4th -->
    <div class="home2">
        <div class="row">
        <img src="images/home2.jpeg" alt="" class="img-fluid" id="home2img">
    </div>
    </div>


    <!-- footer -->
    <div class="footer" style="margin-top:80px;">
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
            <p>Copyright©ARPDHK. Made with <i class="fa-solid fa-heart"></i> <b>@Team Coderella Squad</b></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>
