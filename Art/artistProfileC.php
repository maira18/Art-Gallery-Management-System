<?php
session_start();
$sql = "";
include_once 'includes/connector.php';
if(!isset($_SESSION['cusid'])) {
    echo "<script type='text/javascript'>
               alert('Login or Signup First');
               location = 'index.php?login=error';
               </script>";
} else if(isset($_GET['aid'])){
    $id = $_SESSION['cusid'];
    $artist = $_GET['aid'];
    $sql = "select * from artist where artistid = '$artist'";

} else {
    header("customerProfile.php");
}
$email = $_SESSION['email'];
$username = $_SESSION['username'];
$type = $_SESSION['type'];
$result= mysqli_query($connect, $sql);
$data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['name'] . "\nProfile"?></title>
    <link rel="stylesheet" href="ArtistProfile/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">
    <link rel="stylesheet" href="ArtistProfile/fonts/ionicons.min.css">
    <link rel="stylesheet" href="ArtistProfile/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="ArtistProfile/css/Social-Icons.css">
</head>

<body style="background-color: rgba(166,140,145,0.25); padding-top: 50px" >
<?php include_once  'navbar.php'; ?>
<div class="row">
    <div class="col-3">
        <div class="container">
            <div id="left-panel">
                <div class="row">
                    <div class="col">
                        <img src="<?php echo $data['profilePicture']?>" class="img-fluid" data-bs-hover-animate="pulse" style="height:250px;width:250px;border-radius:150px;margin-top:35px;">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h1><?php echo $data['name']; ?></h1>
                    </div>
                </div>
                <table>
                    <tr>
                        <a class="btn btn-outline-dark" role="button" href="galleryC.php?aid=<?php echo $artist;?>" id="gallery" style="margin-top:25px;margin-left:60px;color:rgb(0,0,0);background-color:rgba(255,255,255,0);">Gallery</a>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="container">
            <div>
                <?php
                $query = "Select path, description from artwork where artistID = '$artist'";
                $exe = mysqli_query($connect, $query);
                $num = mysqli_num_rows($exe);
                ?>
                <?php
                if($num <=0 ){
                    echo "<p> ". " No Uploads " . "</p>";
                } else {
                    while ($row = mysqli_fetch_assoc($exe)) {
                        ?>
                        <div class="row">
                            <div class="col">
                                <p><img src="<?php echo $row['path']; ?>" alt="image" class="img-fluid" data-bs-hover-animate="pulse" style="height:auto;width:auto;border-radius:10px;margin-top:35px;"></p>
                                <p><h2><?php echo $row['description'] ?></h2></p>
                            </div>
                        </div>
                    <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <div class="col-3">
        <div class="container">
            <div>
                <div class="row">
                    <div class="col">
                    </div>
                </div>
                <div class="row"></div>
            </div>
        </div>
    </div>
</div>
<script src="ArtistProfile/js/jquery.min.js"></script>
<script src="ArtistProfile/bootstrap/js/bootstrap.min.js"></script>
<script src="ArtistProfile/js/bs-animation.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
<script src="ArtistProfile/js/theme.js"></script>
</body>

</html>