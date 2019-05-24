<?php
session_start();
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
                'item_artist'		=>	$_GET["hidden_artist"],
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
            'item_artist'		=>	$_GET["hidden_artist"],
            'item_price'		=>	$_POST["hidden_price"],
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}
if(isset($_GET["action"]))
{
    if($_GET["action"] == "delete")
    {
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
            if($values["item_id"] == $_GET["id"])
            {
                unset($_SESSION["shopping_cart"][$keys]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="cart.php"</script>';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>
    <link rel="stylesheet" href="cart/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="cart/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="cart/css/Pretty-Product-List.css">
    <link rel="stylesheet" href="cart/css/styles.css">
</head>

<body style="background-image: linear-gradient(to top, #e6e9f0 0%, #eef1f5 100%); padding-top: 50px  background-color: rgba(166,140,145,0.25);">
    <?php
        require_once 'navbar.php';
    ?>
    <div class="container-fluid" style="padding:50px 50px;  background-color: rgba(166,140,145,0);">
        <h1 class="text-center" style="padding:16px;">Your cart</h1>
        <h3>Order Details</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Artist</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                <?php
                if(!empty($_SESSION["shopping_cart"]))
                {
                    $total = 0;
                    foreach($_SESSION["shopping_cart"] as $keys => $values)
                    {
                        ?>
                        <tr>
                            <td><?php
                                $artid = $values["item_id"];
                                echo $artid ?></td>
                            <td><?php echo $values["item_name"]; ?></td>
                            <?php

                                $sql = "select name from artist where artistid = (select artistID from artwork where artworkID ='$artid')";
                                $res = mysqli_query($connect, $sql);
                                $data = mysqli_fetch_assoc($res);
                            ?>
                            <td> <?php echo $data['name'] ?></td>
                            <td> <?php echo $values["item_price"]; ?></td>
                            <td><a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
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
                <tr>
                    <td align="right" colspan="5"><a href="confirmPurchase.php" class="btn btn-primary" >Confirm Order</a></td>
                </tr>
            </table>
        </div>
    </div>
    <script src="cart/js/jquery.min.js"></script>
    <script src="cart/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>