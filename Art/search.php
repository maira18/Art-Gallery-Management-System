<?php
session_start();
if(!isset($_SESSION['cusid'])){
    echo "<script type='text/javascript'>
               alert('Login or Signup First');
               location = 'index.php?login=error';
               </script>";
}
include_once 'includes/connector.php';
$id = $_SESSION['cusid'];
$type = $_SESSION['type'];
if(isset($_POST['search'])) {
    $field = $_POST['field'];
    $sql = "select * from artist where name like '%$field%' ";
    $result = mysqli_query($connect, $sql);
} else {
    header("Location: customerProfile.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Untitled</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="customerProfile/css/styles.css">
</head>

<body style="background-color: rgba(166,140,145,0.25); padding-top: 50px;">
<?php
require_once 'navbar.php';
?>

<div class="container">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12" align="left">
                <h1 class="page-header">Search</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col">
                <div class="panel panel-info">
                    <div class="panel-heading">Search Results</div>
                    <div class="panel-body">
                        <div class="table-responsive table-borderless">
                            <?php
                            if(mysqli_num_rows($result) == 0){
                                echo "<p>No Data Found</p>";
                            }
                            else
                            {
                                ?>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Profile Picture</th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    while ($data = mysqli_fetch_assoc($result)){
                                        echo "<tr>";
                                        ?>
                                        <td><img class="img-fluid" data-bs-hover-animate="pulse" style="height:2cm;width:2cm;border-radius:150px;margin-top:35px;" src="<?php echo $data['profilePicture']?>"></td>
                                        <?php
                                        echo "<td>". $data['artistid'] ."</td>";
                                        echo "<td>". $data['name'] ."</td>";
                                        echo "<td>" .
                                            "<a  href='artistProfileC.php?aid=" . $data['artistid'] . "'>".
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
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>