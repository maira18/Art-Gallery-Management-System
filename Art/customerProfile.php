<?php
session_start();
if(!isset($_SESSION['cusid'])){
    echo "<script type='text/javascript'>
               alert('Login or Signup First');
               location = 'index.php?login=error';
               </script>";
}
include_once 'includes/connector.php';
$id = $_SESSION['cusid'];
$email = $_SESSION['email'];
$username = $_SESSION['username'];
$type = $_SESSION['type'];
$sql = "select * from customer where cusid = '$id'";
$result = mysqli_query($connect, $sql);
$data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['name'] ."\nprofile"?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="customerProfile/css/styles.css">
</head>

<body style="background-color: rgba(166,140,145,0.25); padding-top: 50px;">
<?php
require_once 'navbar.php';
?>
<div class="row">
    <div class="col-3">
        <div class="container">
            <div id="left-panel">
                <div class="row">
                    <div class="col">
                        <img src="<?php echo $data['profilePic'];?>"class="img-fluid" data-bs-hover-animate="pulse" style="height:250px;width:250px;border-radius:150px;margin-top:35px;">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h1><?php echo $data['name']; ?></h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <a class="btn btn-outline-dark" role="button" href="Cusupdate.php" data-bs-hover-animate="pulse" id="settings" style="margin-top:25px;margin-left:60px;color:rgb(0,0,0);background-color:rgba(255,255,255,0);">Settings</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <a class="btn btn-outline-dark" role="button" href="cart.php" data-bs-hover-animate="pulse" id="view-sales" style="margin-top:25px;margin-left:60px;color:rgb(0,0,0);background-color:rgba(255,255,255,0);">View cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="container">
            <div></div>
        </div>
    </div>
    <div class="col-3">
        <div class="container">
            <div>
                <div class="row">
                    <div class="col">
                        <form action="search.php" method="post">
                            <div class="form-row">
                                <div class="col"><input class="form-control" type="search" name="field" style="width:180px;"></div>
                                <div class="col"><button class="btn btn-primary" type="submit" name="search" style="width:66px;">Search</button></div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row"></div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>