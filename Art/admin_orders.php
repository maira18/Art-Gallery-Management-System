<!DOCTYPE html>
<html lang="en">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Orders Details</title>
    <?php
    require_once 'admin_header.php';
    ?>
    <?php
    require_once 'includes/connector.php';
    $sql = "Select * from orders";
    $result = mysqli_query($connect, $sql) or die("Internal Server Error");
    if(isset($_GET['submit']))
    {
        $field = $_GET['sear'];
        $type = $_GET['type'];
        if ($type == 'ID') {
            $sql = "SELECT * FROM orders WHERE orderid like '%$field%' order by orderDate desc";
        } else {
            $sql = "SELECT * FROM orders WHERE orderDate like '%$field%' order by orderDate desc";
        }
        $result = mysqli_query($connect, $sql) or die ("an error occured. Error code 0x0015");
        $num = mysqli_num_rows($result);
        if(!($num > 0))
        {
            echo "<script type='text/javascript'>
        alert('No order Found');
        location = 'admin_orders.php';
      </script>";
        }
    }
    ?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Orders Page</h1>
            </div>
        </div>
        <div class="panel panel-default" style="border: none">
            <span class="bg-info text-white" style="font-size: 20px; font-weight: bold">Search Orders:</span>
            <div class="panel-body" style="margin-left: .1cm">
                <form action="" method="get">
                    <div class="row">
                        <label>Search Item by:</label> <span class="badge badge-pill badge-warning">Date Format Should Be 'YYYY-MM-DD'</span>
                        <select class="form-control" style="width: 8cm" name="type">
                            <option>ID</option>
                            <option>Date</option>
                        </select>
                    </div>
                    <br>
                    <div class="row">
                        <input style="width: 8cm" class="form-control" id="inputsm" type="text" placeholder="Search.." name="sear">
                        <br>

                        <input type="submit" value="Search" name="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="panel panel-info">
                    <div class="panel-heading">Orders</div>
                    <div class="panel-body">
                        <div class="table-responsive table-borderless">
                            <?php
                            if(mysqli_num_rows($result) == 0){
                                echo "<p>No Data Of Orders avaliable</p>>";
                            }
                            else
                            {
                                ?>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Date</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    while ($data = mysqli_fetch_assoc($result)){
                                        echo "<tr>";
                                        echo "<td>". $data['orderid'] ."</td>";
                                        echo "<td>". $data['orderDate'] ."</td>";
                                        echo "<td>". $data['total'] ."</td>";
                                        echo "<td>" .
                                            "<a  href='adminOptions/orderdetail.php?id=" . $data['orderid'] . "'>".
                                            "<input type='button' class='btn btn-info' value='View'></a>".
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
    <?php require_once 'admin_endinf.php'?>
    </body>
</html>