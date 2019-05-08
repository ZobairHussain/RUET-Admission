<?php session_start(); 

require_once('../db.php');

if(isset($_POST['submit'])) {
    if(empty($_POST['id']) || empty($_POST['phy']) || empty($_POST['che']) || empty($_POST['math']) || empty($_POST['eng'])) {
        echo "All Fields Are Required!!!";
    } else {
        $id = mysqli_real_escape_string($con, $_POST['id']);
        $phy = mysqli_real_escape_string($con, $_POST['phy']);
        $che = mysqli_real_escape_string($con, $_POST['che']);
        $math = mysqli_real_escape_string($con, $_POST['math']);
        $eng = mysqli_real_escape_string($con, $_POST['eng']);
        
        $sql = "INSERT INTO `hsc_result` (`user_id`, `physics`, `chemistry`, `math`, `english`) VALUES ('$id', '$phy', '$che', '$math', '$eng')";
        $res = mysqli_query($con, $sql);
        
        if(!$res) {
            echo "Sorry";
        } else {
            echo '<script type="text/javascript">alert("Inserted")</script>';
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
    <title>Registration01</title>

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
   <div class="container">
  <!-- Navigation -->
  <div class="row">
<?php include('nav.php'); ?>
  </div>
</div>
        
        <br><br><br><br><br><br><br>

        <!-- /FORM -->
<div class="container">
	<div class="row">
		<form class="form-horizontal" method="post" action="">
<fieldset>

<!-- Form Name -->
<legend align="center">Insert Student's HSC Result</legend>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Current Fleet Size">Student's ID:</label>  
  <div class="col-md-5">
  <input id="Current Fleet Size" name="id" type="number" placeholder="Student's ID" class="form-control input-md" >
  </div>
</div>
    
    
    <!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Current Fleet Size">Physics Result:</label>  
  <div class="col-md-5">
  <input id="Current Fleet Size" name="phy" type="number" placeholder="Physics Number" class="form-control input-md">
  </div>
</div>
    
    <!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Current Fleet Size">Chemistry Result:</label>  
  <div class="col-md-5">
  <input id="Current Fleet Size" name="che" type="number" placeholder="Physics Number" class="form-control input-md">
  </div>
</div>   


 
 <!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Current Fleet Size">Math Result:</label>  
  <div class="col-md-5">
  <input id="Current Fleet Size" name="math" type="number" placeholder="Math Number" class="form-control input-md">
  </div>
</div>
    
    
      <!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Current Fleet Size">English Result:</label>  
  <div class="col-md-5">
  <input id="Current Fleet Size" name="eng" type="number" placeholder="English Number" class="form-control input-md">
  </div>
</div>   
    
<!-- Button -->
<div class="form-group">
  <label class="col-md-2 control-label" for="singlebutton"></label>
  <div class="col-md-4">
   <input id="singlebutton" type="submit" name="submit" value="Submit" class="btn btn-success" style="margin-left: 100%;">
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