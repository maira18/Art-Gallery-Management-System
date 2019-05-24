<?php
session_start();
if(!isset($_SESSION['type'])){
    echo "<script type='text/javascript'>
               alert('Login or Signup First');
               location = 'index.php?login=error';
               </script>";
}
 $id = "";

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>news</title>
    <link rel="stylesheet" href="news/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril+Fatface">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amita">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="news/css/styles.css">
</head>

<body style=" background-color: rgba(166,140,145,0.25);">
    <?php
        if($_SESSION['type'] == "artist")
            {require_once 'artistnav.php';
                $id = $_SESSION['artistid'];
            }
        else
        {require_once 'navbar.php';
            $id = $_SESSION['cusid'];
    }
    include_once 'includes/connector.php';
    $email = $_SESSION['email'];
    $username = $_SESSION['username'];
    $type = $_SESSION['type'];
    $sql = "select * from news";
    $result = mysqli_query($connect, $sql);
    ?>
    <h2 class="text-center text-secondary" data-aos="zoom-in-up" data-aos-once="true" style="margin:58px;">NEWS</h2>
    <div>
        <div class="container">
            <div class="row" style="margin:37px;">
                <div class="col">
                    <div class="table-responsive">
                        <?php
                        if(mysqli_num_rows($result) == 0){
                            echo "<p>No Data Of News avaliable</p>";
                        }
                        else
                        {
                            ?>
                            <table class="table table-responsive table-bordered" style="border-color:black;">
                                <thead>
                                <tr align="center">
                                    <th><h2>Date</h2></th>
                                    <th><h2>Subject</h2></th>
                                    <th><h2>News</h2></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                while ($data = mysqli_fetch_assoc($result)){
                                    echo "<tr>";
                                    echo "<td>"."<h4>". $data['broadcastDate'] ."</h4>"."</td>";
                                    echo "<td>"."<h4>". $data['subject']."</h4>" ."</td>";
                                    echo "<td>"."<h4>". $data['description'] ."</h4>"."</td>";
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
    <script src="news/js/jquery.min.js"></script>
    <script src="news/bootstrap/js/bootstrap.min.js"></script>
    <script src="news/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
</body>

</html>