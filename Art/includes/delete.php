<?php
include_once 'connector.php';
if(isset($_GET['cusid'])){
    $id = $_GET['cusid'];
    $sql = "delete from customer where cusid = '$id' ";
    $result = mysqli_query($connect, $sql);
    $num=mysqli_num_rows($result);
    if($num > 0){
        echo "<script type='text/javascript'>
                alert('Customer Deleted');
                location = '../admin_customer.php';
                </script>";
    } else {
        echo "<script type='text/javascript'>
                alert('No data found');
                location = '../admin_customer.php';
                </script>";
    }
} else if (isset($_GET['artistid'])){
    $id = $_GET['artistid'];
    $sql = "delete from artist where artistid = '$id' ";
    $result = mysqli_query($connect, $sql);
    $num=mysqli_num_rows($result);
    if($num > 0){
        echo "<script type='text/javascript'>
                alert('Succesfully deleted');
                location = '../admin_artist.php';
                </script>";
    } else {
        echo "<script type='text/javascript'>
                alert('No data found');
                location = '../admin_artist.php';
                </script>";
    }
}
else if (isset($_GET['artid'])){
    $id = $_GET['artid'];
    $sql = "delete from artwork where artworkid = '$id' ";
    $result = mysqli_query($connect, $sql);
    $num=mysqli_num_rows($result);
    if($num > 0){
        echo "<script type='text/javascript'>
                alert('Succesfully deleted');
                location = '../admin_picture.php';
                </script>";
    } else {
        echo "<script type='text/javascript'>
                alert('No data found');
                location = '../admin_picture.php';
                </script>";
    }
} else {
    header("Location: ../admin_index.php");
}