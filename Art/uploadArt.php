<?php
session_start();
if(!isset($_SESSION['artistid'])){
    echo "<script type='text/javascript'>
               alert('Login or Signup First');
               location = 'index.php?login=error';
               </script>";
}
$id = $_SESSION['artistid'];
$email = $_SESSION['email'];
$username = $_SESSION['username'];
$type = $_SESSION['type'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>uploadArt</title>
    <link rel="stylesheet" href="uploadArt/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="uploadArt/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amarante">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amaranth">
    <link rel="stylesheet" href="uploadArt/css/-Login-form-Page-BS4-.css">
    <link rel="stylesheet" href="uploadArt/css/Drag--Drop-Upload-Form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="uploadArt/css/Jumbotron-Circular-Addon.css">
    <link rel="stylesheet" href="uploadArt/css/Profile-Edit-Form.css">
    <link rel="stylesheet" href="uploadArt/css/Profile-Edit-Form.css">
    <link rel="stylesheet" href="uploadArt/css/styles.css">
</head>

<body style="background:url(uploadArt/img/aldain-austria-316143-unsplash.jpg) no-repeat;background-size:cover;">
    <?php require_once 'artistnav.php';?>
    <div style="width:600px;">
        <div class="container" style="margin-right:-50px;">
            <div class="row" style="margin-right:50px;">
                <div class="col">
                    <form style="margin-top:80px;margin-right:25px;" action="includes/artistUploads.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" type="text" name="name" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <input class="form-control" type="text" name="category" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control"  name="description" placeholder="Description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input class="form-control" type="number" name="price" placeholder="Price" required>
                        </div>
                        <div class="form-group">
                            <label>Date</label>
                            <input class="form-control" type="date" name="date" required></div>
                        <div class="form-group">
                            <label>Choose Art</label>
                            <input class="form-control" id="files" type="file" name="picture" required />
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit"  name="upload" style=";margin-left:380px;background-color:rgb(0,201,147);">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="uploadArt/js/jquery.min.js"></script>
    <script src="uploadArt/bootstrap/js/bootstrap.min.js"></script>
    <script src="uploadArt/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="uploadArt/js/Profile-Edit-Form.js"></script>
</body>

</html>