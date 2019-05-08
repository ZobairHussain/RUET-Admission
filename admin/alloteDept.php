<?php 
require_once('../db.php');
session_start();
if(!isset($_SESSION['username'])){
    header('location: login.php');
}
$name = $_SESSION['username'];

?>


<?php

$delAlloted = "DELETE FROM `allotedsub` WHERE 1";
mysqli_query($con, $delAlloted);

$delAlloted = "DELETE FROM `allotedsub` WHERE 1";
mysqli_query($con, $delAlloted);

$delDept = "DELETE FROM `dept` WHERE 1";
mysqli_query($con, $delDept);

$insertDept = "INSERT INTO `dept` (`CSE`, `EEE`, `ECE`, `ETE`, `ME`, `MTE`, `CFPE`, `GCE`, `MSE`, `CE`, `BCM`, `ARCHI`, `URP`) VALUES ('1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1')";
mysqli_query($con, $insertDept);

$delRank = "DELETE FROM `rank` WHERE 1";
mysqli_query($con, $delRank);



//sorting student by their score and storing into rank
$sort = "INSERT INTO rank SELECT ruet_result.user_id FROM ruet_result ORDER BY ruet_result.physics+ruet_result.chemistry+ruet_result.math+ruet_result.english DESC";
$res = mysqli_query($con, $sort);
if(!$res) {echo "ERROR RANK GET";}

//selecting student from rank
$sqlID = "SELECT * FROM rank";
$id = mysqli_query($con, $sqlID);

if(!$id) {echo "ERROR RANK GET";}


//for every student
while($row = mysqli_fetch_assoc($id)){
    //getting their subject choice list
    $sid = $row['id'];
    $choice = "SELECT * FROM `subject_list` WHERE user_id = $sid";
    $res = mysqli_query($con, $choice);
    
    
    if(!$res) {echo "ERROR subject list";}
    
    $i = 1;
    //for nth subject, where n = 1, 2, 3, 4..13
    while($r=mysqli_fetch_assoc($res)){
        LABEL:
        $flag = false;
        //from 1st subject to 13th subject from their choice list
        $dept = $r[strval($i)];
        //echo $i;
        
        //getting number of unoccupied seats
        $s = "SELECT * FROM `dept`";
        $seat = mysqli_query($con, $s);
        $rs = mysqli_fetch_assoc($seat);
        
        if(!$rs){echo "ERRO dept";}
        
        //seat of choice dept has seat > 0 ? 
        if($rs[$dept] > 0 ) {
            //assign that student with his choosen subject
            $sub = "INSERT INTO `allotedsub` (`id`, `sub`) VALUES ('$sid', '$dept')";
            $squery = mysqli_query($con, $sub);
            if(!$squery){echo "ERROR allotment";}
            
            $new = $rs[strval($dept)] - 1;
            //drcrament the number of seats
            $dec = "UPDATE `dept` SET `$dept` = $new";
            $update = mysqli_query($con, $dec);
            if(!$update){echo "Error Decrement";}
            $flag = true;
            break;
        } else {
            $i++;
            if($i > 13){ break;}
            goto LABEL;
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
    <title>RUET | Admin</title>

    <!-- Bootstrap -->
    <link href="img/favicon.png" rel="icon">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/animated.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">


      
  </head>
 <body style="background-color: rgb(248,251,255)">
   <div class="container">
  
  <!-- Navigation -->
  <div class="row">
    <?php include('nav.php'); ?>
 
  </div>
       <?php
       $sql = "SELECT * FROM `allotedSub`";
       $result = mysqli_query($con, $sql);
       if(!$result){echo "Sorry";}
       else{
        echo "<table class='table table-striped table-hover table-responsive table-bordered'>
        <th colspan='3'><center>Student Information</center></th>
           <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Department</th>
          </tr>";
       
       while($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];
        $sql2 = "SELECT * FROM `1st_form` WHERE id=$id";
        $result2 = mysqli_query($con, $sql2);   
        $row2 = mysqli_fetch_assoc($result2);
           
        echo "<tr>
            <td>".$row['id']."</th>
            <td>".$row2['name']."</th>
            <td>".$row['sub']."</td>
          </tr>";
       }
           echo "</table>";
    }
    ?>
     
       
       
</div>
   
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>