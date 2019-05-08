<?php
session_start();
session_destroy();

require_once('../db.php');
    if(isset($_POST['submit'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $pass = md5(mysqli_real_escape_string($con, $_POST['pass']));
        
        $sql = "SELECT * FROM `admin` WHERE email='".$email."'";
        $res = mysqli_query($con, $sql);
        $arr = mysqli_fetch_assoc($res);
        
        if($res){
            session_start();
            $_SESSION['username'] = $arr['name'];
            header('location: index.php');
        } else {
            echo "Error!!!";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.png">

    <title>Login | Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="css/animated.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/login.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">

      <form class="form-signin animated shake" method="post" action="">
        <h2 class="form-signin-heading">Admin Login</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="pass" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <input type="submit" name="submit" class="btn btn-lg btn-primary btn-block" value="Sign In">
        <p style="color: white;">No Account? <a href="signup.php">Sign Up</a></p>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
