<!DOCTYPE html>
<html>
    <head>
     <title>Registration Portal</title>
     <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class = "header">
            <h2>Login</h2>
        </div>
        <form method = "post" >
            <?php include 'login_process.php'; ?>
            <div class = "input-group">
                <label>Username</label>
                <input type ="text" name="username">
            </div>
            <div class = "input-group">
                <label>Password</label>
                <input type ="password" name="password">
            </div>
            <div class = "input-group">
                <button type = "submit" class="btn" name ="login_user" > Login</button>
            </div>
            <p>
                Not yet member ? <a href="register.php">Sign Up</a>
            </p>
        </form>
    </body>
</html>
