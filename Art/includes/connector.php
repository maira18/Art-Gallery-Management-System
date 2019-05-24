<?php
    
    $username = "root";
    $passowrd = "";
    $server = "localhost";
    $databaseName = "artgallery";

    $connect =  mysqli_connect($server,$username, $passowrd, $databaseName);
    if($connect->connect_error){
        die( "Error Connecting to database". $connect->connect_error);
    }
    
?>