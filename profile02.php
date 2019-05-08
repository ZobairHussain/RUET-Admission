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
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>profile 02</title>
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
 <?php include 'sidebar.php' ?>
       <?php
       $sql1 = "SELECT * FROM `1st_form` WHERE id=$id";
       $result1 = mysqli_query($con, $sql1);
       
       $sql2 = "SELECT * FROM `2nd_form` WHERE user_id=$id";
       $result2 = mysqli_query($con, $sql2);
       
       $sql3 = "SELECT * FROM `address` WHERE user_id=$id";
       $result3 = mysqli_query($con, $sql3);
       
       $sql4 = "SELECT * FROM `subject_list` WHERE user_id=$id";
       $result4 = mysqli_query($con, $sql4);
       
       $row1 = mysqli_fetch_assoc($result1);
       $row2 = mysqli_fetch_assoc($result2);
       $row3 = mysqli_fetch_assoc($result3);
       $row4 = mysqli_fetch_assoc($result4);
       
       if(mysqli_num_rows($result1) == 1 && mysqli_num_rows($result2) == 1 && mysqli_num_rows($result3) == 1){
echo  "<table class='table table-striped table-hover table-responsive table-bordered' style='width:60%; margin-left: 20%;'>
   <thead><tr><th colspan='2'><center>Student Information</center></th></tr></thead>
  <tr>
    <th>ID</th>
    <td>".$row1['id']."</th>
  </tr>
  <tr>
    <th>Name</th>
    <td>".$row1['name']."</td>
  </tr>
  <tr>
    <th>Mobile</th>
    <td>".$row1['mobile']."</td>
  </tr>
  <tr>
    <th>Email</th>
    <td>".$row1['email']."</td>
  </tr>
  
  
  <tr>
    <th>Fathers Name</th>
    <td>".$row2['fathers_name']."</td>
  </tr>
  
  <tr>
    <th>Fathers Mobile</th>
    <td>".$row2['fathers_mobile_no']."</td>
  </tr>
  
  <tr>
    <th>Mothers Name</th>
    <td>".$row2['mothers_name']."</td>
  </tr>
 
  <tr>
    <th>Mothers Mobile</th>
    <td>".$row2['mothers_mobile_no']."</td>
  </tr>
  
  <tr>
    <th>Guardians Name</th>
    <td>".$row2['guardians_name']."</td>
  </tr>
 
  <tr>
    <th>Guardians Mobile</th>
    <td>".$row2['guardians_mobile_no']."</td>
  </tr> 
  
  <tr>
    <th>Guardians Relation</th>
    <td>".$row2['guardians_relation']."</td>
  </tr> 
  
  <tr>
    <th>Birth date</th>
    <td>".$row2['birth_date']."</td>
  </tr>
  
  <tr>
    <th>Birth Certificate No</th>
    <td>".$row2['birth_cirtificate_id']."</td>
  </tr>
 
 
 
 
  <tr>
    <th>Home No</th>
    <td>".$row3['house_no']."</td>
  </tr>
 
  
   <tr>
    <th>Road No</th>
    <td>".$row3['road_no']."</td>
  </tr>
 
  <tr>
    <th>Village</th>
    <td>".$row3['village']."</td>
  </tr>
 
   <tr>
    <th>Post Code</th>
    <td>".$row3['post_code']."</td>
  </tr>
  
    <tr>
    <th>Thana</th>
    <td>".$row3['thana']."</td>
  </tr>
  
   <tr>
    <th>District</th>
    <td>".$row3['district']."</td>
  </tr>
    <tr>
    <th>Division</th>
    <td>".$row3['division']."</td>
  </tr>
  
 
</table><br>";
}
       
       
       
              if(mysqli_num_rows($result4) == 1){
echo  "<table class='table table-striped table-hover table-responsive table-bordered' style='width:60%; margin-left: 25%;'>
  <thead><tr><th colspan='2'><center>Subject Choice List</center></th></tr></thead>
  <tr>
    <th>1st Subject</th>
    <td>".$row4['1']."</th>
  </tr>
  <tr>
    <th>2nd Subject</th>
    <td>".$row4['2']."</td>
  </tr>
  <tr>
    <th>3rd Subject</th>
    <td>".$row4['3']."</td>
  </tr>
  <tr>
    <th>4th Subject</th>
    <td>".$row4['4']."</td>
  </tr>
  
  
  <tr>
    <th>5th Subject</th>
    <td>".$row4['5']."</td>
  </tr>
  
  <tr>
    <th>6th Subject</th>
    <td>".$row4['6']."</td>
  </tr>
  
  <tr>
    <th>7th Subject</th>
    <td>".$row4['7']."</td>
  </tr>
 
  <tr>
    <th>8th Subject</th>
    <td>".$row4['8']."</td>
  </tr>
  
  <tr>
    <th>9th Subject</th>
    <td>".$row4['9']."</td>
  </tr>
 
  <tr>
    <th>10th Subject</th>
    <td>".$row4['10']."</td>
  </tr> 
  
  <tr>
    <th>11th Subject</th>
    <td>".$row4['11']."</td>
  </tr> 
  
  <tr>
    <th>12th Subject</th>
    <td>".$row4['12']."</td>
  </tr>
  
  <tr>
    <th>13th Subject</th>
    <td>".$row4['13']."</td>
  </tr>
</table><br>";
              }
       
?>			
		
       <?php include 'footer.php' ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>