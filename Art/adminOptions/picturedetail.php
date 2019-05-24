<title>Artist Details</title>
<?php
require_once 'admin_header.php';
require_once '../includes/connector.php';
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM artwork WHERE  artworkid = '$id'";
    $result = mysqli_query($connect, $sql) or die ("Error Occured. Error Code: 0x0012");
    $res = mysqli_num_rows($result);
    if ($res == 0) {
        echo "<script type='text/javascript'>
               alert('No Data Found against given ID');
               location = '../admin_picture.php';
               </script>";
        exit();
    }
}
$data = mysqli_fetch_assoc($result);
$artistid = $data['artistID'];
$sql = "SElect * from artist where artistid = '$artistid'";
$res = mysqli_query($connect, $sql);
$artist = mysqli_fetch_assoc($res);
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
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"></h5>
                </div>
                <div class="card-body">
                    <p class="card-text" style="font-weight: bold"><?php echo $data['description']?>.</p>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div>
                            <img src="<?php echo "../". $data['path'];?>"
                                 alt="image" class="img-fluid" data-bs-hover-animate="pulse"
                                 style="height:380px;width:450px;border-radius:10px;margin-top:15px;"></div>
                    </div>
                    <div class="col-md-5">
                        <div style="margin-left: 20px;">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td>Artist</td>
                                        <td><?php echo $artist['name']?></td>
                                    </tr>
                                    <tr>
                                        <td>Date</td>
                                        <td><?php echo $data['dataOfCreattion']?></td>
                                    </tr>
                                    <tr>
                                        <td>Price</td>
                                        <td><?php echo $data['price']?></td>
                                    </tr>
                                    <tr>
                                        <td>Views</td>
                                        <td><?php echo $data['views']?></td>
                                    </tr>
                                    <tr>
                                        <td>Tag</td>
                                        <td><?php echo $data['tags']?></td>
                                    </tr><tr>
                                        <td>Status</td>
                                        <td><?php if($data['sold'] == 0)echo "Unsold"; else echo "Sold"; ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->



<?php require_once '../admin_endinf.php'?>
