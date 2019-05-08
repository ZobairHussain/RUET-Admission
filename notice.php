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


</head>

<body style="background-color: rgb(248,251,255)">

    <?php include('navbar.php'); ?>

    <center>
        <h1>Notice Board</h1>
    </center>

    <table class="table table-striped table-hover table-bordered" style="width:60%; margin-left: 20%;">
        <thead>
            <tr>
                <th>
                    <center>ID</center>
                </th>
                <th>
                    <center>Date</center>
                </th>
                <th>
                    <center>Name</center>
                </th>
                <th>
                    <center>Description</center>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
                    $q = "SELECT * FROM notice";
                    $run = mysqli_query($con, $q);
                    while($row = mysqli_fetch_array($run)){
                ?>
                <tr>
                    <td>
                        <?php echo $row['id']; ?>
                    </td>
                    <td>
                        <?php echo $row['date']; ?>
                    </td>
                    <td>
                        <?php echo $row['name']; ?>
                    </td>
                    <td>
                        <?php echo $row['description']; ?>
                    </td>
                </tr>
                <?php
                    }
                ?>
        </tbody>
    </table>

    <section style="height: 20px;"></section>
    <br><br><br><br><br><br><br><br>
    <?php require_once('footer.php'); ?>
