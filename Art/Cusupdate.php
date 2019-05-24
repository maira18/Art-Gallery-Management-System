<?php
session_start();
if(!isset($_SESSION['cusid']))
    echo "<script type='text/javascript'>
               alert('Login or Signup First');
               location = 'index.php?login=error';
               </script>";
$id = $_SESSION['cusid'];
$email = $_SESSION['email'];
$username = $_SESSION['username'];
$type = $_SESSION['type'];
?>
<?php
include_once 'includes/connector.php';
$sql = "select * from customer where cusid = '$id'";
$result = mysqli_query($connect, $sql) or die("An Error Occurred");
//$connect->prepare()
$data = mysqli_fetch_assoc($result);
?>
<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        function validatePassword() {
            var newpass = document.getElementsByName("newpass")[0].value;
            var confirm = document.getElementByName("conpass")[0].value;
            if(newpass !=  confirm){
                alert("Password not Matched");
                return false;
            }
            alert("Password successfully changed");
            return true;
        }
    </script>
</head>
<body style="background-color: rgba(166,140,145,0.25);padding-top: 50px;">
<?php require_once 'navbar.php';?>
<div class="container" >
    <h2 class="text-center">Edit Profile</h2>
    <hr>
    <form class="form-horizontal" role="form" action="includes/cusupdate.php" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-3">
            <div class="text-center">
                <img src="<?php echo $data['profilePic']?>" class="avatar img-circle" style="margin:5px 5px;box-sizing: border-box; height: 3cm; width: 3cm; border-radius: 50%">
                <h6>Upload a different profile photo...</h6>
                <input type="file" class="form-control" name="profile">
            </div>
        </div>
        <div class="col-md-9 personal-info">
            <h4>Personal info</h4>
            <div class="form-group">
                <label class="col-lg-3 control-label">Name:</label>
                <div class="col-lg-8">
                    <input class="form-control" type="text" name="name" value="<?php echo $data['name']?>" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Contact No:</label>
                <div class="col-md-8">
                    <input class="form-control" type="text" name="phone" value="<?php echo $data['phone']?>" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Username:</label>
                <div class="col-md-8">
                    <input class="form-control" type="text" name="username" value="<?php echo $data['username']?>" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Old Password:</label>
                <div class="col-md-8">
                    <input class="form-control" type="password" name="oldpass" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">New Password:</label>
                <div class="col-md-8">
                    <input class="form-control" type="password" name="newpass" required>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Confirm Password:</label>
                    <div class="col-md-8">
                        <input class="form-control" type="password" name="conpass" required onblur="validatePassword()">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                        <input type="submit" class="btn btn-primary" value="Save Changes" name="save">
                        <input type="reset" class="btn btn-default" value="Cancel">
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    <hr>
</body>
