<?php
    session_start();
    include_once 'connector.php';
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(empty($email) || empty($password)){
            echo "<script type='text/javascript'>
        alert('Empty fields');
        location = '../login.php';
      </script>";
            exit();
        } else{
            $sql = "select * from customer where email = '$email' and _password = '$password'";
            $result = mysqli_query($connect, $sql);
            $row = mysqli_num_rows($result);
            if($row  == 0){
                $sql = "select * from artist where email = '$email' and password = '$password'";
                $resultArtist = mysqli_query($connect, $sql);
                $num = mysqli_num_rows($resultArtist);
                if($num == 0){
                    // error
                    echo "<script type='text/javascript'>
                            alert('no user found');
                            location = '../login.php';
                        </script>";
                    exit();
                } else{
                    $artistData = mysqli_fetch_assoc($resultArtist);
                    $_SESSION['artistid'] = $artistData['artistid'];
                    $_SESSION['username'] = $artistData['username'];
                    $_SESSION['email'] = $artistData['email'];
                    $_SESSION['type'] = "artist";
                    $_SESSION['shopping_cart'] = NULL;
                    header("Location: ../artistProfile.php");
                }

            } else{
                $data = mysqli_fetch_assoc($result);
                $_SESSION['cusid'] = $data['cusid'];
                $_SESSION['username'] = $data['username'];
                $_SESSION['email'] = $data['email'];
                $_SESSION['type'] = "customer";
                $_SESSION['shopping_cart'] = NULL;
                header("Location: ../homepage.php");
            }
        }
    }
    else{
        header("Location: ../login.php");
    }