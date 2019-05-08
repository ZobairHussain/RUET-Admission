<?php
session_start();
session_destroy();

//db
require_once('db.php');

if(isset($_POST['submit'])){
    if(empty($_POST['email']) || empty($_POST['password'])){        
        echo "All Fields are required!";
    } else {
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = md5(mysqli_real_escape_string($con, $_POST['password']));
        
        $sql = "SELECT * FROM `1st_form` WHERE email='$email'";
        $result = mysqli_query($con, $sql);
        
        $row = mysqli_fetch_assoc($result);
        
        if(mysqli_num_rows($result) > 0){
            if($email==$row['email'] && $password == $row['password']){
                session_start();
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                header('location: profile.php');
            }
        } else {
            echo "Error!!";
        }
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

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="css/animated.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/login.css" rel="stylesheet">
  </head>

  <body style="background-image: url('img/ruetgate.jpg');
    background-repeat: no-repeat;  background-size: cover; ">

    <div class="container">

      <form class="form-signin animated shake" method="post" action="">
        <h2 class="form-signin-heading">Login</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <input type="submit" name="submit" class="btn btn-lg btn-primary btn-block" value="Sign In">
        <p style="color: white;">No Account? <a href="registration01.php">Register</a></p>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>