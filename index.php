<?php
session_start();

if(!empty($_SESSION['username']))
    header("Location: home.php");

require_once "config.php";

if(isset($_POST['btn-login'])) {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $usr = $_POST['username'];
        $pwd = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username = '{$usr}' AND password = '{$pwd}';";
        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)>0){
            $_SESSION['username'] = $usr;
            header("Location: home.php");
        } else
            echo "Error";
    }
}


if(isset($_GET['logout'])){
    session_destroy();
    header("Location: index.php");
}

?>

<form action="index.php" method="post">
    <input type="text" placeholder="Username" name="username">
    <input type="password" placeholder="Password" name="password">
    <input type="submit" name="btn-login">
</form>
