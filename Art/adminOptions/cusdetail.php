<title>Customer Details</title>
<?php
    require_once 'admin_header.php';
    require_once '../includes/connector.php';
    $id = $_GET['cusid'];
    $sql = "SELECT * FROM customer WHERE  cusid = '$id'";
    $result = mysqli_query($connect, $sql) or die ("Error Occured. Error Code: 0x0012");
    $res = mysqli_num_rows($result);
    if($res == 0)
    {
        echo "<script type='text/javascript'>
               alert('No Data Found against given ID');
               location = '../admin_customer.php';
               </script>";
        exit();
    }
    $data = mysqli_fetch_assoc($result);
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $data['name'] . "\nDetails " ?> </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col">
            <div class="panel panel-info">
                <div class="panel-heading"><?php echo "ID: \n " . $data['cusid']?></div>
                <div class="panel-body">
                    <div class="table-responsive table-borderless">
                        <table class="table table-striped table-bordered table-hover">
                            <tr>
                                <td>Profile Pic: </td>
                                <td><img src="<?php echo "../".$data['profilePic']?>" style="height: 3cm; width: 3cm; border-radius: 50%"></td>
                            </tr>
                            <tr>
                                <td>Name: </td>
                                <td><?php echo $data['name']?></td>
                            </tr>
                            <tr>
                                <td>Email: </td>
                                <td><?php echo $data['email']?></td>
                            </tr>
                            <tr>
                                <td>Username: </td>
                                <td><?php echo $data['username']?></td>
                            </tr>
                            <tr>
                                <td>Phone Number: </td>
                                <td><?php echo $data['phone']?></td>
                            </tr>
                            <tr>
                                <td>Address: </td>
                                <td><?php echo $data['address']?></td>
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
