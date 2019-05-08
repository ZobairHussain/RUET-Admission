<?php
session_start();
require_once('../db.php');
    if(isset($_POST['submit'])){
       
        if($_POST['pass1'] !== $_POST['pass2'])
            header('location: signup.php');
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $pass = md5(mysqli_real_escape_string($con, $_POST['pass1']));
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $dept= mysqli_real_escape_string($con, $_POST['dept']);
        
        
        $sql = "UPDATE `admin` SET `email` = '$email', `password` = '$pass', `name` = '$name', `dept` = '$dept' WHERE `admin`.`name` = '".$_SESSION['username']."'";
        $res = mysqli_query($con, $sql);
        
        if($res){
            session_start();
            $_SESSION['username'] = $name;
            header('location: index.php');
        } else {
            echo "Error!!!";
            
        }
    } else {
        $sql = "SELECT * FROM `admin` WHERE name='".$_SESSION['username']."'";
        $res = mysqli_query($con, $sql);
        $arr = mysqli_fetch_assoc($res);
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

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <form class="form-signin animated shake" method="post" action="">
        <h2 class="form-signin-heading">Edit Your Info</h2>
        
        <label for="inputname" class="sr-only">Email address</label>
        <input name="name" type="text" id="inputname" class="form-control" placeholder="Name" value="<?php echo $arr['name']; ?>" required autofocus>
        
        <label for="inputdept" class="sr-only">Email address</label>
        <input name="dept" type="text" id="inputdept" class="form-control" placeholder="Department" value="<?php echo $arr['dept']; ?>"  required autofocus>
        
        <label for="inputEmail" class="sr-only">Email address</label>
        <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" value="<?php echo $arr['email']; ?>" required autofocus>
        
        
        
        <label for="inputPassword1" class="sr-only">Password</label>
        <input name="pass1" type="password" id="inputPassword1" class="form-control" placeholder="Password" required>
        
        <label for="inputPassword2" class="sr-only">Retype Password</label>
        <input name="pass2" type="password" id="inputPassword2" class="form-control" placeholder="Password"  required>
        
        <input type="submit" name="submit" class="btn btn-lg btn-primary btn-block" value="Edit Profile">
        
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
