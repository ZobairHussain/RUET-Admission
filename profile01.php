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
       <?php include('sidebar.php'); ?>

       



       <?php
       $sql = "SELECT * FROM `1st_form` WHERE id=$id";
       $result = mysqli_query($con, $sql);
       
        $sqlssc = "SELECT * FROM `ssc` WHERE user_id=$id";
       $resultssc = mysqli_query($con, $sqlssc);
       
        $sqlhsc = "SELECT * FROM `hsc` WHERE user_id=$id";
       $resulthsc = mysqli_query($con, $sqlhsc);
       
       $row = mysqli_fetch_assoc($result);
       $rowssc = mysqli_fetch_assoc($resultssc);
       $rowhsc = mysqli_fetch_assoc($resulthsc);
       
       if(mysqli_num_rows($result) == 1){
echo "<table class='table table-striped table-hover table-responsive table-bordered' style='width:60%; margin-left: 20%;'>
  <caption>Student Information</caption>
  <tr>
    <th>Id</th>
    <td>".$row['id']."</th>
  </tr>
  <tr>
    <th>Name</th>
    <td>".$row['name']."</td>
  </tr>
  <tr>
    <th>Mobile</th>
    <td>".$row['mobile']."</td>
  </tr>
  <tr>
    <th>Email</th>
    <td>".$row['email']."</td>
  </tr>
</table>";
       }
       
        if(mysqli_num_rows($resultssc) == 1){      
echo "<table class='table table-striped table-hover table-responsive table-bordered' style='width:60%; margin-left: 20%;'>
  <caption>HSC Information</caption>
  <tr>
    <th>Roll No</th>
    <td>".$rowhsc['roll']."</th>
  </tr>
  <tr>
    <th>Registration No</th>
    <td>".$rowhsc['reg']."</td>
  </tr>
  <tr>
    <th>Passing Year</th>
    <td>".$rowhsc['passing_year']."</td>
  </tr>
  <tr>
    <th>Board</th>
    <td>".$rowhsc['board']."</td>
  </tr>
</table>"; 
        }
       
       if(mysqli_num_rows($resulthsc) == 1){
echo "<table class='table table-striped table-hover table-responsive table-bordered' style='width:60%; margin-left: 20%;'>
  <caption>SSC Information</caption>
  <tr>
    <th>Roll No</th>
    <td>".$rowssc['roll']."</th>
  </tr>
  <tr>
    <th>Registration</th>
    <td>".$rowssc['reg']."</td>
  </tr>
  <tr>
    <th>Passing Year</th>
    <td>".$rowssc['passing_year']."</td>
  </tr>
  <tr>
    <th>Board</th>
    <td>".$rowssc['board']."</td>
  </tr>
</table>";
       
       } 
?>
  <div class='row'>
   <div class="col-md-6">
    <h4 style="width:50%; margin-left: 50%;">To give subject choice </h4>
    <a  class="btn btn-primary button" style="width:30%; margin-left: 50%;" href="sub_form.php"> <h4 style="color:white;">click here</h4> </a>  
    </div>
    
    <div class="col-md-6">
    <h4 style="width:50%; margin-right: 50%;">To edit your Information </h4>
    <a  class="btn btn-primary button" style="width:30%; margin-right: 20%;" href="edit01.php"> <h4 style="color:white;">click here</h4> </a>  
    </div>
    </div>

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