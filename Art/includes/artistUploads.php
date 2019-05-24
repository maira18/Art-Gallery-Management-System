<?php
session_start();
if(isset($_POST['upload'])){
    include_once 'connector.php';
    $email = $_SESSION['email'];
    $name = $_POST['name'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $price= $_POST['price'];
    $date = $_POST['date'];
    $id = $_SESSION['artistid'];
    $fileName = $_FILES['picture']['name'];
    $fileTmpName = $_FILES['picture']['tmp_name'];
    $fileSize = $_FILES['picture']['size'];
    $fileError = $_FILES['picture']['error'];
    $fileType = $_FILES['picture']['type'];
    $fileNameNew = "";
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allow = array("jpg", "jpeg", "png");
    if(in_array($fileActualExt, $allow)){
        if ($fileError === 0){
            if ($fileSize < 100000000000 ){
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = '../users/'.$email.'/img/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
            } else {
                echo "<script type='text/javascript'>
                    alert('File too large to upload');
                    location = '../uploadArt.php';
                    </script>";
            }
        } else {
            echo "<script type='text/javascript'>
                    alert('An Error uploading file');
                    location = '../uploadArt.php'
                    </script>";
        }
    } else {
        echo "<script type='text/javascript'>
                alert('Choose an image file');
                location = '../uploadArt.php'
                </script>";
    }
    $path = 'users/'.$email.'/img/'.$fileNameNew;
    $sql = "insert into artwork(artistID, name,description,	price, dataOfCreattion, tags, path) values ('$id', '$name', '$description', '$price', '$date', '$category', '$path')";
    mysqli_query($connect, $sql) or die("An Error occurred");
    echo "<br>";
    header("Location: ../artistprofile.php");
}
else{
    header("Location: ../uploadArt.php");
}
?>