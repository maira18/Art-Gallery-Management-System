<?php
session_start();
if(isset($_SESSION['artistid']) || isset($_SESSION['cusid']))
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
    <title>signup</title>
    <link rel="stylesheet" href="Signup/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="Signup/fonts/ionicons.min.css">
    <link rel="stylesheet" href="Signup/css/styles.css">
</head>

<body style="background-image:url(&quot;Signup/img/bodybackground.jpg&quot;);background-size:cover;background-repeat:no-repeat;">
<nav class="navbar navbar-light navbar-expand-md fixed-top  " style="height:40px; background-color: rgb(0,201,147);">
    <div class="container-fluid"><a class="navbar-brand" href="index.php" data-aos="fade-left"><strong>ART GALLERY</strong></a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1">
            <span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item" role="presentation"><a class="nav-link text-dark active" href="login.php" data-aos="fade-left" data-aos-delay="300">
                        Already have an acccount? | &nbsp;<i class="fa fa-plus"></i>&nbsp;Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div id="signup-info">
                        <br>
                        <h1 style="color: black">Sign up</h1>
                        <p id="signup-para" style="color: black"><br><br>Welcome to the place where you get the best from the people  who are  engaged in an activity related to creating art, practicing the arts, or demonstrating arts.<br>
                            Can buy and give reviews about those masterpieces if you  have or professes to have refined sensitivity toward the beauties of art or nature.<br><br>
                            Take the responsibility to catch you up with the expression or application of human creative skill and imagination,
                            typically in a visual form such as painting or sculpture, producing works to be appreciated primarily for their beauty or
                            emotional power
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <form action="includes/signCheck.php" method="POST">
					<h3 class="text-info"><b style="color: black">Sign Up here...</b></h3><br>
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" placeholder="Name" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" name="email" placeholder="Email" class="form-control" required>
					</div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" placeholder="username" class="form-control" required>
                    </div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" placeholder="Password" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Phone Number</label>
						<input type="number" name="phone" placeholder="Phone number" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Address</label>
						<textarea class="form-control" name="address"></textarea>
					</div>
					<div class="form-group">
						<label>Are You an/a</label><br>
						<input type="radio" name="type" value="artist" required> Artist &emsp;&emsp;
						<input type="radio" name="type" value="customer" required> Customer
					</div>
					<div class="form-group" >
                        <button type="submit" class="btn btn-info submit EdgeButton EdgeButton--primary EdgeButtom--medium" name="submit">Create Account</button>
						<p style="font-size:1.21em;color:;">
							By Clicking <b>Create Account</b> you agree to the terms and conditions
							and you have read our <b><u>Privacy and Policy</u></b>
						</p>
					</div>
				</form>
                </div>
            </div>
        </div>
    </div>
    <script src="Signup/js/jquery.min.js"></script>
    <script src="Signup/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>