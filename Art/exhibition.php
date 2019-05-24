<?php
session_start();
if(!isset($_SESSION['cusid']))
    echo "<script type='text/javascript'>
               alert('Login or Signup First');
               location = 'index.php?login=error';
               </script>";
include_once 'includes/connector.php';
if(isset($_POST["add_to_cart"]))
{
    if(isset($_SESSION["shopping_cart"]))
    {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if(!in_array($_GET["id"], $item_array_id))
        {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_id'			=>	$_GET["id"],
                'item_name'			=>	$_POST["hidden_name"],
                'item_price'		=>	$_POST["hidden_price"],
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        }
        else
        {
            echo '<script>alert("Item Already Added")</script>';
        }
    }
    else
    {
        $item_array = array(
            'item_id'			=>	$_GET["id"],
            'item_name'			=>	$_POST["hidden_name"],
            'item_price'		=>	$_POST["hidden_price"],
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}
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
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="thumbnail-gallery.css">

</head>
<body style="padding-top: 50px; background-color: rgba(166,140,145,0.25);">
<?php include_once 'navbar.php' ?>

<?php
$sql = "Select * from exhibition order by endDate desc ";
$ans = mysqli_query($connect, $sql);
$num = mysqli_num_rows($ans);
if($num > 0){
$sql = "select * from artwork where sold = 0";
$result = mysqli_query($connect, $sql);
?>

<div class="container gallery-container">

    <h1>Ehxibition</h1>

    <p class="page-description text-center">Ehxibition is on going</p>

    <div class="tz-gallery">

        <div class="row">
            <?php
            if(mysqli_num_rows($result) > 0)
                while ($data = mysqli_fetch_assoc($result)) {
                ?>
            <form method="post" action="exhibition.php?action=add&id=<?php echo $data["artworkid"]; ?>">
                <div class="col-md-12">
                    <div class="thumbnail">
                        <a class="lightbox" href="<?php echo $data['path']; ?>">
                            <img src="<?php echo $data['path']; ?>" alt="<?php echo $data['tags']?>">
                        </a>
                        <div class="caption">
                            <h2><?php echo $data['name'] ?></h2>
                            <h3><?php echo $data['description'] ?>.</h3>
                            <hr>
                            <button type="submit" name="add_to_cart" class="btn btn-lg btn-info" style="height: 1.5cm; width: 5cm; font-size: 20px" onclick="window.open('cart.php')">Add to Cart</button>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="hidden_name" value="<?php echo $data["name"]; ?>" />
                <input type="hidden" name="hidden_id" value="<?php echo $data["artworkid"]; ?>" />
                <input type="hidden" name="hidden_price" value="<?php echo $data["price"]; ?>" />
            </form>
                <?php
            }
            else { ?>
                <p class="page-description text-center" style="font-size: 40px">No Artwork To display in Exhibition</p>
           <?php }
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