<?php session_start(); 
require_once('../db.php');
if(!isset($_SESSION['username'])){
    header('location: login.php');
}
$sql = "SELECT COUNT(*) AS total FROM 1st_form";
$result = mysqli_query($con, $sql);
$t = mysqli_fetch_assoc($result);
$numOfStudent = $t['total'];


$sql2 = "SELECT COUNT(*) AS total FROM hsc_result";
$result2 = mysqli_query($con, $sql2);
$t2 = mysqli_fetch_assoc($result2);
$numOfStudentAllowed = $t2['total'];

$sql3 = "SELECT  COUNT(*) AS total FROM ruet_result";
$result3 = mysqli_query($con, $sql3);
$t3 = mysqli_fetch_assoc($result3);
$numOfStudentAppeared = $t3['total'];


$sql4 = "SELECT COUNT(*) AS total FROM ruet_result;";
$result4 = mysqli_query($con, $sql4);
$t4 = mysqli_fetch_assoc($result4);
$numOfStudentDept = $t4['total'];
//<!-- count end-->


$sql = "SELECT * FROM 1st_form";
$result = mysqli_query($con, $sql);
$t = mysqli_fetch_assoc($result);

$sql2 = "SELECT id,name,email,mobile FROM 1st_form,hsc_result WHERE 1st_form.id=hsc_result.user_id"; 
$result2 = mysqli_query($con, $sql2);
$t2 = mysqli_fetch_assoc($result2);

$sql3 = "SELECT id,name,email,mobile FROM 1st_form,ruet_result WHERE 1st_form.id=ruet_result.user_id";
$result3 = mysqli_query($con, $sql3);
$t3 = mysqli_fetch_assoc($result3);

$sql4 = "SELECT allotedsub.id, 1st_form.name, 1st_form.mobile, 1st_form.email, allotedsub.sub FROM allotedsub, 1st_form WHERE allotedsub.id=1st_form.id;";
$result4 = mysqli_query($con, $sql4);
$t4 = mysqli_fetch_assoc($result4);

$sql5 = "SELECT allotedsub.id, 1st_form.name, 1st_form.mobile, 1st_form.email, allotedsub.sub FROM allotedsub, 1st_form WHERE allotedsub.id=1st_form.id ORDER BY allotedsub.sub";
$result5 = mysqli_query($con, $sql5);
$t5 = mysqli_fetch_assoc($result5);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>RUET | Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Bootstrap -->
    <link href="img/favicon.png" rel="icon">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/animated.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    <div id="wrapper">
        <?php include('nav.php'); ?>

        <div class="container-fluid body-section">
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group">
                        <a href="index.php" class="list-group-item active"><i class="fa fa-home fa-2x"></i>Home</a>
                        <a href="#" class="list-group-item" data-toggle="modal" data-target="#myModal1">
                      <span class="badge"><?php echo $numOfStudent; ?></span>All Examinee
                  </a>
                        <a href="#" class="list-group-item" data-toggle="modal" data-target="#myModal2">
                      <span class="badge"><?php echo $numOfStudentAllowed; ?></span>Allowed

                  </a>
                        <a href="ca" class="list-group-item" data-toggle="modal" data-target="#myModal3">
                      <span class="badge"><?php echo $numOfStudentAppeared; ?></span>Appeared
                  </a>
                        <a href="#" class="list-group-item" data-toggle="modal" data-target="#myModal4">
                      <span class="badge"><?php echo $numOfStudentDept; ?></span>Got Chance
                  </a>
                    </div>
                </div>
                <div class="col-md-9">
                    <h1><i class="fa fa-university"></i> RUET <small>Admission Assistant</small></h1>
                    <hr>
                    <ol class="breadcrumb">
                        <li class="active">Informations</li>
                    </ol>

                    <div class="row tag-boxes">
                        <div class="col-md-6 col-lg-3" data-toggle="modal" data-target="#myModal1">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-map-o fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9">
                                            <div class="text-right huge">
                                                <?php echo $numOfStudent; ?>
                                            </div>
                                            <div class="text-right">All Registered</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="panel-footer">
                                        <span class="pull-left">View All Registered</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3" data-toggle="modal" data-target="#myModal2">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-list-ul fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9">
                                            <div class="text-right huge">
                                                <?php echo $numOfStudentAllowed; ?>
                                            </div>
                                            <div class="text-right">Allowed Examinee</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="panel-footer">
                                        <span class="pull-left">View All Examinee</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3" data-toggle="modal" data-target="#myModal3">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-users fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9">
                                            <div class="text-right huge">
                                                <?php echo $numOfStudentAppeared; ?>
                                            </div>
                                            <div class="text-right">Appeared Examinee</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="panel-footer">
                                        <span class="pull-left">All Appeared Examinee</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3" data-toggle="modal" data-target="#myModal4">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-university fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9">
                                            <div class="text-right huge">
                                                <?php echo $numOfStudentDept; ?>
                                            </div>
                                            <div class="text-right">Got Chance</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="panel-footer">
                                        <span class="pull-left">View All Chance</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <h3 class="text-align: center">List of the Students who got chance</h3>
                    <?php
        echo "<table class='table table-striped table-hover table-responsive table-bordered' style='width:60%; margin-left: 20%;'>
          <caption>Student Information</caption>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Dept</th>
          </tr>";
    do{
        echo
          "<tr>
            <td>".$t5['id']."</td>
            <td>".$t5['name']."</td>
            <td>".$t5['mobile']."</td>
            <td>".$t5['email']."</td>
            <td>".$t5['sub']."</td>
           </tr>";
    }while($t5=mysqli_fetch_assoc($result5));
          echo "</table>";
    ?>

                </div>
            </div>
        </div>

        <footer class="text-center">
            Copyright (c) 2017 TEAM RUET BRACKET
        </footer>
    </div>



    <!-- Modal -->
    <div id="myModal1" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">All Registered</h4>
                </div>
                <div class="modal-body">
                    <?php
        echo "<table class='table table-striped table-hover table-responsive table-bordered' style='width:60%; margin-left: 20%;'>
          <caption>Student Information</caption>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>Email</th>
          </tr>";
    do{
        echo
          "<tr>
            <td>".$t['id']."</td>
            <td>".$t['name']."</td>
            <td>".$t['mobile']."</td>
             <td>".$t['email']."</td>
           </tr>";
    }while($t=mysqli_fetch_assoc($result));
          echo "</table>";
    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal -->
    <div id="myModal2" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">All Examinee</h4>
                </div>
                <div class="modal-body">
                    <?php
        echo "<table class='table table-striped table-hover table-responsive table-bordered' style='width:60%; margin-left: 20%;'>
          <caption>Student Information</caption>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>Email</th>
          </tr>";
    do{
        echo
          "<tr>
            <td>".$t2['id']."</td>
            <td>".$t2['name']."</td>
            <td>".$t2['mobile']."</td>
            <td>".$t2['email']."</td>
           </tr>";
    }while($t2=mysqli_fetch_assoc($result2));
          echo "</table>";
    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <!-- Modal -->
    <div id="myModal3" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Appeared Examinee</h4>
                </div>
                <div class="modal-body">
                    <?php
        echo "<table class='table table-striped table-hover table-responsive table-bordered' style='width:60%; margin-left: 20%;'>
          <caption>Student Information</caption>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>Email</th>
          </tr>";
    do{
        echo
          "<tr>
            <td>".$t3['id']."</td>
            <td>".$t3['name']."</td>
            <td>".$t3['mobile']."</td>
            <td>".$t3['email']."</td>
           </tr>";
    }while($t3=mysqli_fetch_assoc($result3));
          echo "</table>";
    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <!-- Modal -->
    <div id="myModal4" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Got Admitted</h4>
                </div>
                <div class="modal-body">
                    <?php
        echo "<table class='table table-striped table-hover table-responsive table-bordered' style='width:60%; margin-left: 20%;'>
          <caption>Student Information</caption>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Dept</th>
          </tr>";
    do{
        echo
          "<tr>
            <td>".$t4['id']."</td>
            <td>".$t4['name']."</td>
            <td>".$t4['mobile']."</td>
            <td>".$t4['email']."</td>
            <td>".$t4['sub']."</td>
           </tr>";
    }while($t4=mysqli_fetch_assoc($result4));
          echo "</table>";
    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
