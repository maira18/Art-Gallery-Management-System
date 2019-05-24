<!DOCTYPE html>
<html lang="en">


<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>Customer Details</title>

<?php
require_once 'admin_header.php';
?>
<?php
require_once 'includes/connector.php';
$sql = "Select * from customer";
$result = mysqli_query($connect, $sql) or die("Internal Server Error");
if(isset($_GET['search']))
{
    $field = $_GET['sear'];
    $sql = "SELECT * FROM customer WHERE name like '%$field%'";
    $result = mysqli_query($connect, $sql) or die("An Error occured.");
    $num = mysqli_num_rows($result);
    if(!($num >0))
    {
        echo "<script type='text/javascript'>
        alert('No Record Found');
        location = 'admin_customer.php';
      </script>";
    }
}
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Customer Page</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="panel panel-default" style="border: none">
        <span class="bg-info text-white" style="font-size: 20px; font-weight: bold">Search by Customer Name:</span>
        <div class="panel-body" style="margin-left: .1cm">
            <form action="" method="get">
                <div class="row">
                    <input style="width: 8cm" class="form-control" id="inputsm" type="text" placeholder="Search.." name="sear">
                    <br>
                    <input type="submit" value="Search" name="search" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="panel panel-info">
                <div class="panel-heading">Customer</div>
                <div class="panel-body">
                    <div class="table-responsive table-borderless">
                        <?php
                        if(mysqli_num_rows($result) == 0){
                            echo "<p>No Data Of Customers</p>";
                        }
                        else
                        {
                            ?>
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                while ($data = mysqli_fetch_assoc($result))
                                {
                                    echo "<tr>";
                                    echo "<td>". $data['cusid'] ."</td>";
                                    echo "<td>". $data['name'] ."</td>";
                                    echo "<td>". $data['email'] ."</td>";
                                    echo "<td>". $data['phone'] ."</td>";
                                    echo "<td>" .
                                        "<a  href='adminOptions/cusdetail.php?cusid=" . $data['cusid'] . "'>".
                                        "<input type='button' class='btn btn-info' value='View'></a>"."\n" .
                                        "<a  href='includes/delete.php?cusid=" . $data['cusid'] . "'>".
                                        "<input type='button' class='btn btn-danger' value='Delete' name='delete'></a>"."\n".
                                        "</td>";
                                    echo "</tr>";
                                }
                                ?>
                                </tbody>
                            </table>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /#wrapper -->

<?php require_once 'admin_endinf.php'?>

</body>

</html>
