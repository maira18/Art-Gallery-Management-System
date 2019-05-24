<?php
session_start();
$sql = "";
include_once 'includes/connector.php';
if(!isset($_SESSION['cusid'])) {
    echo "<script type='text/javascript'>
               alert('Login or Signup First');
               location = 'index.php?login=error';
               </script>";
}
else if(isset($_GET['aid'])){
    $id = $_SESSION['cusid'];
    $artist = $_GET['aid'];

} else {
    header("customerProfile.php");
}
$email = $_SESSION['email'];
$username = $_SESSION['username'];
$type = $_SESSION['type'];
$sql = "select * from artwork where artistID = '$artist'";
$sql1 = "select name from artist where artistID = '$artist'";
$result= mysqli_query($connect, $sql);
$result1 = mysqli_query($connect, $sql1);
$name = mysqli_fetch_assoc($result1);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $name['name']. "\n"?>gallery</title>
    <link rel="stylesheet" href="gallery/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="gallery/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Akronim">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amita">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Archivo+Black">
    <link rel="stylesheet" href="gallery/css/Filterable-Gallery-with-Lightbox.css">
    <link rel="stylesheet" href="gallery/css/styles.css">
</head>

<body style="padding-top: 50px; background-color: rgba(166,140,145,0.25);">
<?php
require_once 'navbar.php';
?>
<div class="container">
    <div class="container flex-grow-1" style="margin:16px 16px;background-color: rgba(166,140,145,0.30);padding:16px 16px;font-family:'Archivo Black', sans-serif;color:rgb(59,11,88);">
        <h1 class="text-center"><?php echo $name['name']. "\n"?>GALLERY</h1>
        <div class="row filtr-container">
            <?php
            $num = mysqli_num_rows($result);
            if($num <= 0) {
                echo "No Artwork in the Gallery!!";
            }
            else
                {
                while($data= mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="col-6 col-sm-4 col-md-3 filtr-item" data-category="1">
                            <a href="#">
                            <img class="img-fluid" src="<?php echo $data['path']?>" alt="image"></a>
                        <p>
                            <?php echo $data['description']?><br><br>
                        </p>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>
<script src="gallery/js/jquery.min.js"></script>
<script src="gallery/bootstrap/js/bootstrap.min.js"></script>
<script src="gallery/js/Filterable-Gallery-with-Lightbox.js"></script>
</body>

</html>