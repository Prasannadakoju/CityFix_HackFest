<?php

$is_invalid = false;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = sprintf("SELECT * FROM userlogin
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];
            
            header("Location: userhome.php");
            exit;
        }
}
$is_invalid = true;
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

    <title>LOGIN</title>
</head>

<body
    style=" background-image: url(images/login.png);height: 100%; background-position: center;background-repeat: no-repeat;background-size: cover;">
    <div class="container-fluid">
        <div class="row" style="width:fit-content;">
            <div class="col-md-6 col-lg-6 col-xl-6 col-sm-4 "
                style="margin: 70px; width: 40%; height: 400px;margin-top:15%;margin-left: 200px;">
                <div class="row align-items-center">

                    <h1 style="color: black;"><b>Welcome back!!</b></h1>
                    <p>You are one step closer to simplifying your urban living with CityFix!</p>
                    <?php if ($is_invalid): ?>
                    <em>Invalid login</em>
                    <?php endif; ?>
                    <form method="post">
                    <div style="display: block;">
                        <div class="input-group md-6" style="margin-top: 10px; width: 300px;">
                            <input type="text" class="form-control form-contro-lg bg-light fs-6"
                                style="border-radius: 50px;" placeholder="Username" name="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
                        </div>
                        <div class="input-group md-6" style="margin-top: 10px; width: 300px;">
                            <input type="password" class="form-control form-contro-lg bg-light fs-6"
                                style="border-radius: 50px;" placeholder="Password" name="password">
                        </div>
                    </div>

                    <div class="input-group mb-3" style="text-align: center;">
                        <button class="btn btn-lg btn-success"
                            style="width: 100px; margin-top: 30px; height: 50px; border-radius: 50px; cursor: pointer;">
                            <b>Login</b>
                        </button>
                    </div>
                    </form>
                </div>
                <p style="font-size: 15px; float: left;"> Not a Member?
                <p style="color:black; font-weight: 600 ; font-size: 17px; float: left;"><a href="http://localhost/CityFix/signup.html#"
                        style="text-decoration: none; color: rgb(0, 0, 0);"> Signup</a></p>
                </p>
            </div>

        </div>


    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>