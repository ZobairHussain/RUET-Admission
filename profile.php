<?php 
require_once('db.php');
session_start();
if(!isset($_SESSION['id'])){
    header('location: login.php');
}
$name = $_SESSION['name'];
$id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/home.css" rel="stylesheet">
    <title>profile</title>
</head>

<body style="background-color: rgb(248,251,255)">
    <?php include 'navbar.php' ?>
    <?php include('sidebar.php'); ?>
    <?php
       $sql = "SELECT * FROM `1st_form` WHERE id=$id";
       $result = mysqli_query($con, $sql);
       $row = mysqli_fetch_assoc($result);
       ?>
        <table class="table table-striped table-hover table-responsive table-bordered" style="width:60%; margin-left: 20%;">
            <thead>
                <tr>
                    <th colspan='2'>
                        <center>Student Information</center>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Id</th>
                    <td>
                        <?php echo $row['id']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>
                        <?php echo $row['name']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Mobile</th>
                    <td>
                        <?php echo $row['mobile']; ?>
                    </td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>
                        <?php echo $row['email']; ?>
                    </td>
                </tr>
            </tbody>
        </table>

        <h4 style="width:60%; margin-left: 20%;">To complete registration </h4>
        <a style="width:10%; margin-left: 20%;" class="btn btn-primary button" href="registration02.php">
            <h4 style="color:white;">click here</h4>
        </a>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <?php include 'footer.php' ?>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
</body>

</html>
