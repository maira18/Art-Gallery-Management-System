<?php
session_start();
if(isset($_SESSION['artistid']))
{
    header("Location: artistProfile.php");
    exit();
} else if(isset($_SESSION['cusid'])) {
        header("Location: homepage.php");
        exit();
    }
else if(isset($_SESSION['adminid'])){
    header("Location: admin_index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link rel="stylesheet" href="index/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="index/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="index/fonts/material-icons.min.css">
    <link rel="stylesheet" href="index/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="index/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="index/css/Footer-Dark.css">
    <link rel="stylesheet" href="index/css/Header-Dark.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="index/css/Simple-Slider.css">
    <link rel="stylesheet" href="index/css/styles.css">
</head>

<body style="height:auto; background-color: rgba(166,140,145,0.15);">
    <nav class="navbar navbar-light navbar-expand-md fixed-top  " style="height:40px; background-color: rgb(0,201,147);">
        <div class="container-fluid"><a class="navbar-brand" href="index.php" data-aos="fade-left"><strong>ART GALLERY</strong></a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1">
                <span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link text-dark active" href="#services" target="_top" data-aos="fade-left">SERVICES</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link text-monospace text-dark" href="#about-us" target="_top" data-aos="fade-left" data-aos-delay="50">ABOUT US</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link text-dark" href="login.php" data-aos="fade-left" data-aos-delay="150">LOGIN</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link text-dark" href="signup.php" data-aos="fade-left" data-aos-delay="200">SIGNUP</a></li>
                </ul>
        </div>
        </div>
    </nav>
    <section class="flex-shrink-1" id="welcome" style="padding:130px;height:700px;background-size:cover; background-image:url(&quot;index/back.jpg&quot;);">
        <div class="jumbotron jumbotron-fluid flex-shrink-1 flex-wrap" style="background-color: rgba(166,140,145,0.70);width:750px;margin:50px; margin-left:250px;padding:100px;height:300px;">
            <h1><i>Welcome to our Website</i></h1>
            <p style="font-size:22px; margin-top: 20px;">Exploring the fascinating world of ART</p>
            <p style="font-size:20px;"><i>"Make it as simple as possible, but not simpler."</i></p>
        </div>
    </section>
    <section id="services" style="font-size: 24px ;height:auto;width:auto;margin-left:50px;margin-top:50px;">
        <h1 style="margin-top: 50px;">Services</h1>
        <h2 style="margin-top: 20px;">Innovation to the Art</h2>
        <div id="service-image" class="img-fluid">
            <div class="row flex-shrink-1" id="item-ser">
                <div class="col-md-4 services-items" style="padding-right:50px;"><i class="material-icons" id="why" style="font-size:60px;">art_track</i>
                    <h2 style="margin-top:-5px;font-size:30px;">What We Do</h2>
                    <p>Take the responsibility to catch you up with the expression or application of human creative skill and imagination,
                        typically in a visual form such as painting or sculpture, producing works to be appreciated primarily for their beauty or
                        emotional power.<br></p>
                </div>
                <div class="col-md-4 services-items" style="padding-right:50px;"><i class="fa fa-heart" id="why" style="font-size:60px;"></i>
                    <h2 style="margin-top:0px;font-size:30px">Why We Do</h2>
                    <p>To communicate ideas, such as in spiritually, or philosophically motivated art; to create a sense of beauty
                        (see aesthetics); to explore the nature of perception; for pleasure; or to generate strong emotions.<br>
                    </p>
                </div>
                <div class="col-md-4 services-items" style="padding-right:50px;"><i class="material-icons" id="why" style="font-size:60px;">camera</i>
                    <h2 style="margin-top:-5px;font-size:30px;">How We Do</h2>
                    <p>By reducing the distance and creating a helpful bridge between the people who are  engaged in an activity related to creating art,
                        practicing the arts, or demonstrating an art and  who have or professes to have refined sensitivity toward the beauties of art
                        or nature.<br></p>
                </div>
            </div><br><br>
        </div>
    </section>
    <section id="about-us">
        <div class="jumbotron" style="height:164px; background-color: rgba(166,140,145,0.20);" >
            <h1 data-aos="fade-right" data-aos-delay="200">About Us</h1>
            <p class="text-center" data-aos="fade-left" data-aos-delay="200" style="font-size:24px;">Innovation to the Art</p>
        </div>
        <div class="container">
            <div class="block-heading"></div>
            <div class="row justify-content-center">
                <div class="col-sm-6 col-lg-4" data-aos="fade-left" data-aos-delay="250">
                    <div class="card clean-card text-center"><img class="card-img-top w-100 d-block" style="height: 310px;"src="index/img/Wallpaer-HD_jpg(1).jpg" data-bs-hover-animate="pulse" style="height:216px;">
                        <div class="card-body info">
                            <h4 class="card-title">Mahnoor</h4>
                            <p class="card-text">Student at PUCIT.</p>
                            <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i class="icon-social-instagram"></i></a><a href="#"><i class="icon-social-twitter" style="margin-left:5px;"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4" data-aos="fade-up" data-aos-delay="250">
                    <div class="card clean-card text-center"><img class="card-img-top w-100 d-block" src="index/img/Wallpaer-HD_jpg(1).jpg" data-bs-hover-animate="pulse">
                        <div class="card-body info">
                            <h4 class="card-title">Maira Akram</h4>
                            <p class="card-text">Student at PUCIT.</p>
                            <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i class="icon-social-instagram"></i></a><a href="#"><i class="icon-social-twitter" style="margin-left:5px;"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4" data-aos="fade-right" data-aos-delay="250">
                    <div class="card clean-card text-center"><img class="card-img-top w-100 d-block" src="index/img/Wallpaer-HD_jpg(1).jpg" data-bs-hover-animate="pulse">
                        <div class="card-body info">
                            <h4 class="card-title">Aqleema Sajjid</h4>
                            <p class="card-text">Student at PUCIT.</p>
                            <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i class="icon-social-instagram"></i></a><a href="#"><i class="icon-social-twitter" style="margin-left:5px;"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>
    <hr>

    <div class="footer-dark" style="background-color: rgba(166,140,145,0.20);color: black;">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item">
                        <h3>Services</h3>
                        <ul>
                            <li><a href="#services">What we do</a></li>
                            <li><a href="#services">Why we do</a></li>
                            <li><a href="#services">How we do</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 item">
                        <h3>About</h3>
                        <ul>
                            <li><a href="index.php">Company</a></li>
                            <li><a href="#about-us">Team</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 item text">
                        <h3>Company Name</h3>
                        <p>Welcome to the place where you get the best from the people
                            who are  engaged in an activity related to creating art, practicing the arts, or demonstrating arts.
                            Can buy and give reviews about those masterpieces
                            if you  have or professes to have refined sensitivity toward the beauties of art or nature.</p>
                    </div>
                </div>
                <p class="copyright">Company Name © 2018</p>
            </div>
        </footer>
    </div>
    <script src="index/js/jquery.min.js"></script>
    <script src="index/bootstrap/js/bootstrap.min.js"></script>
    <script src="index/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="index/js/Simple-Slider.js"></script>
</body>

</html>