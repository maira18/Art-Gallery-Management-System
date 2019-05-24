<?php
session_start();
if(isset($_SESSION['cusid'])){
    header("Location: ../homepage.php");
} else if(isset($_SESSION['artistid'])) {
    header("Location: ../artistprofile.php");
}
if(isset($_POST['submit'])){
    include_once 'connector.php';
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $address = $_POST['address'];
    $type = $_POST['type'];
    $number = $_POST['phone'];
    $profile = "upload/default/default.png";
    $sql = "Select * from customer where email = '$email'";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_num_rows($result);
    if($row > 0){
        echo "<script type='text/javascript'>
        alert('Email Already Registred as Customer');
        location = '../signup.php';
      </script>";
        exit();
    } else {
        $sql = "Select * from artist where email = '$email'";
        $row = mysqli_num_rows(mysqli_query($connect, $sql));
        if($row > 0) {
            echo "<script type='text/javascript'>
        alert('Email Already Registred as Artist');
        location = '../signup.php';
      </script>";
            exit();
        }
    }
    $sql = "insert into customer (name, _password, email, username, address, phone, profilePic) values  ('$name','$password','$email'," .
        "'$username', '$address','$number', '$profile')";
    if($type == "artist"){
        $sql = "insert into artist (name, password, email, username, address, phone, profilePicture) values  ('$name','$password','$email'," .
            "'$username', '$address','$number', '$profile')";
    }
    if (!file_exists("../users/$email")) {
        mkdir("../users/$email", 0755);
    }
    if (!file_exists("../users/$email/img")) {
        mkdir("../users/$email/img", 0755);
    }
    $row = mysqli_query($connect, $sql) or die("Error occured");
    $sql = "Select cusid from customer where email = '$email'";
    if($type == "artist"){
        $sql = "Select artistid from artist where email = '$email'";
    }

    $result = mysqli_fetch_assoc(mysqli_query($connect, $sql));
    $_SESSION['shopping_cart'] = NULL;
    if($type == "artist"){
        $_SESSION['artistid'] = $result['artistid'];
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['type'] = $type;
        echo "<script type='text/javascript'>
        alert('Sign up Successfully');
        location = '../artistProfile.php';
      </script>";
    } else{
        $_SESSION['cusid'] = $result['cusid'];
        $_SESSION['username'] = $username;
        $_SESSION['type'] = $type;
        $_SESSION['email'] = $email;
        echo "<script type='text/javascript'>
        alert('Sign up Successfully');
        location = '../homepage.php';
      </script>";
    }
}
else{
    header("Location: ../signup.php?sign=Error");
}
?>