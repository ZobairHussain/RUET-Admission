<?php
 session_start();
require_once('db.php');

if(isset($_SESSION['name'])) {
    $sql1 = "SELECT * FROM 1st_form WHERE id=".$_SESSION['id'];
    $sql2 = "SELECT * FROM ssc WHERE user_id=".$_SESSION['id'];
    $sql3 = "SELECT * FROM hsc WHERE user_id=".$_SESSION['id'];
    
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
        if(empty($_POST['name']) || empty($_POST['mobile']) || empty($_POST['email']) || empty($_POST['password1']) || empty($_POST['password2']) || empty($_POST['sscroll']) || empty($_POST['sscreg']) || empty($_POST['sscboard']) || empty($_POST['sscyear']) || empty($_POST['hscroll']) || empty($_POST['hscreg']) || empty($_POST['hscboard']) || empty($_POST['hscyear']) ){
            echo "All Fields are required!";
        } else if($_POST['password1'] != $_POST['password2']) {
            echo "Password didn't match";
        } else {
            $id = $_SESSION['id'];
            
            $name = mysqli_real_escape_string($con, $_POST['name']);
            $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $password = md5(mysqli_real_escape_string($con, $_POST['password1']));
            
            $sscroll = mysqli_real_escape_string($con, $_POST['sscroll']);
            $sscreg = mysqli_real_escape_string($con, $_POST['sscreg']);
            $sscboard = mysqli_real_escape_string($con, $_POST['sscboard']);
            $sscyear = mysqli_real_escape_string($con, $_POST['sscyear']);
            $hscroll = mysqli_real_escape_string($con, $_POST['hscroll']);
            $hscreg = mysqli_real_escape_string($con, $_POST['hscreg']);
            $hscboard = mysqli_real_escape_string($con, $_POST['hscboard']);
            $hscyear = mysqli_real_escape_string($con, $_POST['hscyear']);
            
            
             
            $sql = "UPDATE `1st_form` SET `name` = '$name', `mobile` = '$mobile', `email` = '$email' WHERE `1st_form`.`id` = $id";
            $result = mysqli_query($con, $sql);

            $sqlssc = "UPDATE `ssc` SET `roll` = '$sscroll', `reg` = '$sscreg', `passing_year` = '$sscyear', `board` = '$sscboard' WHERE `ssc`.`user_id` = $id";
            $resultssc = mysqli_query($con, $sqlssc);
            
            $sqlhsc = "UPDATE `hsc` SET `roll` = '$hscroll', `reg` = '$hscreg', `passing_year` = '$hscyear', `board` = '$hscboard' WHERE `hsc`.`user_id` = $id";
            $resulthsc = mysqli_query($con, $sqlhsc);

            if(!$resultssc || !$result || !$resulthsc){
                echo "Sorry ssc!";
            } else {
                header('location: profile01.php');
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
   <title>edit01</title>
   <?php include 'link.php' ?>
  </head>
  
  <body style="background-color: rgb(248,251,255)">
  <?php include 'navbar.php' ?>
    <?php include 'sidebar.php' ?>

        <!-- /FORM -->
<div class="container">
	<div class="row">
		<form class="form-horizontal" method="post" action="">
<fieldset>

<!-- Form Name -->
<legend align="center">Edit Your Information</legend>


    
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="01">Name:</label>  
  <div class="col-md-5">
  <input id="01" name="name" type="text" placeholder="Name" class="form-control input-md" style="width: 100%; background-color: white;" value="<?php echo $row1['name'];  ?>">
  </div>
</div>
    
    
    <!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="01">Mobile No:</label>  
  <div class="col-md-5">
  <input id="01" name="mobile" type="number" placeholder="Mobile No" class="form-control input-md" value="<?php echo $row1['mobile'];  ?>">
  </div>
</div>
    
    <!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="01">Email:</label>  
  <div class="col-md-5">
  <input id="01" name="email" type="email" placeholder="Email" class="form-control input-md" value="<?php echo $row1['email'];  ?>">
</div>
    </div>
    
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="01">SSC Roll</label>  
  <div class="col-md-5">
  <input id="01" name="sscroll" type="number" placeholder="SSC Roll" class="form-control input-md" value="<?php echo $row2['roll'];  ?>">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Annual Forklift Purchases">SSC Reg: No</label>  
  <div class="col-md-5">
  <input id="Annual Forklift Purchases" name="sscreg" type="number" placeholder="SSC Reg: No" class="form-control input-md" value="<?php echo $row2['reg'];  ?>">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="01">SSC Board</label>
  <div class="col-md-5">
    <select id="01" name="sscboard" class="form-control">
        
      <option value="Dhaka" <?php if (isset($row2['board']) && $row2['board']=="Dhaka") 
    echo "selected"; ?> >Dhaka</option>
      <option value="Dinajpur" <?php if (isset($row2['board']) && $row2['board']=="Dinajpur") 
    echo "selected"; ?> >Dinajpur</option>
      <option value="Rajshahi" <?php if (isset($row2['board']) && $row2['board']=="Rajshahi") 
    echo "selected"; ?> >Rajshahi</option>
      <option value="Comilla" <?php if (isset($row2['board']) && $row2['board']=="Comilla") 
    echo "selected"; ?> >Comilla</option>
      <option value="Jessore" <?php if (isset($row2['board']) && $row2['board']=="Jessore") 
    echo "selected"; ?> >Jessore</option>
      <option value="Chitogong" <?php if (isset($row2['board']) && $row2['board']=="Chittagong") 
    echo "selected"; ?> >Chitogong</option>
      <option value="Barishal" <?php if (isset($row2['board']) && $row2['board']=="Barishal") 
    echo "selected"; ?> >Barishal</option>
      <option value="Sylhet" <?php if (isset($row2['board']) && $row2['board']=="Sylhet") 
    echo "selected"; ?> >Sylhet</option>
      <option value="Madrashah"<?php if (isset($row2['board']) && $row2['board']=="Madrashah") 
    echo "selected"; ?> >Madrashah</option>
        
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="01">SSC Pssing Year</label>
  <div class="col-md-5">
    <select id="01" name="sscyear" class="form-control">
        
      <option value="2017" <?php if (isset($row2['passing_year']) && $row2['passing_year']=="2017") echo "selected"; ?> >2017</option>
      <option value="2016" <?php if (isset($row2['passing_year']) && $row2['passing_year']=="2016") echo "selected"; ?> >2016</option>
      <option value="2015" <?php if (isset($row2['passing_year']) && $row2['passing_year']=="2015") echo "selected"; ?> >2015</option>
      <option value="2014" <?php if (isset($row2['passing_year']) && $row2['passing_year']=="2014") echo "selected"; ?> >2014</option>
      <option value="2013" <?php if (isset($row2['passing_year']) && $row2['passing_year']=="2013") echo "selected"; ?> >2013</option>
      
        
    </select>
  </div>
</div>    
    
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="01">HSC Roll</label>  
  <div class="col-md-5">
  <input id="01" name="hscroll" type="number" placeholder="HCS Roll" class="form-control input-md" value="<?php echo $row3['roll'];  ?>">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Annual Forklift Purchases">HSC Reg: No</label>  
  <div class="col-md-5">
  <input id="Annual Forklift Purchases" name="hscreg" type="number" placeholder="HCS Reg: No" class="form-control input-md" value="<?php echo $row3['reg'];  ?>">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="01">HSC Board</label>
  <div class="col-md-5">
    <select id="01" name="hscboard" class="form-control">
        
      <option value="Dhaka" <?php if (isset($row3['board']) && $row3['board']=="Dhaka") 
    echo "selected"; ?> >Dhaka</option>
      <option value="Dinajpur" <?php if (isset($row3['board']) && $row3['board']=="Dinajpur") 
    echo "selected"; ?> >Dinajpur</option>
      <option value="Rajshahi" <?php if (isset($row3['board']) && $row3['board']=="Rajshahi") 
    echo "selected"; ?> >Rajshahi</option>
      <option value="Comilla" <?php if (isset($row3['board']) && $row3['board']=="Comilla") 
    echo "selected"; ?> >Comilla</option>
      <option value="Jessore" <?php if (isset($row3['board']) && $row3['board']=="Jessore") 
    echo "selected"; ?> >Jessore</option>
      <option value="Chitogong" <?php if (isset($row3['board']) && $row3['board']=="Chitogong") 
    echo "selected"; ?> >Chitogong</option>
      <option value="Barishal" <?php if (isset($row3['board']) && $row3['board']=="Barishal") 
    echo "selected"; ?> >Barishal</option>
      <option value="Sylhet" <?php if (isset($row3['board']) && $row3['board']=="Sylhet") 
    echo "selected"; ?> >Sylhet</option>
      <option value="Madrashah" <?php if (isset($row3['board']) && $row3['board']=="Madrashah") 
    echo "selected"; ?> >Madrashah</option>
        
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="01">HSC Pssing Year</label>
  <div class="col-md-5">
    <select id="01" name="hscyear" class="form-control">
        
      <option value="2017" <?php if (isset($row3['passing_year']) && $row3['passing_year']=="2017") echo "selected"; ?> >2017</option>
      <option value="2016" <?php if (isset($row3['passing_year']) && $row3['passing_year']=="2016") echo "selected"; ?> >2016</option>
      <option value="2015" <?php if (isset($row3['passing_year']) && $row3['passing_year']=="2015") echo "selected"; ?> >2015</option>
      <option value="2014" <?php if (isset($row3['passing_year']) && $row3['passing_year']=="2014") echo "selected"; ?> >2014</option>
      <option value="2013" <?php if (isset($row3['passing_year']) && $row3['passing_year']=="2013") echo "selected"; ?> >2013</option>

    </select>
  </div>
</div>
    
    <!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="01">Password:</label>  
  <div class="col-md-5">
  <input id="01" name="password1" type="password" placeholder="Password" class="form-control input-md">
  </div>
</div>

          <!-- Password Retype input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="01">Retype Password:</label>  
  <div class="col-md-5">
  <input id="01" name="password2" type="password" placeholder="Retype Password" class="form-control input-md">
  </div>
</div>
    
<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-5">
   <input class="btn btn-primary button" type="submit" name="submit" value="Submit">
  </div>
</div>

</fieldset>
</form>

	</div>
</div>
		
       <?php include 'footer.php' ?>
  </body>
</html>