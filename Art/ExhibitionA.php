<?php
session_start();
if(!isset($_SESSION['artistid']))
    echo "<script type='text/javascript'>
               alert('Login or Signup First');
               location = 'index.php?login=error';
               </script>";
$id = $_SESSION['artistid'];
$email = $_SESSION['email'];
$username = $_SESSION['username'];
$type = $_SESSION['type'];
$id = $_SESSION['artistid'];
include_once 'includes/connector.php';
$sql = "select * from artwork where sold = 0";
$result = mysqli_query($connect, $sql);
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ehxition</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <link rel="stylesheet" href="main.css" type="text/css">
    <link rel="stylesheet" href="thumbnail-gallery.css">

</head>
<body style="padding-top: 50px">
<?php include_once 'artistnav.php'?>
    <?php
        $sql = "Select * from exhibition order by endDate desc ";
        $ans = mysqli_query($connect, $sql);
        $num = mysqli_num_rows($ans);
        if($num > 0){

    ?>

    <div class="container gallery-container">

        <h1>Ehxibition</h1>

        <p class="page-description text-center">Ehxibition is on going</p>

        <div class="tz-gallery">

            <div class="row">
                <?php
                if(mysqli_num_rows($result)>0)
                    while ($data = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="col-md-6">
                        <div class="thumbnail">
                            <a class="lightbox" href="<?php echo $data['path']; ?>">
                                <img src="<?php echo $data['path']; ?>" alt="<?php echo $data['tags']?>">
                            </a>
                            <div class="caption">
                                <h2><?php echo $data['name'] ?></h2>
                                <h3><?php echo $data['description'] ?>.</h3>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                else { ?>
                    <p class="page-description text-center" style="font-size: 40px">No Artwork to Show</p>
                <?php
                }
                ?>
            </div>
        </div>
        <?php
        } else { ?>

            <p class="page-description text-center" style="font-size: 40px">No Exhibition</p>

            <?php
        }
        ?>

</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.tz-gallery');
</script>
</body>
</html>