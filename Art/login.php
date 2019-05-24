<?php
session_start();
if(isset($_SESSION['aritstid']) || isset($_SESSION['cusid']))
{
    if($_SESSION['type'] == "artist"){
        header("Location: artistProfile.php");
        exit();
    } else {
        header("Location: homepage.php");
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="Login/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="Login/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="Login/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="Login/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="Login/css/styles.css">
    <script type="text/javascript">

    </script>
</head>

<body style="background-image:url(&quot;Login/img/artGallery1.jpg&quot;);">
<nav class="navbar navbar-light navbar-expand-md fixed-top  " style="height:40px; background-color: lightslategrey">
    <div class="container-fluid"><a class="navbar-brand" href="index.php" data-aos="fade-left"><strong>ART GALLERY</strong></a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1">
            <span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item" role="presentation"><a class="nav-link text-dark active" href="signup.php" data-aos="fade-left" data-aos-delay="300">
                        Don't have account | &nbsp;<i class="fa fa-plus"></i>&nbsp;Sign Up</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <div class="login-dark" ">
        <form method="post" class="transparent" action="includes/loginCheck.php" style="background-color: rgba(0,201,147,0.15);">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email" required></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" required></div>
            <div class="form-group"><input class="btn btn-primary btn-block" type="submit" name="login" value="Login" required></div><a href="#" class="forgot">Forgot your email or password?</a></form>
    </div>
    <script src="Login/js/jquery.min.js"></script>
    <script src="Login/bootstrap/js/bootstrap.min.js"></script>
    <script src="Login/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
</body>

</html>