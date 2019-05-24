<?php
session_start();
if(!isset($_SESSION['cusid'])){
    header("../index.php");
}
if(isset($_POST['confirm'])){
    $name = $_POST['name'];
    $address = $_POST['address'];
    $cnic = $_POST['cnic'];
    $phone = $_POST['phone'];
    $total = $_POST['total'];
    include_once "connector.php";
    foreach ($_SESSION['shopping_cart'] as $keys=> $values)
    {
        $id = $values['item_id'];
        $sql = "update artwork set sold = 1 where artworkid = '$id'";
        mysqli_query($connect, $sql);
    }
    $orid  = abs( crc32(uniqid()));
    $sql = "insert into orders values ('$orid', now(), '$total')";
    mysqli_query($connect, $sql);
    $cusid = $_SESSION['cusid'];
    foreach ($_SESSION['shopping_cart'] as $keys=> $values){
        $art = $values['item_id'];
        $sql = "select artistID from artwork where artworkID ='$art'";
        $res = mysqli_query($connect, $sql);
        $data = mysqli_fetch_assoc($res);
        $artist = $data['artistID'];
        $sql = "INSERT INTO orderitem(orderID, customerID, artistID, artwork) VALUES ('$orid', '$cusid', '$artist', '$art')";
        mysqli_query($connect, $sql);
    }
    unset($_SESSION['shopping_cart']);
    $_SESSION['shopping_cart'] = NULL;
    echo "<script type='text/javascript'>
        alert('Order Generated');
      </script>";
    header("Location: print.php?id=".urlencode($orid));
    exit();
} else{
    header("../confirmPurchase.php");
}