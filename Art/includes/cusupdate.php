<?php
    session_start();
    if(isset($_POST['save'])){
        include_once 'connector.php';
        $name = $_POST['name'];
        $password = $_POST['oldpass'];
        $newPass = $_POST['newpass'];
        $conPass= $_POST['conpass'];
        $username = $_POST['username'];
        //$address = $_POST['address'];
        $number = $_POST['phone'];
        $id = $_SESSION['cusid'];
        $email = $_SESSION['email'];
        $fileName = $_FILES['profile']['name'];
        $fileTmpName = $_FILES['profile']['tmp_name'];
        $fileSize = $_FILES['profile']['size'];
        $fileError = $_FILES['profile']['error'];
        $fileType = $_FILES['profile']['type'];
        $fileNameNew = "";
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allow = array("jpg", "jpeg", "png");
        $sql = "select * from customer where email = '$email' and _password = '$password'";
        $result = mysqli_query($connect, $sql);
        $num = mysqli_num_rows($result);
        if($num == 0){
            echo "<script type='text/javascript'>
                    alert('Old Password Incorrect');
                    location = '../update.php';
                    </script>";
            exit();
        }

        if(in_array($fileActualExt, $allow)){
            if ($fileError === 0){
                if ($fileSize < 1000000000 ){
                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    $fileDestination = '../users/'.$email.'/img/'.$fileNameNew;
                    try{
                        move_uploaded_file($fileTmpName, $fileDestination);
                    }
                    catch (Exception $e){
                        echo $e;
                    }
                } else {
                    echo "<script type='text/javascript'>
                    alert('File too large to upload');
                    location = '../Cusupdate.php';
                    </script>";
                }
            } else {
                echo "<script type='text/javascript'>
                    alert('An Error uploading file');
                    location = '../Cusupdate.php'
                    </script>";
            }
        } else {
            echo "<script type='text/javascript'>
                alert('Choose an image file');
                location = '../Cusupdate.php'
                </script>";
        }
        $profile = 'users/'.$email.'/img/'.$fileNameNew;
        $sql = "update customer set name = '$name', username = '$username', _password = '$newPass', phone = '$number', profilePic = '$profile' where cusid = '$id'";
        mysqli_query($connect, $sql) or die("An Error occurred");
        header("Location: ../customerProfile.php");
    }
    else{
        header("Location: ../cusupdate.php");
    }
?>