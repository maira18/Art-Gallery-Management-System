<?php
    session_start();
    if(isset($_SESSION['adminid'])){
        header("Location: ../admin_index.php");
        exit();
    }
    if(isset($_POST['admin_login'])){
        include_once 'connector.php';
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "select * from admin where email = '$email' and _password = '$password' ";
        $result  = mysqli_query($connect, $sql) or die("An Error Occurred");

        if(mysqli_num_rows($result) > 0){
            $data = mysqli_fetch_assoc($result);
            $_SESSION['adminid'] = $data['adminid'];
            $_SESSION['adminname'] = $data['name'];
            header("Location: ../admin_index.php");
        } else {
            echo "<script type='text/javascript'>
                alert('Login Error');
                location = '../admin_login.php';
              </script>";
        }

    } else {
        header("Location: ../admin_login.php");
        exit();
    }