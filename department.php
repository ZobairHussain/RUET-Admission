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



    <center>
        <h1>Departments</h1>
    </center>


    <div class="container">
        <div class="row">
            <?php
                $q = "SELECT * FROM departments";
                $run = mysqli_query($con, $q);
                while($row = mysqli_fetch_array($run)){
                    if($row['id']%5 == 0){
                        $color = "darkblue";
                    }
                    else if($row['id']%5 == 1){
                        $color = "darkred";
                    }
                    else if($row['id']%5 == 2){
                        $color = "gray";
                    }
                    else if($row['id']%5 == 3){
                        $color = "darkorange";
                    }
                    else if($row['id']%5 == 4){
                        $color = "darkgreen";
                    }
            ?>
                <a href="department_profile.php?id=<?php echo $row['id']; ?>">
                    <div class="col-md-3">
                        <center style="height: 110px; Width: 100%; background-color: <?php echo $color; ?>; color: white;">
                            <h5 style="color: white;">
                                <br><br>
                                <?php echo $row['name']; ?>
                            </h5>
                            <p style="color: white; margin-top: 20px;">
                                <?php echo $row['full_name']; ?>
                            </p>
                        </center>

                    </div>
                </a>
                <?php
                    }
                ?>

        </div>
    </div>
    <section style="height: 20px;"></section>

    <?php require_once('footer.php'); ?>
