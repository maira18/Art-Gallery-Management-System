<!DOCTYPE html>
<html lang="en">


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Artwork Details</title>

    <?php
    require_once 'admin_header.php';
    ?>
    <?php
    require_once 'includes/connector.php';
    $sql = "Select * from artwork";
    $result = mysqli_query($connect, $sql) or die("Internal Server Error");
    ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Artwork Page</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col">
                <div class="panel panel-info">
                    <div class="panel-heading">Art Work</div>
                    <div class="panel-body">
                        <div class="table-responsive table-borderless">
                            <?php
                            if(mysqli_num_rows($result) == 0){
                                echo "<p>No Data Of Artwork avaliable</p>>";
                            }
                            else
                            {
                                ?>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Artist Name</th>
                                        <th>Name</th>
                                        <th>Art Work</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    while ($data = mysqli_fetch_assoc($result)){
                                        echo "<tr>";
                                        echo "<td>". $data['artworkid'] ."</td>";
                                        $artistid = $data['artistID'];
                                        $sql = "select name from artist where artistid = '$artistid'";
                                        $r = mysqli_query($connect, $sql);
                                        $name = mysqli_fetch_assoc($r);
                                        echo "<td>". $name['name'] ."</td>";
                                        echo "<td>". $data['name'] ."</td>";
                                        ?>
                                        <td><img src="<?php echo $data['path'];?>" style="height: 1cm; width: 1cm; border-radius: 50%" alt="artwork"></td>
                                        <?php
                                        echo "<td>" .
                                            "<a  href='adminOptions/picturedetail.php?id=" . $data['artworkid'] . "'>".
                                            "<input type='button' class='btn btn-info' value='View'></a>". "\n" .
                                            "<a  href='includes/delete.php?artid=" . $data['artworkid'] . "'>".
                                            "<input type='button' class='btn btn-danger' value='Delete'></a>".
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
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php require_once 'admin_endinf.php'?>

    </body>

</html>
