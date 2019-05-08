<?php
 session_start();

if(!isset($_SESSION['name'])){
    header('location: login.php');
}

//db
require_once('db.php');

    if(isset($_POST['submit'])){
        if(empty($_POST['fathers_name']) || empty($_POST['fathers_mobile']) || empty($_POST['mothers_name']) || empty($_POST['mothers_mobile']) || empty($_POST['guardians_name']) || empty($_POST['guardians_mobile']) || empty($_POST['guardians_relation']) || 
        empty($_POST['birth_date']) ||    
        empty($_POST['birth_id']) || 
        empty($_POST['house']) || 
        empty($_POST['road']) || 
        empty($_POST['village']) || 
        empty($_POST['post']) || 
        empty($_POST['thana']) || 
        empty($_POST['district']) || 
        empty($_POST['division'])){
            echo "All Fields are required!";
        } else {
            $id = $_SESSION['id'];
            $fathers_name = mysqli_real_escape_string($con, $_POST['fathers_name']);
            $fathers_mobile = mysqli_real_escape_string($con, $_POST['fathers_mobile']);
            $mothers_name = mysqli_real_escape_string($con, $_POST['mothers_name']);
            $mothers_mobile = mysqli_real_escape_string($con, $_POST['mothers_mobile']);
            $guardians_name = mysqli_real_escape_string($con, $_POST['guardians_name']);
            $guardians_mobile = mysqli_real_escape_string($con, $_POST['guardians_mobile']);
            $guardians_relation = mysqli_real_escape_string($con, $_POST['guardians_relation']);
            $birth_date = mysqli_real_escape_string($con, $_POST['birth_date']);
            $birth_id = mysqli_real_escape_string($con, $_POST['birth_id']);
            $house = mysqli_real_escape_string($con, $_POST['house']);
            $road = mysqli_real_escape_string($con, $_POST['road']);
            $village = mysqli_real_escape_string($con, $_POST['village']);
            $post = mysqli_real_escape_string($con, $_POST['post']);
            $thana = mysqli_real_escape_string($con, $_POST['thana']);
            $district = mysqli_real_escape_string($con, $_POST['district']);
            $division = mysqli_real_escape_string($con, $_POST['division']);
            

            $sql2nd_form = "INSERT INTO `2nd_form` (`user_id`, `fathers_name`, `fathers_mobile_no`, `mothers_name`, `mothers_mobile_no`, `guardians_name`, `guardians_mobile_no`, `guardians_relation`, `birth_date`, `birth_cirtificate_id`) VALUES ('$id', '$fathers_name', '$fathers_mobile', '$mothers_name', '$mothers_mobile', '$guardians_name', '$guardians_mobile', '$guardians_relation', '$birth_date', '$birth_id')";
            $result2nd_form = mysqli_query($con, $sql2nd_form);
            
            
            $sqladdress ="INSERT INTO `address` (`user_id`, `house_no`, `road_no`, `village`, `post_code`, `thana`, `district`, `division`) VALUES ($id, '$house', '$road', '$village', '$post', '$thana', '$district', '$division')";
            $resultaddress = mysqli_query($con, $sqladdress);
            
            

            if(!$result2nd_form){
                echo "Sorry 2nd_form!";
            } else if(!$resultaddress){
                echo "sorry address";
            } else {
                header('location: profile02.php');
            }
        }
    }


?>


<!DOCTYPE html>
<html lang="en">
  <head>
   <title>Registration03</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
   

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/home.css" rel="stylesheet">
  </head>
  <body style="background-color: rgb(248,251,255)">
  <?php include ('navbar.php'); ?>
  <?php include('sidebar.php'); ?>
<!-- /FORM -->
<div class="container">
	<div class="row">
		<form class="form-horizontal" method="post" action="">
<fieldset>

<!-- Form Name -->
<legend align="center">Congradulations! You'hv passed thr RUET Admission Test. Now fill up this form to complete your further register</legend>

<h3>Personal Info:</h3>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Current Fleet Size">Father's Name:</label>  
  <div class="col-md-5">
  <input id="Current Fleet Size" name="fathers_name" type="text" placeholder="Father's name" class="form-control input-md" style="width: 100%; background-color: white;" >
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Current Fleet Size">Father's Mobile:</label>  
  <div class="col-md-5">
  <input id="Current Fleet Size" name="fathers_mobile" type="number" placeholder="Father's mobile" class="form-control input-md">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Current Fleet Size">Mother's Name:</label>  
  <div class="col-md-5">
  <input id="Current Fleet Size" name="mothers_name" type="text" placeholder="Mother's name" class="form-control input-md" style="width: 100%; background-color: white;" >
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Current Fleet Size">Mother's Mobile:</label>  
  <div class="col-md-5">
  <input id="Current Fleet Size" name="mothers_mobile" type="number" placeholder="Mother's mobile" class="form-control input-md">
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Current Fleet Size">Guardian's Name:</label>  
  <div class="col-md-5">
  <input id="Current Fleet Size" name="guardians_name" type="text" placeholder="Guardian's name" class="form-control input-md" style="width: 100%; background-color: white;" >
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Current Fleet Size">Guardian's Mobile:</label>  
  <div class="col-md-5">
  <input id="Current Fleet Size" name="guardians_mobile" type="number" placeholder="Guardian's mobile" class="form-control input-md">
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Current Fleet Size">Guardian's Relation:</label>  
  <div class="col-md-5">
  <input id="Current Fleet Size" name="guardians_relation" type="text" placeholder="Guardian's Relation With You" class="form-control input-md" style="width: 100%; background-color: white;" >
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Current Fleet Size">Birth Date:</label>  
  <div class="col-md-5">
  <input id="Current Fleet Size" name="birth_date" type="date"  class="form-control input-md">
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Current Fleet Size">Birth ID:</label>  
  <div class="col-md-5">
  <input id="Current Fleet Size" name="birth_id" type="number" placeholder="Birth Cirtificate ID" class="form-control input-md">
  </div>
</div>

<h3>Address:</h3>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Current Fleet Size">House No:</label>  
  <div class="col-md-5">
  <input id="Current Fleet Size" name="house" type="text" placeholder="House No" class="form-control input-md" style="width: 100%; background-color: white;" >
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Current Fleet Size">Road No:</label>  
  <div class="col-md-5">
  <input id="Current Fleet Size" name="road" type="text" placeholder="Road No" class="form-control input-md" style="width: 100%; background-color: white;" >
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Current Fleet Size">Village:</label>  
  <div class="col-md-5">
  <input id="Current Fleet Size" name="village" type="text" placeholder="Village Name" class="form-control input-md" style="width: 100%; background-color: white;" >
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Current Fleet Size">Postal Code:</label>  
  <div class="col-md-5">
  <input id="Current Fleet Size" name="post" type="number" placeholder="Postal Code" class="form-control input-md"  >
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Current Fleet Size">Thana/Upozilla:</label>  
  <div class="col-md-5">
  <input id="Current Fleet Size" name="thana" type="text" placeholder="Thana/Upozilla Name" class="form-control input-md" style="width: 100%; background-color: white;" >
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Current Fleet Size">District:</label>  
  <div class="col-md-5">
  <input id="Current Fleet Size" name="district" type="text" placeholder="District Name" class="form-control input-md" style="width: 100%; background-color: white;" >
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Current Fleet Size">Division:</label>  
  <div class="col-md-5">
  <input id="Current Fleet Size" name="division" type="text" placeholder="Division Name" class="form-control input-md" style="width: 100%; background-color: white;" >
  </div>
</div>


<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton">Submit</label>
  <div class="col-md-4">
   <input class="btn btn-primary button" type="submit" name="submit" value="Submit">
  </div>
</div>

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