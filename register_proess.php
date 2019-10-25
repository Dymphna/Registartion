<?php
require "config.php";

$username = "";
$email = "";
$errors = array();


if(isset($_POST['reg_user'])) {
    //recieve all input values from the form
    $username = mysqli_real_escape_string($connection, $_POST['username']);
   // $username = mysqli_real_escape_string($connection,strtolower($_POST['username']));
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password_1 = mysqli_real_escape_string($connection, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($connection, $_POST['password_2']);

    //form validation: ensure that the form is correctly filled ...
    //by adding (array_push()) coresponding error unto $errors array
    if(empty($username)) { array_push($errors, "Username is required"); }
    if(empty($email)) { array_push($errors, "Email is required"); }
    if(empty($password_1)) { array_push($errors, "Password is required"); }
    if($password_1 != $password_2) {
        array_push($errors, "Password do not match");
    }

    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($connection, $user_check_query);
    $user = mysqli_fetch_assoc($result);


    if($user) { //if user exist
         if($user['username'] == $username) {
            array_push($errors, "Username already exist");
         }
         if($user['email'] == $email) {
            array_push($errors, "Email already exist");
         }
    }
   
    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1); //encrypt the password before saving in the database
        $query = "INSERT INTO users (username, email, password) VALUES ('$username','$email', '$password')";
        mysqli_query($connection, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
    }   
}
?>