<?php
require_once('db.php');

if(isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $message = mysqli_real_escape_string($con, $_POST['message']);
    
    $sql = "INSERT INTO `message` (`id`, `email`, `message`) VALUES (NULL, '$email', '$message')";
    $query = mysqli_query($con, $sql);
    if(!$query){echo "Unsuccessfull";}
}
?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Home</title>
        <!-- Site made with Mobirise Website Builder v4.2.0, https://mobirise.com -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="generator" content="Mobirise v4.2.0, mobirise.com">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon">
        <meta name="description" content="">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700&subset=latin,cyrillic">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya+Sans:400,700&subset=latin,vietnamese,latin-ext">
        <link rel="stylesheet" href="assets/tether/tether.min.css">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/socicon/css/socicon.min.css">
        <link rel="stylesheet" href="assets/puritym/css/style.css">
        <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
        <link href="css/animated.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    </head>

    <body>
        <?php include 'navbar.php' ?>

        <section class="mbr-section mbr-section-full mbr-parallax-background" id="header1-4" data-rv-view="0" style="background-image: url(assets/images/ruetgate-960x540.jpg); margin-top: -6%;">
            <div class="mbr-table-cell">
                <div class="mbr-overlay" style="opacity: 0.2; background-color: rgb(255, 255, 255);"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-xs-center">

                            <h1 class="mbr-section-title display-1">Welcome To RUET</h1>
                            <p class="lead">Rajshahi University of Engineering &amp; Technology (RUET) is one of the most prestigious engineering university in Bangladesh. Wanna get yourself admitted here? Then, this website is only for you...</p>
                            <div class="mbr-buttons--center"> <a class="btn btn-lg btn-success" href="http://www.ruet.ac.bd/">RUET Main Website</a> <a class="btn btn-lg btn-warning" href="index.html#header1-1z">How to apply</a></div>
                        </div>
                    </div>
                </div>
                <a class="mbr-arrow" href="#header1-1z"><i class="fa fa-angle-down"></i></a>
            </div>
        </section>

        <!-- how to apply -->
        <section class="mbr-section mbr-section-full" id="header1-1z" data-rv-view="150" style="background-color: rgb(221, 221, 221);">
            <div class="mbr-table-cell">

                <div class="container">
                    <div class="row">
                        <div class="col-md-8">

                            <h1 class="mbr-section-title display-1">Under Graduate Admission Program</h1>
                            <p class="lead">Admission procedure for the Under Graduate program is annually reviewed and improvements implemented on coming admission test regular basis. Any modification of admission test procedure is announced in the website by notice prior the admission test, though the updated prospectus will be available in the website in due time. Details are available to anyone through inquires.
                                <br>Every year, the university received applications on prescribed application form from the students who passed H. S. C examination. Application received on the basis of admission announcement and full-filling the application requirements. The requirements are set by the admission committee. Among the received applications the admission committee scrutinized and set priority based on highest sum of the grade point of Physics, Chemistry, Mathematics and English of H.S.C. The committee continue the priority process until the number of students equal to the authority has decided to allow for sit in the admission test. Usually about ten times students of the total seat are allowed for admission test. Combine admission test is held and allocation the department is done after the admission on the basis of merit position and choice of the students.
                                <br>The list of valid candidate for admission test is published in the notice board and university website. Candidates collect his/her Roll number from the notice board or website with respect to their reserve Form number. Candidates have to reserve the Roll number and Form number in the admission test and for future reference. &nbsp; &nbsp;</p>
                            <div class="mbr-buttons--left"><a class="btn btn-lg" href="registration01.php">Register Now</a> <a class="btn btn-lg btn-white" href="http://www.ruet.ac.bd/articles/Undergraduate%20Admission/63">More Detail</a></div>
                        </div>
                    </div>
                </div>
                <a class="mbr-arrow" href="#testimonials1-e"><i class="fa fa-angle-down"></i></a>
            </div>
        </section>
        <!-- Message From VC -->
        <section class="mbr-section mbr-section-small" id="testimonials1-e" data-rv-view="27" style="background-color: rgb(211, 218, 231); padding-top: 1.5rem; padding-bottom: 1.5rem;">
            <div>

                <div class="container">
                    <h2 class="mbr-section-title display-3 text-xs-center">Message From VC</h2>

                    <div class="row mbr-testimonial-cards">
                        <div class="col-xs-12">
                            <div>

                                <!-- Trigger the modal with a button -->

                                <p style="width: 30%; margin-left: 40%;"> <img src="img/vc.jpeg" alt="vc" align="left"> Welcome to the RUET. It is my great pleasure to welcome you to Rajshahi University of Engineering &amp; Technology which is the 2nd oldest prestigious engineering university in Bangladesh.

                                    <button type="button" class="btn" data-toggle="modal" data-target="#myModal">Read More</button>
                                </p>



                                <!-- Modal -->
                                <div id="myModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Message From VC</h4>
                                            </div>
                                            <div class="modal-body">


                                                <h3 style="text-align: center;">Message from VC</h3>
                                                <p>
                                                    It is my great pleasure to welcome you to Rajshahi University of Engineering & Technology (RUET), which is the 2nd oldest prestigious higher educational engineering university in Bangladesh. This is the newly developed website, which, I hope, will facilitate online exploration about RUET and propel RUET to completely digitalized institute in future. The institute was founded in 1964 as Rajshahi Engineering College with three faculties and a limited number of students. The name of the institute was turned to Bangladesh Institute of Technology (BIT), Rajshahi in 1986 to enhance the technical education, and finally it was upgraded to the status of a university with the new name Rajshahi University of Engineering & Technology (RUET) in 2003 to improve the technical education and research. The university is dedicated to excellence in technical education and research in line with its vision. The university is progressing steadily to be a comprehensive university providing various assortments of under-graduate and post-graduate program. The institute started its journey with 122 students in 1964 and now the number of students has been extended to about 3000. Students are pursuing their higher study and research in the field of engineering and technology with well-equipped modern and updated laboratory facilities. The university community has close interaction and free exchange of knowledge, ideas withthe renowned scholars of home and abroad. National and international seminars are regularly held and organized by the faculty members, students and the staff of our university. RUET is dedicated to producing quality graduates in line with the national and global needs for the development of the country as well as the world. Our graduates are well-equipped with the necessary skills, competence, knowledge, practical experience and inter-personal skills. They are holding prestigious research and teaching positions at different reputed universities of home and abroad.Hence the aim of RUET is to take good care of the graduates who will be sufficiently able to contribute to the field of engineering and technology.We always look forward to future needs and prepare our students to meet the challenges of globalization, emerging innovation and knowledge-based economy. The graduates of RUET are encouraged to give constant effort to learning to sustain their adaptability and employability. With all these ends in view, RUET has also future plans to extend its academic and research activities through new departments, and research centers. The university has already established collaborative agreement with universities and institutions worldwide to contribute to the development of students, faculty members, and the staff. So I welcome you to visit our website and university to make your queries, share your valuable ideas and experiences with us and see things by yourselves. Best wishes for you all.
                                                </p>

                                                <h4>Prof. Dr. Mohd. Rafiqul Alam Beg</h4>
                                                <h5>Vice-Chancellor</h5>








                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>










                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>

        <section class="mbr-section mbr-section-small" id="msg-box1-1v" data-rv-view="73" style="background-color: rgb(167, 176, 195); padding-top: 1.5rem; padding-bottom: 1.5rem;">


            <div class="container">
                <div class="row">

                    <div>

                        <div class="col-sm-8">
                            <h2 class="mbr-section-title h1">Location On Google Map</h2>

                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- location -->
        <section class="mbr-section mbr-section-nopadding" id="map1-1o" data-rv-view="34">
            <div class="mbr-map"><iframe frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0Dx_boXQiwvdz8sJHoYeZNVTdoWONYkU&amp;q=place_id:ChIJ____P9jv-zkRJLHcSN9zMXA" allowfullscreen=""></iframe></div>
        </section>

        <section class="mbr-section mbr-section-small mbr-footer" id="contacts3-g" data-rv-view="36" style="background-color: rgb(213, 244, 240); padding-top: 4.5rem; padding-bottom: 4.5rem;">

            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-3">
                        <p><strong>Mailing Address:<br>&nbsp;Registrar, Rajshahi University of Engineering &amp; Technology, Kazla,Rajshahi-6204, Bangladesh. </strong>
                            <br><br>
                            <strong>Contacts:<br>Email:<br>admission.all.ruet@gmail.com<br>Office Mobile: +880 1790-187189<br>
Time: 8.00 AM to 5.00 PM</strong>
                    </div>
                    <div class="col-xs-12 col-md-3">
                        <strong>Links</strong>
                        <ul>
                            <li>
                                <a href="http://www.ruet.ac.bd/" class="text-success" target="_blank">Ruet Website</a>
                            </li>

                            <li>
                                <a href="http://www.ruet.ac.bd/articles/Undergraduate%20Admission/63" class="text-success">Details Admission Info</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-md-6">

                        <form action="index.php" method="post">
                            <div class="form-group">
                                <input name="email" type="email" class="form-control input-sm input-inverse" name="email" placeholder="Email*" required>
                            </div>

                            <div class="form-group">
                                <textarea type="text" name="message" class="form-control input-sm input-inverse" rows="4" placeholder="Message"></textarea>
                            </div>
                            <div class="text-xs-right">
                                <input type="submit" name="submit" class="btn btn-success" value="Contact Us"></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <footer class="mbr-section mbr-section-nopadding mbr-footer" id="footer1-j" data-rv-view="47" style="background-color: rgb(38, 39, 44); padding-top: 1rem; padding-bottom: 0rem;">

            <div class="container">
                <p>Copyright (c) 2017 TEAM RUET BRACKET</p>
            </div>
        </footer>


        <script src="assets/web/assets/jquery/jquery.min.js"></script>
        <script src="assets/tether/tether.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/smooth-scroll/SmoothScroll.js"></script>
        <script src="assets/jarallax/jarallax.js"></script>
        <script src="assets/puritym/js/script.js"></script>
        <script src="assets/formoid/formoid.min.js"></script>


    </body>

    </html>
