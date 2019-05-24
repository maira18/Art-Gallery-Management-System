<?php
session_start();
if(isset($_POST['submit'])){
    include_once 'connector.php';
    $oldpass = $_POST['oldpas'];
    $newpass = $_POST['newpas'];
    $id = $_SESSION['adminid'];
    //echo $id;
    //echo '<br>';
    //echo $oldpass. "\n". $newpass;

    $sql = "select _password from admin where adminid = '$id'";
    $result = mysqli_query($connect, $sql);
    $data = mysqli_fetch_assoc($result);
    //echo "\n". $data['_password'];
    if($data['_password'] != $oldpass){
        echo "<script type='text/javascript'>
        alert('Old Password not matched');
        //location = '../admin_password.php';
      </script>";
        //exit();
    } else {
        $sql = "update admin set _password = '$newpass' where adminid = '$id'";
        mysqli_query($connect, $sql);
        echo "<script type='text/javascript'>
        alert('Password Changed Successfully');
        location = '../admin_index.php';
      </script>";
    }

} else {
  header("Location: ../admin_password.php");
  exit();
}