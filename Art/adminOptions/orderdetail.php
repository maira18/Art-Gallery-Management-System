<?php
require_once 'admin_header.php';

if(isset($_GET['id'])){
    include_once '../includes/connector.php';
    $id = $_GET['id'];
    $OrderSql = "select * from orders where orderid = '$id'";
    $itemsSql = "select * from orderitem where orderID = '$id'";
    $OrderResult = mysqli_query($connect, $OrderSql);
    $num = mysqli_num_rows($OrderResult);
    if($num == 0)
    {
        echo "<script type='text/javascript'>
               alert('No Data Found against given ID');
               location = '../admin_orders.php';
               </script>";
        exit();
    }
    $itemResult = mysqli_query($connect, $itemsSql);
    $order = mysqli_fetch_assoc($OrderResult);
}
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Order No. &nbsp;<?php echo $order['orderid'] . "\nDetails " ?> </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Order &nbsp;<?php echo $order['orderid']?> &nbsp;Items
                </div>
                <div class="panel-body">
                    <div class="table-responsive table-borderless">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Artwork</th>
                                    <th>Artwork ID</th>
                                    <th>Artwork Price</th>
                                </tr>
                            </thead>
                            <?php
                                while ($item = mysqli_fetch_assoc($itemResult)) {
                                    $art = $item['artwork'];
                                    $cusid = $item['customerID'];
                                    $sql = "select * from artwork where artworkid = '$art'";
                                    $result = mysqli_query($connect, $sql);
                                    $dat = mysqli_fetch_assoc($result);
                                    ?>
                                    <tr>
                                        <td>
                                            <img src="<?php echo "../".$dat['path']?>" style="height: 1cm; width: 1cm; border-radius: 50%" alt="artwork">
                                        </td>
                                        <td><?php echo $dat['artworkid']?></td>
                                        <td><?php echo $dat['price']?></td>
                                    </tr>

                                    <?php
                                }?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="panel panel-info">
                <div class="panel-heading">
                    <?php echo "ID: \n " . $order['orderid']?>
                </div>
                <div class="panel-body">
                    <div class="table-responsive table-borderless">
                        <table class="table table-striped table-bordered table-hover">
                            <tr>
                                <td>Order Date:</td>
                                <td><?php echo $order['orderDate'];?></td>
                            </tr>
                            <tr>
                                <td>Order By: </td>
                                <td><?php
                                    $sql = "select * from customer where cusid = '$cusid'";
                                    $result = mysqli_query($connect, $sql);
                                    $data = mysqli_fetch_assoc($result);
                                    echo $data['name'];
                                    ?></td>
                            </tr>
                            <tr>
                                <td>Customer Phone: </td>
                                <td><?php echo $data['phone']?></td>
                            </tr>
                            <tr>
                                <td>Customer Address </td>
                                <td><?php echo $data['address']?></td>
                            </tr>
                            <tr>
                                <td>Total: </td>
                                <td>PKR. &nbsp;<?php echo $order['total']?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

</div>


<?php require_once '../admin_endinf.php'?>

