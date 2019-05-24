<?php
session_start();
if(!isset($_SESSION['cusid']))
{
    echo "<script type='text/javascript'>
        location = '../index.php';
      </script>";
    exit();
}
require 'connector.php';
$id = $_GET['id'];
$sql = "SELECT * FROM orderitem WHERE orderID = '$id'";
$sql1 = "SELECT  orderDate, total from orders where orderid = '$id'";
$result = mysqli_query($connect, $sql) or die ("An Error Occured. Error code 0x0024");
$result1 = mysqli_query($connect, $sql1) or die ("An Error Occured. Error code 0x0025");
$res = mysqli_fetch_assoc($result1);
$date = $res['orderDate'];
$total = $res['total'];
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
    body {
        background-image: linear-gradient(to top, #e6e9f0 0%, #eef1f5 100%)
    }
    page {
        background: white;
        display: block;
        margin: 0 auto;
        margin-bottom: 0.5cm;
        box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
    }
    page[size="A5"] {
        width: 5.3in;
        height: 5.8in;
    }
    @media print {
        body, page {
            margin: 0;
            box-shadow: 0;
        }
    }
</style>
<title>Print</title>
<page size="A5">

    <div class="container" style="max-height: 7.8in; max-width: 5.3in;">
        <h1 class="text-center" style="font-family: Calibri">MAM Art Gallery</h1>
        <br>
        <span class="pull-left">Order Number: <span style="font-weight: bold; font-size: 15px"><?php echo $id?></span></span>
        <span class="pull-right">Date: <span style="font-weight: bold; font-size: 15px"><?php echo $date?></span></span>
        <br><br>
        <table class="table table-hover">
            <tr>
                <th>ArtWork</th>
                <th>Artwork ID</th>
                <th>Artist</th>
                <th>Price</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result))
            {
                $sql = 'SELECT * FROM artwork WHERE artworkid = '.$row['artwork'];
                $result1 = mysqli_query($connect, $sql) or die("An error Occured. Error code 0x0023");
                $arr = mysqli_fetch_assoc($result1);
                $art = $arr['artworkid'];
                ?>
            <tr>
                <td>
                    <img src="<?php echo "../".$arr['path'];?>" class="img-fluid" data-bs-hover-animate="pulse" style="height:50px;width:50px;border-radius:150px;margin-top:35px;">
                </td>
                <td><?php echo $art?></td>
                <?php
                $sql = "select name from artist where artistid = (select artistID from artwork where artworkID ='$art')";
                $res = mysqli_query($connect, $sql);
                $dat = mysqli_fetch_assoc($res);
                ?>
                <td><?php echo $dat['name']?></td>
                <td><?php echo $arr['price']?></td>
            </tr>
            <?php
            }?>
            <tr>
                <td colspan="3" align="right">
                    <span class="badge badge-pill badge-success" style="font-size: 15px">Total:</span>
                    <span style="font-weight: bold; font-size: 17px">
                                <?php echo number_format($total, 2); ?>
                                </span>
                </td>
            </tr>
        </table>
        <br><br>
        <div style="float: bottom;">
            <p></p>
        </div>
    </div>

</page>

<script>
    function print() {
        window.print();
    }
</script>