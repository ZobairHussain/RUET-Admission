<?php
 session_start();

//db
require_once('db.php');

    if(isset($_POST['submit'])){
        if(empty($_POST['1st_sub']) || empty($_POST['2nd_sub']) || empty($_POST['3rd_sub']) || empty($_POST['4th_sub']) || empty($_POST['5th_sub']) || empty($_POST['6th_sub']) || empty($_POST['7th_sub']) || empty($_POST['8th_sub']) || empty($_POST['9th_sub']) || empty($_POST['10th_sub']) || empty($_POST['11th_sub']) || empty($_POST['12th_sub']) || empty($_POST['13th_sub'])){
            echo '<script type="text/javascript">alert("All Fields are Required.")</script>';
        } else {
            $id = $_SESSION['id'];
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
             

            $sql = "INSERT INTO `subject_list` (`user_id`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `11`, `12`, `13`) VALUES ('$id', '$fst', '$snd', '$trd', '$fth', '$fith', '$sith', '$seth', '$eth', '$nth', '$tth', '$elth', '$twrh', '$thirh')";
            $result = mysqli_query($con, $sql);
            
           $fetch = "SELECT * FROM `subject_list` WHERE user_id=$id";
            $rs = mysqli_query($con, $fetch);
            $array = mysqli_fetch_assoc($rs);
            $num = count(array_unique($array));
            
            
            if($num < 13) {
                $SQL = "DELETE FROM `subject_list` WHERE user_id=$id";
                $var = mysqli_query($con, $SQL);
                if($var){
                   echo '<script type="text/javascript">alert("Enter Unique Department")</script>'; 
                } 
            } else {
                    if(!$result){
                        echo "Sorry";
                    }else {
                        //header('location: profile01.php');
                       echo '<script type="text/javascript">alert("Subject List Inserted")</script>';
                    }
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
        <title>Subject Choice List</title>

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
                            <label class="col-md-4 control-label" for="Decision Timeframe">1st Subject:</label>
                            <div class="col-md-5">
                                <select id="Decision Timeframe" name="1st_sub" class="form-control">
      <option value="">Select Subject</option>    
      <option value="CSE">CSE</option>
      <option value="EEE">EEE</option>
      <option value="ECE">ECE</option>
      <option value="ETE">ETE</option>
      <option value="ME">ME</option>
      <option value="MTE">MTE</option>
      <option value="GCE">GCE</option>
      <option value="MSE">MSE</option>
      <option value="CE">CE</option>
      <option value="BCME">BCME</option>
      <option value="CFPE">CFPE</option>
      <option value="ARCHI">ARCHI</option>
      <option value="URP">URP</option>

    </select>
                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Decision Timeframe">2nd Subject:</label>
                            <div class="col-md-5">
                                <select id="Decision Timeframe" name="2nd_sub" class="form-control">
      <option value="">Select Subject</option>    
      <option value="CSE">CSE</option>
      <option value="EEE">EEE</option>
      <option value="ECE">ECE</option>
      <option value="ETE">ETE</option>
      <option value="ME">ME</option>
      <option value="MTE">MTE</option>
      <option value="GCE">GCE</option>
      <option value="MSE">MSE</option>
      <option value="CE">CE</option>
      <option value="BCME">BCME</option>
      <option value="CFPE">CFPE</option>
      <option value="ARCHI">ARCHI</option>
      <option value="URP">URP</option>

    </select>
                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Decision Timeframe">3rd Subject:</label>
                            <div class="col-md-5">
                                <select id="Decision Timeframe" name="3rd_sub" class="form-control">
      <option value="">Select Subject</option>  
      <option value="CSE">CSE</option>
      <option value="EEE">EEE</option>
      <option value="ECE">ECE</option>
      <option value="ETE">ETE</option>
      <option value="ME">ME</option>
      <option value="MTE">MTE</option>
      <option value="GCE">GCE</option>
      <option value="MSE">MSE</option>
      <option value="CE">CE</option>
      <option value="BCME">BCME</option>
      <option value="CFPE">CFPE</option>
      <option value="ARCHI">ARCHI</option>
      <option value="URP">URP</option>

    </select>
                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Decision Timeframe">4th Subject:</label>
                            <div class="col-md-5">
                                <select id="Decision Timeframe" name="4th_sub" class="form-control">
      <option value="">Select Subject</option>  
      <option value="CSE">CSE</option>
      <option value="EEE">EEE</option>
      <option value="ECE">ECE</option>
      <option value="ETE">ETE</option>
      <option value="ME">ME</option>
      <option value="MTE">MTE</option>
      <option value="GCE">GCE</option>
      <option value="MSE">MSE</option>
      <option value="CE">CE</option>
      <option value="BCME">BCME</option>
      <option value="CFPE">CFPE</option>
      <option value="ARCHI">ARCHI</option>
      <option value="URP">URP</option>

    </select>
                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Decision Timeframe">5th Subject:</label>
                            <div class="col-md-5">
                                <select id="Decision Timeframe" name="5th_sub" class="form-control">
      <option value="">Select Subject</option>  
      <option value="CSE">CSE</option>
      <option value="EEE">EEE</option>
      <option value="ECE">ECE</option>
      <option value="ETE">ETE</option>
      <option value="ME">ME</option>
      <option value="MTE">MTE</option>
      <option value="GCE">GCE</option>
      <option value="MSE">MSE</option>
      <option value="CE">CE</option>
      <option value="BCME">BCME</option>
      <option value="CFPE">CFPE</option>
      <option value="ARCHI">ARCHI</option>
      <option value="URP">URP</option>

    </select>
                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Decision Timeframe">6th Subject:</label>
                            <div class="col-md-5">
                                <select id="Decision Timeframe" name="6th_sub" class="form-control">
      <option value="">Select Subject</option>  
      <option value="CSE">CSE</option>
      <option value="EEE">EEE</option>
      <option value="ECE">ECE</option>
      <option value="ETE">ETE</option>
      <option value="ME">ME</option>
      <option value="MTE">MTE</option>
      <option value="GCE">GCE</option>
      <option value="MSE">MSE</option>
      <option value="CE">CE</option>
      <option value="BCME">BCME</option>
      <option value="CFPE">CFPE</option>
      <option value="ARCHI">ARCHI</option>
      <option value="URP">URP</option>

    </select>
                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Decision Timeframe">7th Subject:</label>
                            <div class="col-md-5">
                                <select id="Decision Timeframe" name="7th_sub" class="form-control">
      <option value="">Select Subject</option>  
      <option value="CSE">CSE</option>
      <option value="EEE">EEE</option>
      <option value="ECE">ECE</option>
      <option value="ETE">ETE</option>
      <option value="ME">ME</option>
      <option value="MTE">MTE</option>
      <option value="GCE">GCE</option>
      <option value="MSE">MSE</option>
      <option value="CE">CE</option>
      <option value="BCME">BCME</option>
      <option value="CFPE">CFPE</option>
      <option value="ARCHI">ARCHI</option>
      <option value="URP">URP</option>

    </select>
                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Decision Timeframe">8th Subject:</label>
                            <div class="col-md-5">
                                <select id="Decision Timeframe" name="8th_sub" class="form-control">
      <option value="">Select Subject</option>  
      <option value="CSE">CSE</option>
      <option value="EEE">EEE</option>
      <option value="ECE">ECE</option>
      <option value="ETE">ETE</option>
      <option value="ME">ME</option>
      <option value="MTE">MTE</option>
      <option value="GCE">GCE</option>
      <option value="MSE">MSE</option>
      <option value="CE">CE</option>
      <option value="BCME">BCME</option>
      <option value="CFPE">CFPE</option>
      <option value="ARCHI">ARCHI</option>
      <option value="URP">URP</option>

    </select>
                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Decision Timeframe">9th Subject:</label>
                            <div class="col-md-5">
                                <select id="Decision Timeframe" name="9th_sub" class="form-control">
      <option value="">Select Subject</option>  
      <option value="CSE">CSE</option>
      <option value="EEE">EEE</option>
      <option value="ECE">ECE</option>
      <option value="ETE">ETE</option>
      <option value="ME">ME</option>
      <option value="MTE">MTE</option>
      <option value="GCE">GCE</option>
      <option value="MSE">MSE</option>
      <option value="CE">CE</option>
      <option value="BCME">BCME</option>
      <option value="CFPE">CFPE</option>
      <option value="ARCHI">ARCHI</option>
      <option value="URP">URP</option>

    </select>
                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Decision Timeframe">10th Subject:</label>
                            <div class="col-md-5">
                                <select id="Decision Timeframe" name="10th_sub" class="form-control">
      <option value="">Select Subject</option>  
      <option value="CSE">CSE</option>
      <option value="EEE">EEE</option>
      <option value="ECE">ECE</option>
      <option value="ETE">ETE</option>
      <option value="ME">ME</option>
      <option value="MTE">MTE</option>
      <option value="GCE">GCE</option>
      <option value="MSE">MSE</option>
      <option value="CE">CE</option>
      <option value="BCME">BCME</option>
      <option value="CFPE">CFPE</option>
      <option value="ARCHI">ARCHI</option>
      <option value="URP">URP</option>

    </select>
                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Decision Timeframe">11th Subject:</label>
                            <div class="col-md-5">
                                <select id="Decision Timeframe" name="11th_sub" class="form-control">
      <option value="">Select Subject</option>  
      <option value="CSE">CSE</option>
      <option value="EEE">EEE</option>
      <option value="ECE">ECE</option>
      <option value="ETE">ETE</option>
      <option value="ME">ME</option>
      <option value="MTE">MTE</option>
      <option value="GCE">GCE</option>
      <option value="MSE">MSE</option>
      <option value="CE">CE</option>
      <option value="BCME">BCME</option>
      <option value="CFPE">CFPE</option>
      <option value="ARCHI">ARCHI</option>
      <option value="URP">URP</option>

    </select>
                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Decision Timeframe">12th Subject:</label>
                            <div class="col-md-5">
                                <select id="Decision Timeframe" name="12th_sub" class="form-control">
      <option value="">Select Subject</option>  
      <option value="CSE">CSE</option>
      <option value="EEE">EEE</option>
      <option value="ECE">ECE</option>
      <option value="ETE">ETE</option>
      <option value="ME">ME</option>
      <option value="MTE">MTE</option>
      <option value="GCE">GCE</option>
      <option value="MSE">MSE</option>
      <option value="CE">CE</option>
      <option value="BCME">BCME</option>
      <option value="CFPE">CFPE</option>
      <option value="ARCHI">ARCHI</option>
      <option value="URP">URP</option>

    </select>
                            </div>
                        </div>
                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Decision Timeframe">13th Subject:</label>
                            <div class="col-md-5">
                                <select id="Decision Timeframe" name="13th_sub" class="form-control">
      <option value="">Select Subject</option>  
      <option value="CSE">CSE</option>
      <option value="EEE">EEE</option>
      <option value="ECE">ECE</option>
      <option value="ETE">ETE</option>
      <option value="ME">ME</option>
      <option value="MTE">MTE</option>
      <option value="GCE">GCE</option>
      <option value="MSE">MSE</option>
      <option value="CE">CE</option>
      <option value="BCME">BCME</option>
      <option value="CFPE">CFPE</option>
      <option value="ARCHI">ARCHI</option>
      <option value="URP">URP</option>

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
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
    </body>

    </html>
