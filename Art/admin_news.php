<!DOCTYPE html>
<html lang="en">


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>News Details</title>

    <?php
    require_once 'admin_header.php';
    require_once 'includes/connector.php';
    if(isset($_POST['submit'])){
        $news = $_POST['news'];
        $subject = $_POST['subject'];
        $sql = "insert into news (subject, description, broadcastDate) values ('$subject', '$news', now())";
        mysqli_query($connect, $sql);
            echo "<script type='text/javascript'>
                alert('News Broadcasted');
                location = 'admin_news.php';
                </script>";
    }
    ?>
    <?php
    $sql = "Select * from news order by broadcastDate";
    $result = mysqli_query($connect, $sql) or die("Internal Server Error");
    ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">News Page</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="panel panel-default" style="border: none">
            <span class="bg-info text-white" style="font-size: 20px; font-weight: bold">Broadcast new News:</span>
            <div class="panel-body" style="margin-left: .1cm">
                <form action="" method="post">
                    <div class="row">
                        <label>Subject:</label>
                        <input style="width: 8cm" class="form-control" id="inputsm" type="text" placeholder="Subject.." name="subject">
                    </div>
                    <br>
                    <div class="row">
                        <label>News:</label>
                        <textarea class="form-control" name="news"></textarea>
                        <br>
                        <input type="submit" value="Broadcast" name="submit" class="btn btn-primary">
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
                                echo "<p>No Data Of News avaliable</p>";
                            }
                            else
                            {
                                ?>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Subject</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    while ($data = mysqli_fetch_assoc($result)){
                                        echo "<tr>";
                                        echo "<td>". $data['id'] ."</td>";
                                        echo "<td>". $data['subject'] ."</td>";
                                        echo "<td>". $data['broadcastDate'] ."</td>";
                                        echo "<td>" .
                                            "<a  href='adminOptions/news.php?id=" . $data['id'] . "'>".
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
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php require_once 'admin_endinf.php'?>

    </body>

</html>
