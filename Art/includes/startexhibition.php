<?php
if(isset($_POST['submit'])){
    include_once 'connector.php';
    $start = $_POST['start'];
    $end = $_POST['end'];
    $sql = "SELECT * FROM exhibition WHERE id = (SELECT max(id) FROM exhibition)";
    $res = mysqli_query($connect, $sql);
    if($res != null) {
        $data = mysqli_fetch_assoc($res);
        if($data['endDate'] < $start ) {
            $sql = "insert into exhibition(startDate, endDate) values ('$start', '$end')";
            mysqli_query($connect, $sql) or die("Error");
            echo "<script type='text/javascript'>
                alert('Exhibition Started');
                location = '../admin_exibition.php';
                </script>";
        } else {
            echo "<script type='text/javascript'>
                alert('Exhibition Already Going');
                location = '../admin_exibition.php';
                </script>";
        }
    } else {
        $sql = "insert into exhibition(startDate, endDate) values ('$start', '$end')";
        mysqli_query($connect, $sql) or die("Error");
        echo "<script type='text/javascript'>
                alert('Exhibition Started');
                location = '../admin_exibition.php';
                </script>";
    }
}

?>