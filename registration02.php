<?php
 session_start();

//db
require_once('db.php');

    if(isset($_POST['submit'])){
        if(empty($_POST['sscroll']) || empty($_POST['sscreg']) || empty($_POST['sscboard']) || empty($_POST['sscyear']) || empty($_POST['hscroll']) || empty($_POST['hscreg']) || empty($_POST['hscboard']) || empty($_POST['hscyear'])){
            echo '<script type="text/javascript">alert("All Fields are required!")</script>';
        } else {
            $id = $_SESSION['id'];
            $name = $_SESSION['name'];
            $sscroll = mysqli_real_escape_string($con, $_POST['sscroll']);
            $sscreg = mysqli_real_escape_string($con, $_POST['sscreg']);
            $sscboard = mysqli_real_escape_string($con, $_POST['sscboard']);
            $sscyear = mysqli_real_escape_string($con, $_POST['sscyear']);
            $hscroll = mysqli_real_escape_string($con, $_POST['hscroll']);
            $hscreg = mysqli_real_escape_string($con, $_POST['hscreg']);
            $hscboard = mysqli_real_escape_string($con, $_POST['hscboard']);
            $hscyear = mysqli_real_escape_string($con, $_POST['hscyear']);
            

            $sqlssc = "INSERT INTO `ssc` (`user_id`, `roll`, `reg`, `passing_year`, `board`) VALUES ('$id', '$sscroll', '$sscreg', '$sscyear', '$sscboard')";
            $resultssc = mysqli_query($con, $sqlssc);
            
            $sqlhsc = "INSERT INTO `hsc` (`user_id`, `roll`, `reg`, `passing_year`, `board`) VALUES ('$id', '$hscroll', '$hscreg', '$hscyear', '$hscboard')";
            $resulthsc = mysqli_query($con, $sqlhsc);

            if(!$resultssc){
                echo '<script type="text/javascript">alert("Can not access ssc database!")</script>';
            } else if(!$resulthsc){
                echo '<script type="text/javascript">alert("Can not access hsc database!")</script>';
            } else {
                header('location: profile01.php');
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
    <title>Registration02</title>
      

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/home.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
    <body style="background-color: rgb(248,251,255)">
         <?php include 'navbar.php' ?>
         <?php include('sidebar.php'); ?>
         
        <!-- /FORM -->
<div class="container">
	<div class="row">
		<form class="form-horizontal" method="post" action="">
<fieldset>

<!-- Form Name -->
<legend align="center">Fill up this form to complete your register</legend>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Current Fleet Size">SSC Roll</label>  
  <div class="col-md-5">
  <input id="Current Fleet Size" name="sscroll" type="number" placeholder="SSC Roll" class="form-control input-md">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="01">SSC Reg: No</label>  
  <div class="col-md-5">
  <input id="01" name="sscreg" type="number" placeholder="SSC Reg: No" class="form-control input-md">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="01">SSC Board</label>
  <div class="col-md-5">
    <select id="01" name="sscboard" class="form-control">
        
      <option value="Dhaka">Dhaka</option>
      <option value="Dinajpur">Dinajpur</option>
      <option value="Rajshahi">Rajshahi</option>
      <option value="Comilla">Comilla</option>
      <option value="Jessore">Jessore</option>
      <option value="Chitogong">Chitogong</option>
      <option value="Barishal">Barishal</option>
      <option value="Sylhet">Sylhet</option>
      <option value="Madrashah">Madrashah</option>
        
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="01">SSC Pssing Year</label>
  <div class="col-md-5">
    <select id="01" name="sscyear" class="form-control">
        
      <option value="2017">2017</option>
      <option value="2016">2016</option>
      <option value="2015">2015</option>
      <option value="2014">2014</option>
      <option value="2013">2013</option>
        
    </select>
  </div>
</div>    
    
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Current Fleet Size">HSC Roll</label>  
  <div class="col-md-5">
  <input id="Current Fleet Size" name="hscroll" type="number" placeholder="HCS Roll" class="form-control input-md">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="01">HSC Reg: No</label>  
  <div class="col-md-5">
  <input id="01" name="hscreg" type="number" placeholder="HCS Reg: No" class="form-control input-md">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="01">HSC Board</label>
  <div class="col-md-5">
    <select id="01" name="hscboard" class="form-control">
        
      <option value="Dhaka">Dhaka</option>
      <option value="Dinajpur">Dinajpur</option>
      <option value="Rajshahi">Rajshahi</option>
      <option value="Comilla">Comilla</option>
      <option value="Jessore">Jessore</option>
      <option value="Chitogong">Chitogong</option>
      <option value="Barishal">Barishal</option>
      <option value="Sylhet">Sylhet</option>
      <option value="Madrashah">Madrashah</option>
        
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="01">HSC Pssing Year</label>
  <div class="col-md-5">
    <select id="01" name="hscyear" class="form-control">
        
      <option value="2017">2017</option>
      <option value="2016">2016</option>
      <option value="2015">2015</option>
      <option value="2014">2014</option>
      <option value="2013">2013</option>
        
    </select>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="01">Submit</label>
  <div class="col-md-4">
   <input class="btn btn-primary button" type="submit" name="submit" value="Submit">
  </div>
</div>

</fieldset>
</form>

	</div>
</div>
			
			
			
		
   
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>