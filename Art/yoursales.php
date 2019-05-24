<?php
session_start();
if(!isset($_SESSION['artistid']))
    echo "<script type='text/javascript'>
               alert('Login or Signup First');
               location = 'index.php?login=error';
               </script>";
    $id = $_SESSION['artistid'];
    $email = $_SESSION['email'];
    $username = $_SESSION['username'];
    $type = $_SESSION['type'];
    include_once "includes/connector.php";
    $sql="select * from artwork where artistid='$id' and sold=1 ";
    $result= mysqli_query($connect , $sql) or die(" an error occur");
    $total = 0;
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>yoursales</title>
    <link rel="stylesheet" href="yourslaes/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="yourslaes/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="yourslaes/css/Pretty-Product-List.css">
    <link rel="stylesheet" href="yourslaes/css/styles.css">
</head>

<body style="background-color: rgba(166,140,145,0.15);">
<?php include_once  'artistnav.php'; ?>
    <div class="container-fluid" style="padding:50px 50px;">
        <h1 class="text-center" style="padding:16px;">Your sales</h1>
        <div class="row product-list" align="center">
            <?php
                if(mysqli_num_rows($result)<=0)
                {
                    echo("<p> no sales yet !!</p>");
                }
                else {

                    ?>
                    <table class="table table-bordered table-hover" cellspacing="10px" align="center">
                        <tr>
                            <th>Picture</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Tag</th>
                            <th>Price</th>
                        </tr>
                        <?php
                        while ($data = mysqli_fetch_assoc($result)){
                            echo "<tr>";
                            $path =  $data['path'];
                            $total += $data['price'];

                            ?>
                            <td><img src="<?php echo $path?>" class="img-fluid" data-bs-hover-animate="pulse" style=";height:3cm;width:3cm;border-radius:150px;margin-top:35px;"></td>
                            <?php
                            echo "<td style='padding-top: 1.5cm;font-size: 25px'>". $data['name'] ."</td>";
                            echo "<td style='padding-top: 1.5cm; font-size: 25px'>". $data['description'] ."</td>";
                            echo "<td style='padding-top: 1.5cm; font-size: 25px'>". $data['tags'] ."</td>";
                            echo "<td style='padding-top: 1.5cm; font-size: 25px'>". $data['price'] ."</td>";
                            echo "</tr>";
                        }
                        ?>

                    </table>
                    <?php
                }
                    ?>
        </div>
        <div class="row">
            <div class="col">
                <div>
                    <h2 class="text-right">Total:<?php echo $total;?></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div></div>
            </div>
        </div>
    </div>
    <script src="yourslaes/js/jquery.min.js"></script>
    <script src="yourslaes/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>