<?php
    $servername = "localhost";
    $username  =  "root";
    $password  =  "";
    //create connetion
    $connection = new mysqli($servername, $username, $password);
    //checke connetion
    if($connection->connect_error) {
        die("Connetion failed: ". $connection->connet_error);
    }
    //create database
    $db_sql = "CREATE DATABASE IF NOT EXISTS registration";
    if($connection->query($db_sql) === TRUE) {
       //echo "Database created sucessfully";
    }else{
      //  echo "Error " . $connection ->error;
    }
    
    
    $connection = mysqli_connect("localhost" , "root", "", "registration");

    $users_sql = "CREATE TABLE IF NOT EXISTS users(
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30) NOT NULL,
        email VARCHAR(30) NOT NULL,
        password VARCHAR(30) NOT NULL
        )";
        
       
    if($connection->query($users_sql) === TRUE) {
     //  echo "Table created sucessfully";
    }else{
     //   echo "Error " . $connection->error;
    }
    $connection->close();
?>
