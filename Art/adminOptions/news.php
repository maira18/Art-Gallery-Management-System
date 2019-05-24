<title>News Details</title>
<?php
require_once 'admin_header.php';
require_once '../includes/connector.php';
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM news WHERE  id = '$id'";
    $result = mysqli_query($connect, $sql) or die ("Error Occured. Error Code: 0x0012");
    $res = mysqli_num_rows($result);
    if ($res == 0) {
        echo "<script type='text/javascript'>
               alert('No Data Found against given ID');
               location = '../admin_news.php';
               </script>";
        exit();
    }
    $data = mysqli_fetch_assoc($result);
}
else {
    header("Location: ../admin_news.php");
}
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo "News Details " ?> </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col">
            <div class="panel panel-info">
                <div class="panel-heading"><?php echo "ID: \n " . $data['id']?></div>
                <div class="panel-body">
                    <div class="table-responsive table-borderless">
                        <table class="table table-striped table-bordered table-hover">
                            <tr>
                                <td>Subject: </td>
                                <td><?php echo $data['subject']?></td>
                            </tr>
                            <tr>
                                <td>Broadcast Date: </td>
                                <td><?php echo $data['broadcastDate']?></td>
                            </tr>
                            <tr>
                                <td>News: </td>
                                <td><?php echo $data['description']?></td>
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
