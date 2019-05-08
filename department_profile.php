<?php 
require_once('db.php');
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>profile 01</title>

    <!-- Bootstrapjgvhbilkhjv -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/home.css" rel="stylesheet">
    <style>
        th {
            width: 40%;
        }

        td {
            width: 60%;
        }

    </style>

</head>

<body style="background-color: rgb(248,251,255)">

    <?php include('navbar.php'); ?>


    <div class="container">
        <div class="row">
            <?php
                $id = $_GET['id'];
                $q = "SELECT * FROM departments WHERE id = $id";
                $run = mysqli_query($con, $q);
                $row = mysqli_fetch_array($run);
            ?>
                <center>
                    <h1>
                        <?php echo $row['full_name']; ?>
                    </h1>
                </center>
                <p>
                    <?php echo $row['description']; ?>
                </p>
        </div>
    </div>
    <section style="height: 20px;"></section>

    <?php require_once('footer.php'); ?>
