<?php
session_start();
if(!isset($_SESSION['cusid']))
    echo "<script type='text/javascript'>
               alert('Login or Signup First');
               location = 'index.php?login=error';
               </script>";
if($_SESSION['shopping_cart'] == null){
    echo '<script>alert("No Item in cart")</script>';
    echo '<script>window.location="customerProfile.php"</script>';
}
include_once 'includes/connector.php';
$id = $_SESSION['cusid'];
$email = $_SESSION['email'];
$username = $_SESSION['username'];
$type = $_SESSION['type'];
$sql = "Select * from customer where cusid = '$id'";
$result = mysqli_query($connect, $sql);
$data = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>confirm Purchase</title>
    <link rel="stylesheet" href="confirmPurchase/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="confirmPurchase/css/styles.css">
</head>

<body style="background-image: linear-gradient(to top, #e6e9f0 0%, #eef1f5 100%); background-color: rgba(166,140,145,0.25);">
    <?php
        require_once 'navbar.php';
    ?>
    <div class="container">
        <h2 class="text-left text-body" style="margin-left:21px;">Order Confirmation...</h2>
        <div id="purchase-div">
            <h3 class="text-center" style="padding:16px;">Order Information</h3>
            <div class="table-responsive">
                <table class="table table-bordered table-hover" cellspacing="10px" align="center">
                    <tr>
                        <th>Picture</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Artist</th>
                        <th>Price</th>
                    </tr>
                    <?php
                    if(!empty($_SESSION["shopping_cart"]))
                    {
                        $total = 0;
                        foreach($_SESSION["shopping_cart"] as $keys => $values)
                        {
                            ?>
                            <tr>
                                <?php
                                    $artid = $values["item_id"];
                                    $query = "select path from artwork where artworkid = '$artid'";
                                    $ans = mysqli_query($connect, $query);
                                    $path = mysqli_fetch_assoc($ans);
                                ?>
                                <td><img src="<?php echo $path['path'];?>" class="img-fluid" data-bs-hover-animate="pulse" style="height:250px;width:250px;border-radius:150px;margin-top:35px;"></td>
                                <td><?php
                                    echo $artid ?></td>
                                <td><?php echo $values["item_name"]; ?></td>
                                <?php

                                $sql = "select name from artist where artistid = (select artistID from artwork where artworkID ='$artid')";
                                $res = mysqli_query($connect, $sql);
                                $dat = mysqli_fetch_assoc($res);
                                ?>
                                <td> <?php echo $dat['name'] ?></td>
                                <td> <?php echo $values["item_price"]; ?></td>
                            </tr>
                            <?php
                            $total = $total + $values["item_price"];
                        }
                        ?>
                        <tr>
                            <td colspan="3" align="right"><strong>Total</strong></td>
                            <td align="right"> <?php echo number_format($total, 2); ?></td>
                            <td></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
        <hr>
        <div id="info-div">
            <h3>Dilivery Information</h3>
            <form action="includes/orderStore.php" method="post">
                <div class="form-group">
                    <div class="form-row">
                        <div class="col"><label>Name:&nbsp;</label><input class="form-control" type="text" name="name" value="<?php echo $data['name']?>"></div>
                        <div class="col"><label>Phone Number:&nbsp;</label><input class="form-control" name="phone" type="text" value="<?php echo $data['phone']?>"></div>
                        <input type="hidden" name="total" value="<?php echo $total; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col"><label>CNIC:&nbsp;</label><input class="form-control" name="cnic" type="text"></div>
                        <div class="col"><label>Email:&nbsp;</label><input class="form-control" type="text" value="<?php echo $data['email']?>"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col"><label>Address:&nbsp;</label><textarea name="address" class="form-control" value="<?php echo $data['address']?>"></textarea></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col"><button class="btn btn-primary" type="submit" onclick="window.open('homepage.php')" name="confirm">Confirm Order</button></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="confirmPurchase/js/jquery.min.js"></script>
    <script src="confirmPurchase/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>