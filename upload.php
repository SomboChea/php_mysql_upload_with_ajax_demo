<?php
session_start();

require_once "config.php";

if(empty($_SESSION['username']))
    header("Location: index.php");

if(!empty($_FILES['file'])) {
    /* Getting file name */
    $filename = $_FILES['file']['name'];

    /* Location */
    $location = "upload/".$filename;

    /* Upload file */
    if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
        $sql = "UPDATE users SET user_img = '{$filename}' WHERE username = '{$_SESSION['username']}';";
        $res = mysqli_query($conn,$sql);
        if($res > 0) {
            echo $location;
        } else
            echo 0;
    }else{
        echo 0;
    }

}