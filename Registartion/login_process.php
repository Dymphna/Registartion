<?php
session_start();
require "config.php";
if(isset($_SESSION['username'])){
    header('location:index.php');
}
if(isset($_POST['login_user'])){
    $username=mysqli_real_escape_string($connection, $_POST['username']);
    $password=mysqli_real_escape_string($connection, md5($_POST['password']));

    $query=mysqli_query($connection, "SELECT * From users where username='$username' and password='$password'") or die(mysqli_error($connection));
    if (mysqli_num_rows($query) > 0) {
            $_SESSION['username']=$username;
            $_SESSION['email']=$email;
             header("location:index.php");
    }else {
            //  array_push($errors, "Wrong username/password combination"); 
            echo "<script> alert('Username or Password Incorrect!') </script>";
    }
}
?>