<?php
 session_start();

require_once('db.php');
if(isset($_SESSION['id'])) {
    $sql1 = "SELECT * FROM 1st_form WHERE id=".$_SESSION['id'];
    $sql2 = "SELECT * FROM 2nd_form WHERE user_id=".$_SESSION['id'];
    $sql3 = "SELECT * FROM address WHERE user_id=".$_SESSION['id'];
    
    $result1 = mysqli_query($con, $sql1);
    $result2 = mysqli_query($con, $sql2);
    $result3 = mysqli_query($con, $sql3);
    
    $row1 = mysqli_fetch_assoc($result1);
    $row2 = mysqli_fetch_assoc($result2);
    $row3 = mysqli_fetch_assoc($result3);
    
    if(!$result2 || !$result3){echo "error"; header('location: registration03.php');}
    if(!$result1) {header('location: registration01.php');}
}else {
    header('location: login.php');
}

if(isset($_POST['submit'])){
    if(empty($_POST['name']) || empty($_POST['mobile']) || empty($_POST['email']) || empty($_POST['password1']) || empty($_POST['password2']) || empty($_POST['fathers_name']) || empty($_POST['fathers_mobile']) || 
       empty($_POST['mothers_name']) || empty($_POST['mothers_mobile']) || empty($_POST['guardians_name']) || empty($_POST['guardian_mobile']) || empty($_POST['guardians_relation']) || empty($_POST['birth_date']) || empty($_POST['birth_id']) || empty($_POST['house']) || empty($_POST['road']) || empty($_POST['village']) || empty($_POST['post']) || empty($_POST['thana']) || empty($_POST['district']) || empty($_POST['division']))
    { echo '<script type="text/javascript">alert("All Fields are required")</script>'; } 
    if($_POST['password1'] != $_POST['password2']) {
        echo '<script type="text/javascript">alert("Password did not match. ")</script>';} 
    else {
        $id = $_SESSION['id'];

        $name = mysqli_real_escape_string($con, $_POST['name']);
        $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = md5(mysqli_real_escape_string($con, $_POST['password1']));

        $fathers_name = mysqli_real_escape_string($con, $_POST['fathers_name']);
        $fathers_mobile = mysqli_real_escape_string($con, $_POST['fathers_mobile']);
        $mothers_name = mysqli_real_escape_string($con, $_POST['mothers_name']);
        $mothers_mobile = mysqli_real_escape_string($con, $_POST['mothers_mobile']);
        $guardians_name = mysqli_real_escape_string($con, $_POST['guardians_name']);
        $guardians_mobile = mysqli_real_escape_string($con, $_POST['guardian_mobile']);
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

        $sql = "UPDATE `1st_form` SET `name` = '$name', `mobile` = '$mobile', `email` = '$email' `password1 = '$password' WHERE `1st_form`.`id` = $id";
        $result = mysqli_query($con, $sql);

        $sqlssc = "UPDATE `2nd_form` SET `fathers_name` = '$fathers_name', `fathers_mobile_no` = '$fathers_mobile', `mothers_name` = '$mothers_name', `mothers_mobile_no` = '$mothers_mobile', `guardians_name` = '$guardians_name', `guardians__mobile_no` = '$guardians_mobile', `guardians_relation` = '$guardians_relation', `birth_date` = '$birth_date', `birth_cirtificate_id` = '$birth_id' WHERE `ssc`.`user_id` = $id";
        $resultssc = mysqli_query($con, $sqlssc);

        $sqlhsc = "UPDATE `address` SET `house_no` = '$house', `road_no` = '$road', `village` = '$village', `post_code` = '$post',
        `thana` = '$thana', `district` = '$district', `division` = '$division'
        WHERE `hsc`.`user_id` = $id";
        $resulthsc = mysqli_query($con, $sqlhsc);

        if(!$resultssc || !$result || !$resulthsc){
            echo '<script type="text/javascript">alert("sorry")</script>';
        } 
        else {
            header('location: profile02.php'); }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
   <title>edit02</title>
   <?php include('link.php'); ?>
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
<legend align="center">Edit Your Information</legend>

<div class="form-group">
  <label class="col-md-4 control-label" for="01">Name:</label>  
  <div class="col-md-5">
  <input id="01" name="name" type="text" placeholder="Name" class="form-control input-md" style="width: 100%; background-color: white;" value="<?php echo $row1['name'];  ?>">
  </div>
</div>
    
<div class="form-group">
  <label class="col-md-4 control-label" for="01">Mobile No:</label>  
  <div class="col-md-5">
  <input id="01" name="mobile" type="number" placeholder="Mobile No" class="form-control input-md" value="<?php echo $row1['mobile'];  ?>">
  </div>
</div>
    
<div class="form-group">
  <label class="col-md-4 control-label" for="01">Email:</label>  
  <div class="col-md-5">
  <input id="01" name="email" type="email" placeholder="Email" class="form-control input-md" value="<?php echo $row1['email'];  ?>">
</div>
    </div>
    
<div class="form-group">
  <label class="col-md-4 control-label" for="01">Father's Name:</label>  
  <div class="col-md-5">
  <input id="01" name="fathers_name" type="text" placeholder="Father's Name" class="form-control input-md" style="width: 100%; background-color: white;" value="<?php echo $row2['fathers_name'];  ?>">
  </div>
</div>
    
<div class="form-group">
  <label class="col-md-4 control-label" for="01">Father's Mobile No:</label>  
  <div class="col-md-5">
  <input id="01" name="fathers_mobile" type="number" placeholder="Father's Mobile No" class="form-control input-md" value="<?php echo $row2['fathers_mobile_no'];  ?>">
  </div>
</div>
         
<div class="form-group">
  <label class="col-md-4 control-label" for="01">Mother's Name:</label>  
  <div class="col-md-5">
  <input id="01" name="mothers_name" type="text" placeholder="Mother's Name" class="form-control input-md" style="width: 100%; background-color: white;" value="<?php echo $row2['mothers_name'];  ?>">
  </div>
</div>
         
<div class="form-group">
  <label class="col-md-4 control-label" for="01">Mother's Mobile No:</label>  
  <div class="col-md-5">
  <input id="01" name="mothers_mobile" type="number" placeholder="Mother's Mobile No" class="form-control input-md" value="<?php echo $row2['mothers_mobile_no'];  ?>">
  </div>
</div>
    
<div class="form-group">
  <label class="col-md-4 control-label" for="01">Guardian's Name:</label>  
  <div class="col-md-5">
  <input id="01" name="guardians_name" type="text" placeholder="Guardian's Name" class="form-control input-md" style="width: 100%; background-color: white;" value="<?php echo $row2['guardians_name'];  ?>">
  </div>
</div>
         
<div class="form-group">
  <label class="col-md-4 control-label" for="01">Guardian's Mobile No:</label>  
  <div class="col-md-5">
  <input id="01" name="guardian_mobile" type="number" placeholder="Guardian's Mobile No" class="form-control input-md" value="<?php echo $row2['guardians_mobile_no'];  ?>">
  </div>
</div>
        
<div class="form-group">
  <label class="col-md-4 control-label" for="01">Guardian's Relation:</label>  
  <div class="col-md-5">
  <input id="01" name="guardians_relation" type="text" placeholder="Guardian's Relation" class="form-control input-md" style="width: 100%; background-color: white;" value="<?php echo $row2['guardians_relation'];  ?>">
  </div>
</div>
      
<div class="form-group">
  <label class="col-md-4 control-label" for="01">Birth Date:</label>  
  <div class="col-md-5">
  <input id="01" name="birth_date" type="date" placeholder="Birth Date" class="form-control input-md" style="width: 100%; background-color: white;" value="<?php echo $row2['birth_date'];  ?>">
  </div>
</div>
      
<div class="form-group">
  <label class="col-md-4 control-label" for="01">Birth Certificate ID:</label>  
  <div class="col-md-5">
  <input id="01" name="birth_id" type="number" placeholder="Birth Certificate ID" class="form-control input-md" value="<?php echo $row2['birth_cirtificate_id'];  ?>">
  </div>
</div>
      
<div class="form-group">
  <label class="col-md-4 control-label" for="01">House No:</label>  
  <div class="col-md-5">
  <input id="01" name="house" type="text" placeholder="House No" class="form-control input-md" style="width: 100%; background-color: white;" value="<?php echo $row3['house_no'];  ?>">
  </div>
</div>
  
<div class="form-group">
  <label class="col-md-4 control-label" for="01">Road No:</label>  
  <div class="col-md-5">
  <input id="01" name="road" type="text" placeholder="Road No" class="form-control input-md" style="width: 100%; background-color: white;" value="<?php echo $row3['road_no'];  ?>">
  </div>
</div>
      
<div class="form-group">
  <label class="col-md-4 control-label" for="01">Village:</label>  
  <div class="col-md-5">
  <input id="01" name="village" type="text" placeholder="Village" class="form-control input-md" style="width: 100%; background-color: white;" value="<?php echo $row3['village'];  ?>">
  </div>
</div>
    
<div class="form-group">
  <label class="col-md-4 control-label" for="01">Post Code:</label>  
  <div class="col-md-5">
  <input id="01" name="post" type="number" placeholder="Post Code" class="form-control input-md" value="<?php echo $row2['post_code'];  ?>">
  </div>
</div>
      
<div class="form-group">
  <label class="col-md-4 control-label" for="01">Thana:</label>  
  <div class="col-md-5">
  <input id="01" name="thana" type="text" placeholder="Thana" class="form-control input-md" style="width: 100%; background-color: white;" value="<?php echo $row3['thana'];  ?>">
  </div>
</div>
       
<div class="form-group">
  <label class="col-md-4 control-label" for="01">District:</label>  
  <div class="col-md-5">
  <input id="01" name="district" type="text" placeholder="District" class="form-control input-md" style="width: 100%; background-color: white;" value="<?php echo $row3['district'];  ?>">
  </div>
</div>  
      
<div class="form-group">
  <label class="col-md-4 control-label" for="01">Division:</label>  
  <div class="col-md-5">
  <input id="01" name="division" type="text" placeholder="Division" class="form-control input-md" style="width: 100%; background-color: white;" value="<?php echo $row3['division'];  ?>">
  </div>
</div>
      
<div class="form-group">
  <label class="col-md-4 control-label" for="01">Password:</label>  
  <div class="col-md-5">
  <input id="01" name="password1" type="password" placeholder="Password" class="form-control input-md">
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="01">Retype Password:</label>  
  <div class="col-md-5">
  <input id="01" name="password2" type="password" placeholder="Retype Password" class="form-control input-md">
  </div>
</div>
    
<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Submit"></label>
  <div class="col-md-5">
   <input  class="btn btn-primary button" type="submit" name="submit" value="Submit">
  </div>
</div>

</fieldset>
</form>
</div>
</div>
		<?php include 'footer.php' ?>

  </body>
</html>