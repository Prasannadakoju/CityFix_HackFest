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
    <link rel="stylesheet" href="adminhome.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>MAP</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<!--model-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!--js -->
<script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="js/validationreset.js" defer></script>

    <!-- map -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <style>
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
        <a href="http://localhost/CityFix/userhome.php" style="text-decoration: none; color:#00827f;margin-left:10px;font-size: 35px;
    margin-left: 20px;
    margin-top: 10px;"><i class="fa-solid fa-arrow-left" id="arrow"></i></a>
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
                    <li><a href="http://localhost/CityFix/notif.php">Notifications</a></li>
                    <li><a href="#3" data-toggle="modal" data-target="#profile">Profile</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- map -->
    <div class="container">
        <div class="row">
            <div class="col">
                <div id="map"></div>
            </div>
        </div>
    </div>

    <!-- Status Images -->
    <div class="container mt-3" style=" margin-left: 25px;margin-left: auto;margin-right: auto;padding: 20px;text-align: center;">
        <div class="row">
            <div class="col status-images">
                <img src="images/problems.png" alt="Submitted">
                Submitted
                <img src="images/inprogress.png" alt="In Progress">
                In Progress
                <img src="images/solved.png" alt="Solved">
                Solved
            </div>
        </div>
    </div>
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
    <!-- footer -->
    <div class="footer" style="margin-top: 20px;">
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
            var map = L.map('map').setView([17.4534,78.6865], 10);
    
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // in-progress
            const data={
             ghatkesar:
             {
                coords:[17.4534,78.6865],
                title:"Ghatkesar",
                address:`<b style="font-size:15px; color:#00827f;">Water</b><br>
                <b>12</b><br>
                <h6 style="color:#206497">In Progress</h6>`,
             },
             uppal:{
                coords:[17.4023,78.5601],
                title:"Uppal",
                address:`<b style="font-size:15px; color:#00827f;">Roads</b><br>
                <b>28</b><br>
                <h6 style="color:#206497">In Progress</h6>`,
             },
             keesara:{
                coords:[17.5236,78.6674],
                title:"Keesara",
                address:`<b style="font-size:15px; color:#00827f;">Animals</b><br>
                <b>19</b><br>
                <h6 style="color:#206497">In Progress</h6>`,
             }
           }

  const customIcon= L.icon(
                {
                    iconUrl: 'images/inprogress.png',
                    iconSize:[50,50],
                }
            )
         for(let key in data)
         {
           const airport=data[key];
           L.marker(airport.coords,{
            title:airport.title,
            icon:customIcon,
           })
           .bindPopup(`<span class="popup">
           ${airport.address}
            </span>`)
           .addTo(map)
        }
        // solved
          const data2={
            bibinagar:
            {
               coords:[17.4726,78.7988],
               title:"Bibinagar",
               address:`<b style="font-size:15px; color:#00827f;">Street Lights</b><br>
               <b>23</b><br>
               <h6 style="color:#206497">Solved</h6>`,
            },
            bhongir:{
               coords:[17.5164,78.8894],
               title:"Bhongir",
               address:`<b style="font-size:15px; color:#00827f;">Garbage</b><br>
               <b>26</b><br>
               <h6 style="color:#206497">Solved</h6>`,
            },
            yaadgirigutta:{
               coords:[17.5806,78.9491],
               title:"Yaadagirigutta",
               address:`<b style="font-size:15px; color:#00827f;">Public Facilities</b><br>
               <b>29</b><br>
               <h6 style="color:#206497">Solved</h6>`,
            }
          }

 const customIcon2= L.icon(
               {
                   iconUrl: 'images/solved.png',
                   iconSize:[50,50],
               }
           )
        for(let key in data2)
        {
          const airport=data2[key];
          L.marker(airport.coords,{
           title:airport.title,
           icon:customIcon2,
          })
          .bindPopup(`<span class="popup">
          ${airport.address}
           </span>`)
          .addTo(map)
       }
       //problems
       const data3={
            choutuppal:
            {
               coords:[17.2397,78.9079],
               title:"Choutuppal",
               address:`<b style="font-size:15px; color:#00827f;">Others</b><br>
               <b>23</b><br>
               <h6 style="color:#206497">Submitted</h6>`,
            },
            bhoodanpochampally:{
               coords:[17.3459,78.8297],
               title:"Bhoodan Pochampally",
               address:`<b style="font-size:15px; color:#00827f;">Drainage</b><br>
               <b>26</b><br>
               <h6 style="color:#206497">Submitted</h6>`,
            },
            jagdevpur:{
               coords:[17.7590,78.7926],
               title:"Jagdevpur",
               address:`<b style="font-size:15px; color:#00827f;">Public Facilities</b><br>
               <b>29</b><br>
               <h6 style="color:#206497">Submitted</h6>`,
            }
          }

 const customIcon3= L.icon(
               {
                   iconUrl: 'images/problems.png',
                   iconSize:[50,50],
               }
           )
        for(let key in data3)
        {
          const airport=data3[key];
          L.marker(airport.coords,{
           title:airport.title,
           icon:customIcon3,
          })
          .bindPopup(`<span class="popup">
          ${airport.address}
           </span>`)
          .addTo(map)
       }
        //database
        const data4={
            location1:
            {
               coords:[latitude,longitude],
               title:location,
               address:`<b style="font-size:15px; color:#00827f;">Others</b><br>
               <b>23</b><br>
               <h6 style="color:#206497">Submitted</h6>`,
            }
          }

 const customIcon4= L.icon(
               {
                   iconUrl: 'images/problems.png',
                   iconSize:[50,50],
               }
           )
        for(let key in data4)
        {
          const airport=data4[key];
          L.marker(airport.coords,{
           title:airport.title,
           icon:customIcon3,
          })
          .bindPopup(`<span class="popup">
          ${airport.address}
           </span>`)
          .addTo(map)
       }
       </script>
       </script>
 </body>
</html>