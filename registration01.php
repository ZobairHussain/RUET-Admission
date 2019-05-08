<?php
require_once('db.php');


if(isset($_POST['submit'])){
    if(empty($_POST['name']) || empty($_POST['mobile']) || empty($_POST['email']) || empty($_POST['password1']) || empty($_POST['password2'])){
        echo '<script type="text/javascript">alert("All Fields are required!")</script>';
    } else if($_POST['password1'] != $_POST['password2']) {
        echo '<script type="text/javascript">alert("Password Did not match!")</script>';
    } else {
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = md5(mysqli_real_escape_string($con, $_POST['password1']));
        
        $sql = "INSERT INTO `1st_form` (`id`, `name`, `mobile`, `email`, `password`) VALUES (NULL, '$name', '$mobile', '$email', '$password')";
        $result = mysqli_query($con, $sql);
        
        if(!$result){
            echo '<script type="text/javascript">alert("Can not access the database.")</script>';
        } else {
            header('location: login.php');
        }
    }
}

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Registration01</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/home.css" rel="stylesheet">
    </head>

    <body style="background-color: rgb(248,251,255)">
        <?php include 'navbar.php' ?>
        <?php include 'sidebar.php' ?>

        <!-- /FORM -->
        <div class="container">
            <div class="row">
                <form class="form-horizontal" method="post" action="">
                    <fieldset>

                        <!-- Form Name -->
                        <legend align="center">Enter bellow information to register:</legend>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Current Fleet Size">Name:</label>
                            <div class="col-md-5">
                                <input id="Current Fleet Size" name="name" type="text" placeholder="Name" class="form-control input-md" style="width: 100%; background-color: white;">
                            </div>
                        </div>

                        <!-- Number input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Current Fleet Size">Mobile No:</label>
                            <div class="col-md-5">
                                <input id="Current Fleet Size" name="mobile" type="number" placeholder="Mobile No" class="form-control input-md">
                            </div>
                        </div>

                        <!-- email input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Current Fleet Size">Email:</label>
                            <div class="col-md-5">
                                <input id="Current Fleet Size" name="email" type="email" placeholder="Email" class="form-control input-md">
                            </div>
                        </div>

                        <!-- Password input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Current Fleet Size">Password:</label>
                            <div class="col-md-5">
                                <input id="Current Fleet Size" name="password1" type="password" placeholder="Password" class="form-control input-md">
                            </div>
                        </div>

                        <!-- Password Retype input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Current Fleet Size">Retype Password:</label>
                            <div class="col-md-5">
                                <input id="Current Fleet Size" name="password2" type="password" placeholder="Retype Password" class="form-control input-md">
                            </div>
                        </div>


                        <!-- Button -->
                        <input class="btn btn-primary button" type="submit" name="submit" value="Submit">
                        <div class="col-sm-5"></div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    </fieldset>
                </form>
            </div>
        </div>
        <?php include 'footer.php' ?>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
    </body>

    </html>
