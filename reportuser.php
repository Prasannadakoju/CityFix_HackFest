<?php


    
$mysqli = require __DIR__ . "/database.php";
    
$sql = "SELECT * FROM userlogin";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();


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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="reportuser.css">
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="js/validationreset.js" defer></script>
    <title>reportuser</title>
    <!-- image video styling -->
    <style>
    /* video */
    .new-media {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    width: 100%;
    min-height: 100vh;
}

#video-area {
    width: 483px;
    height: 300px;
    padding: 30px;
    background: #fff;
    text-align: center;
    border-radius: 20px;
}

#image-area {
    width: 500px;
    height: 400px;
    padding: 30px;
    background: #fff;
    text-align: center;
    border-radius: 20px;
}

#video-view,
#img-view {
    width: 100%;
    height: 100%;
    border-radius: 20px;
    border: 2px dashed #bbb5ff;
    background: #ecf4f3;
    background-position: center;
    background-size: cover;
}

#video-view img{
    width: 100px;
   
}
#img-view img {
    width: 100px;
    margin-top: 25px;
}

#video-view span{
    display: block;
    font-size: 12px;
    color: #777;
    
}
#img-view span {
    display: block;
    font-size: 12px;
    color: #777;
    margin-top: 15px;
}

</style>
</head>

<body style="background: #1CD8D2;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #93EDC7, #1CD8D2);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #93EDC7, #1CD8D2); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */">
    <nav class="navbar fixed-top navbar-expand-md navbar-light bg-light" style="background: #1CD8D2;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #93EDC7, #1CD8D2);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #93EDC7, #1CD8D2); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */;
           height:13%;box-shadow: 0 1px 7px rgb(57, 181, 186)">
        <a href="http://localhost/CityFix/userhome.php" style="text-decoration: none; color:#00827f;margin-left:10px;"><i class="fa-solid fa-arrow-left" id="arrow"></i></a>
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
                    <h2>Hi! <?= htmlspecialchars($user["name"]) ?>😊</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <i class="fa-solid fa-envelope"></i>
                    <p><?= htmlspecialchars($user["email"]) ?></p>
                    
                    
                    <form action="passwordreset.php" method="post" id="reset" novalidate>
                    <input type="text" name="email" value="<?php echo $user['email']; ?>" hidden>
                    <p style="font-size:13px; font-weight:bold; color:#00827f">New Password:</p>
                    <input type="password" name="new_password" id="new_password"style="border-radius: 4px; border:none; height:35px; width: 400px; background-color: #cfebeb;color:black "><br><br>
                    <p style="font-size:13px; font-weight:bold; color:#00827f">Confirm Password:</p>
                    <input type="password" name="confirm_password" id="confirm_password" style="border-radius: 4px; border:none; height: 35px; width: 400px; background-color: #cfebeb;color:black"><br><br>
                    <button type="submit" class="btn btn2"style="color: #fff; font-size: 12px; font-weight: bold;background: #00827f;">Submit</button>
                    </form>


                </div>
                <div class="modal-footer">
                    <button type="submit" onclick="logout()" class="btn btn2"
                        style="color: white; font-size: 14px; font-weight: bold;background: #00827f;"><i
                            class="fa-solid fa-rotate-left"></i>
                        Log Out</button>

                </div>
                <script>
                            function logout() {
                            window.location.href = "selectuser.html";
                            }
                            </script>
            </div>
        </div>
    </div>


    <!-- cards -->
    <div class="container-fluid" style="margin-top:90px;" id="cards1">
        <div class="row" style="margin-left:100px;">
            <div class="col">
                <h2 style="color:#0a5251; font-size:50px">Categories</h2>
                <h6 style="color: rgb(101, 102, 102);"><i>Select an option</i></h6>
            </div>
        </div>
    </div>

    <form action="processform.php" method="post" enctype="multipart/form-data">
    <div class="container-fluid" id="cards">
        <div class="row" id="row1">
            <div class="col">
                <div class="card" onclick="toggleCheckbox(this)">
                    <i class="fas fa-check checkmark"></i>
                    <div class="card-body">
                        <h5 class="card-title">Water</h5>
                        <div class="icon">
                            <i class="fa-solid fa-faucet-drip" id="icon1"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" onclick="toggleCheckbox(this)">
                    <i class="fas fa-check checkmark"></i>
                    <div class="card-body">

                        <h5 class="card-title">Garbage</h5>
                        <div class="icon">
                            <i class="fa-solid fa-trash" id="icon2"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" onclick="toggleCheckbox(this)">
                    <i class="fas fa-check checkmark"></i>
                    <div class="card-body">

                        <h5 class="card-title">Roads</h5>
                        <div class="icon">
                            <i class="fa-solid fa-road" id="icon3"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" onclick="toggleCheckbox(this)">
                    <i class="fas fa-check checkmark"></i>
                    <div class="card-body">
                        <h5 class="card-title">Drainage</h5>
                        <div class="icon">
                            <i class="fa-solid fa-dumpster" id="icon4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="row2">
            <div class="col">
                <div class="card" onclick="toggleCheckbox(this)">
                    <i class="fas fa-check checkmark"></i>
                    <div class="card-body">
                        <h5 class="card-title">Animals</h5>
                        <div class="icon">
                            <i class="fa-solid fa-dog" id="icon5"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" onclick="toggleCheckbox(this)">
                    <i class="fas fa-check checkmark"></i>
                    <div class="card-body">
                        <h5 class="card-title">Street lights</h5>
                        <div class="icon">
                            <i class="fa-solid fa-lightbulb"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" onclick="toggleCheckbox(this)">
                    <i class="fas fa-check checkmark"></i>
                    <div class="card-body">
                        <h5 class="card-title">Public Facilities</h5>
                        <div class="icon">
                            <i class="fa-solid fa-toilet"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" onclick="toggleCheckbox(this)">
                    <i class="fas fa-check checkmark"></i>
                    <div class="card-body">
                        <h5 class="card-title"> Others</h5>
                        <div class="icon">
                            <i class="fa-solid fa-users-line"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>
    <!-- categories defined above-->
    <script>
        function toggleCheckbox(selectedCard) {
            var cards = document.querySelectorAll('.card');
            cards.forEach(function (card) {
                if (card !== selectedCard) {
                    card.classList.remove('selected');
                    card.querySelector('.checkmark').style.display = 'none';
                }
            });
    
            selectedCard.classList.toggle('selected');
            var checkmark = selectedCard.querySelector('.checkmark');
            checkmark.style.display = selectedCard.classList.contains('selected') ? 'block' : 'none';
    
            // Update the form input value
            var selectedCardTitle = selectedCard.querySelector('.card-title').innerText;
            document.getElementById('selectedCardTitle').value = selectedCardTitle;
        }
    </script>

    <!-- image video-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6" style="margin-top: 100px;">


                <p style="font-size:22px; font-weight:bold; margin-left:70px; color:#00827f">Problem Category</p>
                    <input type="text" id="selectedCardTitle" name="selectedCardTitle" readonly
                        style="border-radius: 4px; border:none; height: 40px; width: 500px; margin-left: 70px; background-color: #f6f8f8;"
                        ><br><br>
                
                    <p style="font-size:22px; font-weight:bold; margin-left:70px; color:#00827f">Problem Title</p>
                    <input type="text" name="problem_title"
                        style="border-radius: 4px; border:none; height: 40px; width: 500px; margin-left: 70px; background-color: #f6f8f8;"
                        placeholder=" Please enter the title of the problem"><br><br>
                    <p style="font-size:20px; font-weight:bold; margin-left: 70px; color:#00827f">Problem Description
                    </p>
                    <textarea name="problem_description"
                        style="border-radius: 4px; border:none; height: 120px; width: 500px; margin-left: 70px; background-color: #f6f8f8;"
                        placeholder=" Explain the issue you're facing"></textarea>



                        <p style="font-size:20px; font-weight:bold; margin-left: 70px; color:#00827f">Location</p>
                        <select name="location"
                            style="border-radius: 4px; border:none; height: 40px; width: 500px; margin-left: 70px; background-color: #f6f8f8;">
                            <option value="" disabled selected hidden > ----- </option>
                            <option value="Hyderbad">Hyderbad</option>
                            <option value="Karimnagar">Karimnagar</option>
                            <option value="Nalgonda">Nalgonda</option>
                            <option value="Nijambad">Nijambad</option>
    
                        </select><br><br>
                    <p style="font-size:20px; font-weight:bold; margin-left: 70px; color:#00827f">Location Description
                    <p style="font-size: 10px; font-weight:light;  margin-left: 70px">
                        <i>H.No,Street,Landmark,City,Postal Code,State,Country</i>
                    </p>
                    </p>
                    <textarea name="location_description"
                        style="border-radius: 4px; border:none; height: 120px; width: 500px; margin-left: 70px; background-color: #f6f8f8;"
                        placeholder=" Enter your location:"></textarea>


                <h1 class="status" hidden></h1>

                <input type="hidden" name="latitude" id="latitude">
                <input type="hidden" name="longitude" id="longitude">
                <button type="button" class="find-state">Use my current location</button>
                <!-- <button type="submit" style="display: none;" id="submitBtn">Submit</button> -->

                <script>
                const findMyState = () => {
                const status = document.querySelector('.status');
                const latitudeInput = document.getElementById('latitude');
                const longitudeInput = document.getElementById('longitude');

                const success = (position) => {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;
                status.textContent =' Latitude: ${latitude}, Longitude: ${longitude}';
                latitudeInput.value = latitude;
                longitudeInput.value = longitude;
                //     document.getElementById('submitBtn').click(); // Auto-submit the form
                };

                const error = () => {
                status.textContent = 'Unable to retrieve your location';
                };

                navigator.geolocation.getCurrentPosition(success, error);
                };

                document.querySelector('.find-state').addEventListener('click', findMyState);
                </script>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6" style="  margin-top: 150px;">
                <!-- video -->
            <div class="new-video">
                <p id="video-link-paragraph" hidden></p>
                <label for="video-input-file" id="video-area">
                <input type="file" accept="video/*" id="video-input-file" name="uploaded_video" hidden>
                <div id="video-view">
                    <img src="images/camera.jpg" alt="camera" style="width: 200px;">
                    <p style="cursor: pointer;">Drag and drop or click here <br>to upload a video</p>
                    <span style="cursor: pointer; font-size:10px;">Upload any video from the desktop</span>
                </div>
                </label>
                  </div>
            <div class="new-image">
                <p id="image-link-paragraph" hidden></p>
                <label for="image-input-file" id="image-area">
                <input type="file" accept="image/*" id="image-input-file" name="uploaded_image" hidden>
                <div id="img-view">
                    <img src="images/camera.jpg" alt="camera" style="width: 200px;">
                    <p style="cursor: pointer;">Drag and drop or click here <br>to upload an image</p>
                    <span style="cursor: pointer;">Upload any image from the desktop</span>
                </div>
                </label>
            </div>
            </div>
        </div>
    </div>

    <!-- user -->
    <div class='container-fluid' style="margin-bottom:0 ;background-color:#00827f;height:90px;margin-top:30px;margin-top:50px">
        <h1 style="font-size:60px;text-align: center;color: white;">Enter Your Details</h1>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <img src="images/newgif.gif" alt="responsive webite" class="img-fluid"
                    style="box-shadow: 0 5px 10px rgb(57, 181, 186); border-radius: 50%; margin-left:100px; margin-top: 80px; height: 400px; width: 400px;">
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6" style="margin-top: 100px;">
                <form action="">
                    <p style="font-size:22px; font-weight:bold; margin-left: 40px; color:#00827f"> Name</p>
                    <input type="text" name="user_name"
                        style="border-radius: 4px; border:none; height: 40px; width: 500px; margin-left: 40px; background-color: #d4dcdb;"
                        placeholder=" Enter your name"><br><br>
                    <p style="font-size:22px; font-weight:bold; margin-left: 40px; color:#00827f"> Phone No:</p>
                    <input type="text" name="phone_number"
                        style="border-radius: 4px; border:none; height: 40px; width: 500px; margin-left: 40px; background-color: #d4dcdb;"
                        placeholder=" Enter your phone number"><br><br>
                    <p style="font-size:22px; font-weight:bold; margin-left: 40px; color:#00827f"> Email:</p>
                    <input type="email" name="email"
                        style="border-radius: 4px; border:none; height: 40px; width: 500px; margin-left: 40px; background-color: #d4dcdb;"
                        placeholder=" Enter your email-id"><br><br>
                    <div class="container">
                        <div class="btn1" id="btn">
                            <button type="submit" class="btn btn2" onclick="home()"
                                style="color: #fff; font-size: 14px; font-weight: bold;">SUBMIT</button>
                                <script>
                                    function admin() {
                                    window.location.href = "http://localhost/CityFix/userhome.php";
                                    }
                                    </script>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </form>
    <!-- footer -->
    <div class="footer" style="margin-top:80px;">
        <div class="copyright">
            <p>Copyright©ARPDHK. Made with <i class="fa-solid fa-heart"></i> <b>@Team Coderella Squad</b></p>
        </div>
    </div>
    <p><script>
    window.embeddedChatbotConfig = {
    chatbotId: "VH39OKZNJC__f7CHmF3nE",
    domain: "www.chatbase.co"
    }
    </script>
    <script
    src="https://www.chatbase.co/embed.min.js"
    chatbotId="VH39OKZNJC__f7CHmF3nE"
    domain="www.chatbase.co"
    defer>
    </script></p>
    <!-- video script -->
    <script>
    const videoDropArea = document.getElementById("video-area");
    const videoInputFile = document.getElementById("video-input-file");
    const videoView = document.getElementById("video-view");
    const videoLinkParagraph = document.getElementById("video-link");

    videoInputFile.addEventListener("change", uploadVideo);

    function uploadVideo() {
        const videoFile = videoInputFile.files[0];
        const videoUrl = URL.createObjectURL(videoFile);

        // Create video element
        const videoElement = document.createElement("video");
        videoElement.src = videoUrl;
        videoElement.controls = true;
        videoElement.style.maxWidth = "100%";
        videoElement.style.maxHeight = "100%";

        // Append video element to video view
        videoView.innerHTML = "";
        videoView.appendChild(videoElement);

        // Display video link
        videoLinkParagraph.textContent = "Video URL: " + videoUrl;
    }
</script>
<!-- image script -->
<script>
const imageDropArea=document.getElementById("image-area");
const imageInputFile=document.getElementById("image-input-file");
const imageView=document.getElementById("img-view");
const imageLinkParagraph = document.getElementById("image-link");
imageInputFile.addEventListener("change",uploadImage);

function uploadImage()
{
imageInputFile.files[0];
let imgLink=URL.createObjectURL( imageInputFile.files[0]);
imageView.style.backgroundImage=`url('${imgLink}')`;
imageView.textContent="";
imageView.style.border=0;
imageLinkParagraph.textContent = "Image Link: " + imgLink;
}
</script>
</body>

</html>