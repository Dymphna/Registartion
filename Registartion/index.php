<?php 
    session_start();

    if(!isset($_SESSION['username'])) {
        echo "<script> alert('You must log in first')</script>";
        header('location: login.php');
    }
    if(isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <link rel = "stylesheet" type ="text/css" href = "style.css">
    </head>
    <body>
        <div class = "header">
            <h2>Home Page</h2>
        </div>
        <div class = "content">
            <!--notification message-->

            <!--logged in user information -->
            <?php if (!empty($_SESSION['username'])) : ?>
                <p> Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
               <br> <a href="index.php?logout='1'"  class="btn btn-danger" > logout</a></p>
            <?php endif?>
        </div>
    </body>
</html