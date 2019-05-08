<?php
 session_start();

//db
require_once('db.php');

    if(isset($_POST['submit'])){
        if(empty($_POST['1st_sub']) || empty($_POST['2nd_sub']) || empty($_POST['3rd_sub']) || empty($_POST['4th_sub']) || empty($_POST['5th_sub']) || empty($_POST['6th_sub']) || empty($_POST['7th_sub']) || empty($_POST['8th_sub']) || empty($_POST['9th_sub']) || empty($_POST['10th_sub']) || empty($_POST['11th_sub']) || empty($_POST['12th_sub']) || empty($_POST['13th_sub'])){
            '<script type="text/javascript">alert("All fields are required.")</script>';
        } else {
            $id = $_SESSION['id'];
            //saving original values
            $fetch1 = "SELECT * FROM `subject_list` WHERE user_id=$id";
            $r = mysqli_query($con, $fetch1);
            $row = mysqli_fetch_assoc($r);
            
            
            $fst = mysqli_real_escape_string($con, $_POST['1st_sub']);
            $snd = mysqli_real_escape_string($con, $_POST['2nd_sub']);
            $trd = mysqli_real_escape_string($con, $_POST['3rd_sub']);
            $fth = mysqli_real_escape_string($con, $_POST['4th_sub']);
            $fith = mysqli_real_escape_string($con, $_POST['5th_sub']);
            $sith = mysqli_real_escape_string($con, $_POST['6th_sub']);
            $seth = mysqli_real_escape_string($con, $_POST['7th_sub']);
            $eth = mysqli_real_escape_string($con, $_POST['8th_sub']);
            $nth = mysqli_real_escape_string($con, $_POST['9th_sub']);
            $tth = mysqli_real_escape_string($con, $_POST['10th_sub']);
            $elth = mysqli_real_escape_string($con, $_POST['11th_sub']);
            $twrh = mysqli_real_escape_string($con, $_POST['12th_sub']);
            $thirh = mysqli_real_escape_string($con, $_POST['13th_sub']);
             

            $sql = "UPDATE `subject_list` SET `1` = '$fst', `2` = '$snd', `3` = '$trd', `4` = '$fth', `5` = '$fith', `6` = '$sith', `7` = '$seth', `8` = '$eth', `9` = '$nth', `10` = '$tth', `11` = '$elth', `12` = '$twrh', `13` = '$thirh' WHERE `subject_list`.`user_id` = $id";
            $result = mysqli_query($con, $sql);
            
           $fetch = "SELECT * FROM `subject_list` WHERE user_id=$id";
            $rs = mysqli_query($con, $fetch);
            $array = mysqli_fetch_assoc($rs);
            $num = count(array_unique($array));
            
            if($num <= 13) {
                 $sql = "UPDATE `subject_list` SET `1` = '".$row['1']."', `2` = '".$row['2']."', `3` = '".$row['3']."', `4` = '".$row['4']."', `5` = '".$row['5']."', `6` = '".$row['6']."', `7` = '".$row['7']."', `8` = '".$row['8']."', `9` = '".$row['9']."', `10` = '".$row['10']."', `11` = '".$row['11']."', `12` = '".$row['12']."', `13` = '".$row['13']."' WHERE `subject_list`.`user_id` = $id";
                $result = mysqli_query($con, $sql);
                
                if($result){
                   echo '<script type="text/javascript">alert("Enter Unique Department")</script>'; 
                } 
            } else {
                    if(!$result){
                        echo '<script type="text/javascript">alert("Fail to update database.")</script>';
                    }else {
                        //header('location: profile01.php');
                       echo '<script type="text/javascript">alert("Subject List updated.")</script>';
                    }
                }
        }
    }

if(isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM subject_list WHERE user_id=$id";
    
    $result = mysqli_query($con, $sql);
    
    $row = mysqli_fetch_assoc($result);

    
    
    if(!$result) {header('location: sub_form.php');}
}else {
    header('location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
   <title>Subject Choice List</title>
     <?php include 'link.php' ?>
  </head>
  
 <body style="background-color: rgb(248,251,255)">
<?php include('navbar.php'); ?>
 <?php include 'sidebar.php' ?>
 
 <!-- FORM -->
<div class="container">
	<div class="row">
		<form class="form-horizontal" method="post" action="">
<fieldset>

<!-- Form Name -->
<legend align="center">Enter your subject choice list:</legend>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="01">1st Subject</label>
  <div class="col-md-5">
    <select id="01" name="1st_sub" class="form-control">
    <option value="CSE" <?php if (isset($row['1']) && $row['1']=="CSE") 
    echo "selected"; ?> >CSE</option>
    <option value="EEE" <?php if (isset($row['1']) && $row['1']=="EEE") 
    echo "selected"; ?> >EEE</option>
    <option value="ECE" <?php if (isset($row['1']) && $row['1']=="ECE") 
    echo "selected"; ?> >ECE</option>
    <option value="ETE" <?php if (isset($row['1']) && $row['1']=="ETE") 
    echo "selected"; ?> >ETE</option>
    <option value="ME" <?php if (isset($row['1']) && $row['1']=="ME") 
    echo "selected"; ?> >ME</option>
    <option value="MTE" <?php if (isset($row['1']) && $row['1']=="MTE") 
    echo "selected"; ?> >MTE</option>
    <option value="GCE" <?php if (isset($row['1']) && $row['1']=="GCE") 
    echo "selected"; ?> >GCE</option>
    <option value="MSE" <?php if (isset($row['1']) && $row['1']=="MSE") 
    echo "selected"; ?> >MSE</option>
    <option value="CE" <?php if (isset($row['1']) && $row['1']=="CE") 
    echo "selected"; ?> >CE</option>
    <option value="BCM" <?php if (isset($row['1']) && $row['1']=="BCM") 
    echo "selected"; ?> >BCM</option>
    <option value="CFPE" <?php if (isset($row['1']) && $row['1']=="CFPE") 
    echo "selected"; ?> >CFPE</option>
    <option value="ARCHI" <?php if (isset($row['1']) && $row['1']=="ARCHI") 
    echo "selected"; ?> >ARCHI</option>
    <option value="URP" <?php if (isset($row['1']) && $row['1']=="URP") 
    echo "selected"; ?> >URP</option>
    </select>
  </div>
</div>   
    
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="01">2nd Subject</label>
  <div class="col-md-5">
    <select id="01" name="2nd_sub" class="form-control">
    <option value="CSE" <?php if (isset($row['2']) && $row['2']=="CSE") 
    echo "selected"; ?> >CSE</option>
    <option value="EEE" <?php if (isset($row['2']) && $row['2']=="EEE") 
    echo "selected"; ?> >EEE</option>
    <option value="ECE" <?php if (isset($row['2']) && $row['2']=="ECE") 
    echo "selected"; ?> >ECE</option>
    <option value="ETE" <?php if (isset($row['2']) && $row['2']=="ETE") 
    echo "selected"; ?> >ETE</option>
    <option value="ME" <?php if (isset($row['2']) && $row['2']=="ME") 
    echo "selected"; ?> >ME</option>
    <option value="MTE" <?php if (isset($row['2']) && $row['2']=="MTE") 
    echo "selected"; ?> >MTE</option>
    <option value="GCE" <?php if (isset($row['2']) && $row['2']=="GCE") 
    echo "selected"; ?> >GCE</option>
    <option value="MSE" <?php if (isset($row['2']) && $row['2']=="MSE") 
    echo "selected"; ?> >MSE</option>
    <option value="CE" <?php if (isset($row['2']) && $row['2']=="CE") 
    echo "selected"; ?> >CE</option>
    <option value="BCM" <?php if (isset($row['2']) && $row['2']=="BCM") 
    echo "selected"; ?> >BCM</option>
    <option value="CFPE" <?php if (isset($row['2']) && $row['2']=="CFPE") 
    echo "selected"; ?> >CFPE</option>
    <option value="ARCHI" <?php if (isset($row['2']) && $row['2']=="ARCHI") 
    echo "selected"; ?> >ARCHI</option>
    <option value="URP" <?php if (isset($row['2']) && $row['2']=="URP") 
    echo "selected"; ?> >URP</option>
    </select>
  </div>
</div> 
  
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="01">3rd Subject</label>
  <div class="col-md-5">
    <select id="01" name="3rd_sub" class="form-control">
    <option value="CSE" <?php if (isset($row['3']) && $row['3']=="CSE") 
    echo "selected"; ?> >CSE</option>
    <option value="EEE" <?php if (isset($row['3']) && $row['3']=="EEE") 
    echo "selected"; ?> >EEE</option>
    <option value="ECE" <?php if (isset($row['3']) && $row['3']=="ECE") 
    echo "selected"; ?> >ECE</option>
    <option value="ETE" <?php if (isset($row['3']) && $row['3']=="ETE") 
    echo "selected"; ?> >ETE</option>
    <option value="ME" <?php if (isset($row['3']) && $row['3']=="ME") 
    echo "selected"; ?> >ME</option>
    <option value="MTE" <?php if (isset($row['3']) && $row['3']=="MTE") 
    echo "selected"; ?> >MTE</option>
    <option value="GCE" <?php if (isset($row['3']) && $row['3']=="GCE") 
    echo "selected"; ?> >GCE</option>
    <option value="MSE" <?php if (isset($row['3']) && $row['3']=="MSE") 
    echo "selected"; ?> >MSE</option>
    <option value="CE" <?php if (isset($row['3']) && $row['3']=="CE") 
    echo "selected"; ?> >CE</option>
    <option value="BCM" <?php if (isset($row['3']) && $row['3']=="BCM") 
    echo "selected"; ?> >BCM</option>
    <option value="CFPE" <?php if (isset($row['3']) && $row['3']=="CFPE") 
    echo "selected"; ?> >CFPE</option>
    <option value="ARCHI" <?php if (isset($row['3']) && $row['3']=="ARCHI") 
    echo "selected"; ?> >ARCHI</option>
    <option value="URP" <?php if (isset($row['3']) && $row['3']=="URP") 
    echo "selected"; ?> >URP</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="01">4th Subject</label>
  <div class="col-md-5">
    <select id="01" name="4th_sub" class="form-control">
    <option value="CSE" <?php if (isset($row['4']) && $row['4']=="CSE") 
    echo "selected"; ?> >CSE</option>
    <option value="EEE" <?php if (isset($row['4']) && $row['4']=="EEE") 
    echo "selected"; ?> >EEE</option>
    <option value="ECE" <?php if (isset($row['4']) && $row['4']=="ECE") 
    echo "selected"; ?> >ECE</option>
    <option value="ETE" <?php if (isset($row['4']) && $row['4']=="ETE") 
    echo "selected"; ?> >ETE</option>
    <option value="ME" <?php if (isset($row['4']) && $row['4']=="ME") 
    echo "selected"; ?> >ME</option>
    <option value="MTE" <?php if (isset($row['4']) && $row['4']=="MTE") 
    echo "selected"; ?> >MTE</option>
    <option value="GCE" <?php if (isset($row['4']) && $row['4']=="GCE") 
    echo "selected"; ?> >GCE</option>
    <option value="MSE" <?php if (isset($row['4']) && $row['4']=="MSE") 
    echo "selected"; ?> >MSE</option>
    <option value="CE" <?php if (isset($row['4']) && $row['4']=="CE") 
    echo "selected"; ?> >CE</option>
    <option value="BCM" <?php if (isset($row['4']) && $row['4']=="BCM") 
    echo "selected"; ?> >BCM</option>
    <option value="CFPE" <?php if (isset($row['4']) && $row['4']=="CFPE") 
    echo "selected"; ?> >CFPE</option>
    <option value="ARCHI" <?php if (isset($row['4']) && $row['4']=="ARCHI") 
    echo "selected"; ?> >ARCHI</option>
    <option value="URP" <?php if (isset($row['4']) && $row['4']=="URP") 
    echo "selected"; ?> >URP</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="01">5th Subject</label>
  <div class="col-md-5">
    <select id="01" name="5th_sub" class="form-control">
    <option value="CSE" <?php if (isset($row['5']) && $row['5']=="CSE") 
    echo "selected"; ?> >CSE</option>
    <option value="EEE" <?php if (isset($row['5']) && $row['5']=="EEE") 
    echo "selected"; ?> >EEE</option>
    <option value="ECE" <?php if (isset($row['5']) && $row['5']=="ECE") 
    echo "selected"; ?> >ECE</option>
    <option value="ETE" <?php if (isset($row['5']) && $row['5']=="ETE") 
    echo "selected"; ?> >ETE</option>
    <option value="ME" <?php if (isset($row['5']) && $row['5']=="ME") 
    echo "selected"; ?> >ME</option>
    <option value="MTE" <?php if (isset($row['5']) && $row['5']=="MTE") 
    echo "selected"; ?> >MTE</option>
    <option value="GCE" <?php if (isset($row['5']) && $row['5']=="GCE") 
    echo "selected"; ?> >GCE</option>
    <option value="MSE" <?php if (isset($row['5']) && $row['5']=="MSE") 
    echo "selected"; ?> >MSE</option>
    <option value="CE" <?php if (isset($row['5']) && $row['5']=="CE") 
    echo "selected"; ?> >CE</option>
    <option value="BCM" <?php if (isset($row['5']) && $row['5']=="BCM") 
    echo "selected"; ?> >BCM</option>
    <option value="CFPE" <?php if (isset($row['5']) && $row['5']=="CFPE") 
    echo "selected"; ?> >CFPE</option>
    <option value="ARCHI" <?php if (isset($row['5']) && $row['5']=="ARCHI") 
    echo "selected"; ?> >ARCHI</option>
    <option value="URP" <?php if (isset($row['5']) && $row['5']=="URP") 
    echo "selected"; ?> >URP</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="01">6th Subject</label>
  <div class="col-md-5">
    <select id="01" name="6th_sub" class="form-control">
    <option value="CSE" <?php if (isset($row['6']) && $row['6']=="CSE") 
    echo "selected"; ?> >CSE</option>
    <option value="EEE" <?php if (isset($row['6']) && $row['6']=="EEE") 
    echo "selected"; ?> >EEE</option>
    <option value="ECE" <?php if (isset($row['6']) && $row['6']=="ECE") 
    echo "selected"; ?> >ECE</option>
    <option value="ETE" <?php if (isset($row['6']) && $row['6']=="ETE") 
    echo "selected"; ?> >ETE</option>
    <option value="ME" <?php if (isset($row['6']) && $row['6']=="ME") 
    echo "selected"; ?> >ME</option>
    <option value="MTE" <?php if (isset($row['6']) && $row['6']=="MTE") 
    echo "selected"; ?> >MTE</option>
    <option value="GCE" <?php if (isset($row['6']) && $row['6']=="GCE") 
    echo "selected"; ?> >GCE</option>
    <option value="MSE" <?php if (isset($row['6']) && $row['6']=="MSE") 
    echo "selected"; ?> >MSE</option>
    <option value="CE" <?php if (isset($row['6']) && $row['6']=="CE") 
    echo "selected"; ?> >CE</option>
    <option value="BCM" <?php if (isset($row['6']) && $row['6']=="BCM") 
    echo "selected"; ?> >BCM</option>
    <option value="CFPE" <?php if (isset($row['6']) && $row['6']=="CFPE") 
    echo "selected"; ?> >CFPE</option>
    <option value="ARCHI" <?php if (isset($row['6']) && $row['6']=="ARCHI") 
    echo "selected"; ?> >ARCHI</option>
    <option value="URP" <?php if (isset($row['6']) && $row['6']=="URP") 
    echo "selected"; ?> >URP</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="01">7th Subject</label>
  <div class="col-md-5">
    <select id="01" name="7th_sub" class="form-control">
    <option value="CSE" <?php if (isset($row['7']) && $row['7']=="CSE") 
    echo "selected"; ?> >CSE</option>
    <option value="EEE" <?php if (isset($row['7']) && $row['7']=="EEE") 
    echo "selected"; ?> >EEE</option>
    <option value="ECE" <?php if (isset($row['7']) && $row['7']=="ECE") 
    echo "selected"; ?> >ECE</option>
    <option value="ETE" <?php if (isset($row['7']) && $row['7']=="ETE") 
    echo "selected"; ?> >ETE</option>
    <option value="ME" <?php if (isset($row['7']) && $row['7']=="ME") 
    echo "selected"; ?> >ME</option>
    <option value="MTE" <?php if (isset($row['7']) && $row['7']=="MTE") 
    echo "selected"; ?> >MTE</option>
    <option value="GCE" <?php if (isset($row['7']) && $row['7']=="GCE") 
    echo "selected"; ?> >GCE</option>
    <option value="MSE" <?php if (isset($row['7']) && $row['7']=="MSE") 
    echo "selected"; ?> >MSE</option>
    <option value="CE" <?php if (isset($row['7']) && $row['7']=="CE") 
    echo "selected"; ?> >CE</option>
    <option value="BCM" <?php if (isset($row['7']) && $row['7']=="BCM") 
    echo "selected"; ?> >BCM</option>
    <option value="CFPE" <?php if (isset($row['7']) && $row['7']=="CFPE") 
    echo "selected"; ?> >CFPE</option>
    <option value="ARCHI" <?php if (isset($row['7']) && $row['7']=="ARCHI") 
    echo "selected"; ?> >ARCHI</option>
    <option value="URP" <?php if (isset($row['7']) && $row['7']=="URP") 
    echo "selected"; ?> >URP</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="01">8th Subject</label>
  <div class="col-md-5">
    <select id="01" name="8th_sub" class="form-control">
    <option value="CSE" <?php if (isset($row['8']) && $row['8']=="CSE") 
    echo "selected"; ?> >CSE</option>
    <option value="EEE" <?php if (isset($row['8']) && $row['8']=="EEE") 
    echo "selected"; ?> >EEE</option>
    <option value="ECE" <?php if (isset($row['8']) && $row['8']=="ECE") 
    echo "selected"; ?> >ECE</option>
    <option value="ETE" <?php if (isset($row['8']) && $row['8']=="ETE") 
    echo "selected"; ?> >ETE</option>
    <option value="ME" <?php if (isset($row['8']) && $row['8']=="ME") 
    echo "selected"; ?> >ME</option>
    <option value="MTE" <?php if (isset($row['8']) && $row['8']=="MTE") 
    echo "selected"; ?> >MTE</option>
    <option value="GCE" <?php if (isset($row['8']) && $row['8']=="GCE") 
    echo "selected"; ?> >GCE</option>
    <option value="MSE" <?php if (isset($row['8']) && $row['8']=="MSE") 
    echo "selected"; ?> >MSE</option>
    <option value="CE" <?php if (isset($row['8']) && $row['8']=="CE") 
    echo "selected"; ?> >CE</option>
    <option value="BCM" <?php if (isset($row['8']) && $row['8']=="BCM") 
    echo "selected"; ?> >BCM</option>
    <option value="CFPE" <?php if (isset($row['8']) && $row['8']=="CFPE") 
    echo "selected"; ?> >CFPE</option>
    <option value="ARCHI" <?php if (isset($row['8']) && $row['8']=="ARCHI") 
    echo "selected"; ?> >ARCHI</option>
    <option value="URP" <?php if (isset($row['8']) && $row['8']=="URP") 
    echo "selected"; ?> >URP</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="01">9th Subject</label>
  <div class="col-md-5">
    <select id="01" name="9th_sub" class="form-control">
    <option value="CSE" <?php if (isset($row['9']) && $row['9']=="CSE") 
    echo "selected"; ?> >CSE</option>
    <option value="EEE" <?php if (isset($row['9']) && $row['9']=="EEE") 
    echo "selected"; ?> >EEE</option>
    <option value="ECE" <?php if (isset($row['9']) && $row['9']=="ECE") 
    echo "selected"; ?> >ECE</option>
    <option value="ETE" <?php if (isset($row['9']) && $row['9']=="ETE") 
    echo "selected"; ?> >ETE</option>
    <option value="ME" <?php if (isset($row['9']) && $row['9']=="ME") 
    echo "selected"; ?> >ME</option>
    <option value="MTE" <?php if (isset($row['9']) && $row['9']=="MTE") 
    echo "selected"; ?> >MTE</option>
    <option value="GCE" <?php if (isset($row['9']) && $row['9']=="GCE") 
    echo "selected"; ?> >GCE</option>
    <option value="MSE" <?php if (isset($row['9']) && $row['9']=="MSE") 
    echo "selected"; ?> >MSE</option>
    <option value="CE" <?php if (isset($row['9']) && $row['9']=="CE") 
    echo "selected"; ?> >CE</option>
    <option value="BCM" <?php if (isset($row['9']) && $row['9']=="BCM") 
    echo "selected"; ?> >BCM</option>
    <option value="CFPE" <?php if (isset($row['9']) && $row['9']=="CFPE") 
    echo "selected"; ?> >CFPE</option>
    <option value="ARCHI" <?php if (isset($row['9']) && $row['9']=="ARCHI") 
    echo "selected"; ?> >ARCHI</option>
    <option value="URP" <?php if (isset($row['9']) && $row['9']=="URP") 
    echo "selected"; ?> >URP</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="01">10th Subject</label>
  <div class="col-md-5">
    <select id="01" name="10th_sub" class="form-control">
    <option value="CSE" <?php if (isset($row['10']) && $row['10']=="CSE") 
    echo "selected"; ?> >CSE</option>
    <option value="EEE" <?php if (isset($row['10']) && $row['10']=="EEE") 
    echo "selected"; ?> >EEE</option>
    <option value="ECE" <?php if (isset($row['10']) && $row['10']=="ECE") 
    echo "selected"; ?> >ECE</option>
    <option value="ETE" <?php if (isset($row['10']) && $row['10']=="ETE") 
    echo "selected"; ?> >ETE</option>
    <option value="ME" <?php if (isset($row['10']) && $row['10']=="ME") 
    echo "selected"; ?> >ME</option>
    <option value="MTE" <?php if (isset($row['10']) && $row['10']=="MTE") 
    echo "selected"; ?> >MTE</option>
    <option value="GCE" <?php if (isset($row['10']) && $row['10']=="GCE") 
    echo "selected"; ?> >GCE</option>
    <option value="MSE" <?php if (isset($row['10']) && $row['10']=="MSE") 
    echo "selected"; ?> >MSE</option>
    <option value="CE" <?php if (isset($row['10']) && $row['10']=="CE") 
    echo "selected"; ?> >CE</option>
    <option value="BCM" <?php if (isset($row['10']) && $row['10']=="BCM") 
    echo "selected"; ?> >BCM</option>
    <option value="CFPE" <?php if (isset($row['10']) && $row['10']=="CFPE") 
    echo "selected"; ?> >CFPE</option>
    <option value="ARCHI" <?php if (isset($row['10']) && $row['10']=="ARCHI") 
    echo "selected"; ?> >ARCHI</option>
    <option value="URP" <?php if (isset($row['10']) && $row['10']=="URP") 
    echo "selected"; ?> >URP</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="01">11th Subject</label>
  <div class="col-md-5">
    <select id="01" name="11th_sub" class="form-control">
    <option value="CSE" <?php if (isset($row['11']) && $row['11']=="CSE") 
    echo "selected"; ?> >CSE</option>
    <option value="EEE" <?php if (isset($row['11']) && $row['11']=="EEE") 
    echo "selected"; ?> >EEE</option>
    <option value="ECE" <?php if (isset($row['11']) && $row['11']=="ECE") 
    echo "selected"; ?> >ECE</option>
    <option value="ETE" <?php if (isset($row['11']) && $row['11']=="ETE") 
    echo "selected"; ?> >ETE</option>
    <option value="ME" <?php if (isset($row['11']) && $row['11']=="ME") 
    echo "selected"; ?> >ME</option>
    <option value="MTE" <?php if (isset($row['11']) && $row['11']=="MTE") 
    echo "selected"; ?> >MTE</option>
    <option value="GCE" <?php if (isset($row['11']) && $row['11']=="GCE") 
    echo "selected"; ?> >GCE</option>
    <option value="MSE" <?php if (isset($row['11']) && $row['11']=="MSE") 
    echo "selected"; ?> >MSE</option>
    <option value="CE" <?php if (isset($row['11']) && $row['11']=="CE") 
    echo "selected"; ?> >CE</option>
    <option value="BCM" <?php if (isset($row['11']) && $row['11']=="BCM") 
    echo "selected"; ?> >BCM</option>
    <option value="CFPE" <?php if (isset($row['11']) && $row['11']=="CFPE") 
    echo "selected"; ?> >CFPE</option>
    <option value="ARCHI" <?php if (isset($row['11']) && $row['11']=="ARCHI") 
    echo "selected"; ?> >ARCHI</option>
    <option value="URP" <?php if (isset($row['11']) && $row['11']=="URP") 
    echo "selected"; ?> >URP</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="01">12th Subject</label>
  <div class="col-md-5">
    <select id="01" name="12th_sub" class="form-control">
    <option value="CSE" <?php if (isset($row['12']) && $row['12']=="CSE") 
    echo "selected"; ?> >CSE</option>
    <option value="EEE" <?php if (isset($row['12']) && $row['12']=="EEE") 
    echo "selected"; ?> >EEE</option>
    <option value="ECE" <?php if (isset($row['12']) && $row['12']=="ECE") 
    echo "selected"; ?> >ECE</option>
    <option value="ETE" <?php if (isset($row['12']) && $row['12']=="ETE") 
    echo "selected"; ?> >ETE</option>
    <option value="ME" <?php if (isset($row['12']) && $row['12']=="ME") 
    echo "selected"; ?> >ME</option>
    <option value="MTE" <?php if (isset($row['12']) && $row['12']=="MTE") 
    echo "selected"; ?> >MTE</option>
    <option value="GCE" <?php if (isset($row['12']) && $row['12']=="GCE") 
    echo "selected"; ?> >GCE</option>
    <option value="MSE" <?php if (isset($row['12']) && $row['12']=="MSE") 
    echo "selected"; ?> >MSE</option>
    <option value="CE" <?php if (isset($row['12']) && $row['12']=="CE") 
    echo "selected"; ?> >CE</option>
    <option value="BCM" <?php if (isset($row['12']) && $row['12']=="BCM") 
    echo "selected"; ?> >BCM</option>
    <option value="CFPE" <?php if (isset($row['12']) && $row['12']=="CFPE") 
    echo "selected"; ?> >CFPE</option>
    <option value="ARCHI" <?php if (isset($row['12']) && $row['12']=="ARCHI") 
    echo "selected"; ?> >ARCHI</option>
    <option value="URP" <?php if (isset($row['12']) && $row['12']=="URP") 
    echo "selected"; ?> >URP</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="01">13th Subject</label>
  <div class="col-md-5">
    <select id="01" name="13th_sub" class="form-control">
    <option value="CSE" <?php if (isset($row['13']) && $row['13']=="CSE") 
    echo "selected"; ?> >CSE</option>
    <option value="EEE" <?php if (isset($row['13']) && $row['13']=="EEE") 
    echo "selected"; ?> >EEE</option>
    <option value="ECE" <?php if (isset($row['13']) && $row['13']=="ECE") 
    echo "selected"; ?> >ECE</option>
    <option value="ETE" <?php if (isset($row['13']) && $row['13']=="ETE") 
    echo "selected"; ?> >ETE</option>
    <option value="ME" <?php if (isset($row['13']) && $row['13']=="ME") 
    echo "selected"; ?> >ME</option>
    <option value="MTE" <?php if (isset($row['13']) && $row['13']=="MTE") 
    echo "selected"; ?> >MTE</option>
    <option value="GCE" <?php if (isset($row['13']) && $row['13']=="GCE") 
    echo "selected"; ?> >GCE</option>
    <option value="MSE" <?php if (isset($row['13']) && $row['13']=="MSE") 
    echo "selected"; ?> >MSE</option>
    <option value="CE" <?php if (isset($row['13']) && $row['13']=="CE") 
    echo "selected"; ?> >CE</option>
    <option value="BCM" <?php if (isset($row['13']) && $row['13']=="BCM") 
    echo "selected"; ?> >BCM</option>
    <option value="CFPE" <?php if (isset($row['13']) && $row['13']=="CFPE") 
    echo "selected"; ?> >CFPE</option>
    <option value="ARCHI" <?php if (isset($row['13']) && $row['13']=="ARCHI") 
    echo "selected"; ?> >ARCHI</option>
    <option value="URP" <?php if (isset($row['13']) && $row['13']=="URP") 
    echo "selected"; ?> >URP</option>
    </select>
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