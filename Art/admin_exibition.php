<!DOCTYPE html>
<html lang="en">


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Exibition Details</title>

    <?php
    require_once 'admin_header.php';
    require_once 'includes/connector.php';
    ?>
    <?php
    $sql = "Select * from exhibition ";
    $result = mysqli_query($connect, $sql) or die("Internal Server Error");
    ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Exhibition</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="panel panel-default" style="border: none">
            <span class="bg-info text-white" style="font-size: 20px; font-weight: bold">Broadcast new Exhibition:</span>
            <div class="panel-body" style="margin-left: .1cm">
                <form action="includes/startexhibition.php" method="post">
                    <div class="row">
                        <label>Starting Date:</label>
                        <input style="width: 8cm" class="form-control" id="inputsm" type="date" name="start">
                    </div>
                    <div class="row">
                        <label>End Date:</label>
                        <input style="width: 8cm" class="form-control" id="inputsm" type="date" name="end">
                    </div>
                    <br>
                    <div class="row">
                        <br>
                        <input type="submit" value="Set Exhibition" name="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col">
                <div class="panel panel-info">
                    <div class="panel-heading">News</div>
                    <div class="panel-body">
                        <div class="table-responsive table-borderless">
                            <?php
                            if(mysqli_num_rows($result) == 0){
                                echo "<p>No Data Of Exhibition avaliable</p>";
                            }
                            else
                            {
                                ?>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    while ($data = mysqli_fetch_assoc($result)){
                                        echo "<tr>";
                                        echo "<td>". $data['id'] ."</td>";
                                        echo "<td>". $data['startDate'] ."</td>";
                                        echo "<td>". $data['endDate'] ."</td>";
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
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php require_once 'admin_endinf.php'?>

    </body>

</html>
