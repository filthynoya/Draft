<?php
     session_start();
    
     if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
          header("location: home.php");
          exit;
     }

     include './server/db.php';

     if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $name = trim_data ($_POST['name']);
          $email = trim_data ($_POST['email']);
          $subject = trim_data ($_POST['subject']);
          $body = trim_data ($_POST['message']);

          $error = 0;
          $errormsg = "";
          $succ = 0;

          if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
               $errormsg = "Only White Space and Alphabets Allowed.";
               $error++;
          }

          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
               $errormsg = "Incorrect Email";
               $error++;
          }

          if ($error == 0) {
               $sql = "insert into contact (contactname, contactemail, contactsub, contactmsg) values ('$name','$email','$subject','$body')";

               $conn->query ($sql);

               $succ = 1;
          }


     }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
<title>Scenic HTML Template</title>



<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


<link rel="stylesheet" href="css/index/bootstrap.min.css">
<link rel="stylesheet" href="css/index/font-awesome.min.css">
<link rel="stylesheet" href="css/index/magnific-popup.css">

<link rel="stylesheet" href="css/index/owl.theme.css">
<link rel="stylesheet" href="css/index/owl.carousel.css">
<script src="https://kit.fontawesome.com/16d805dc1a.js" crossorigin="anonymous"></script>

<!-- MAIN CSS -->
<link rel="stylesheet" href="css/index/tooplate-style.css">

</head>
<body>

<!-- PRE LOADER -->
<div class="preloader">
     <div class="spinner">
          <span class="sk-inner-circle"></span>
     </div>
</div>


<!-- MENU -->
<div class="navbar custom-navbar navbar-fixed-top" role="navigation">
     <div class="container">

          <!-- NAVBAR HEADER -->
          <div class="navbar-header">
               <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
               </button>
               <!-- lOGO -->
               <a href="index.html" class="navbar-brand">Draft</a>
          </div>

          <!-- MENU LINKS -->
          <div class="collapse navbar-collapse">
               <ul class="nav navbar-nav navbar-right">
                    <li><a href="#home" class="smoothScroll">Home</a></li>
                    <li><a href="#about" class="smoothScroll">Studio</a></li>
                    <li><a href="#team" class="smoothScroll">Our People</a></li>  
                    <li><a href="#contact" class="smoothScroll">Let's talk</a></li>
                    <li><a href="login.php" class="smoothScroll">Login</a></li>
               </ul>
          </div>

     </div>
</div>


<!-- HOME -->
<section id="home" class="parallax-section">
     <div class="overlay"></div>
     <div class="container">
          <div class="row">

               <div class="col-md-8 col-sm-12">
                    <div class="home-text">
                         <h1>Your Website has a video background!</h1>
                         <p>Feel free to download and use HTML templates from Tooplate</p>
                         <ul class="section-btn">
                              <a href="#about" class="smoothScroll"><span data-hover="Discover More">Discover More</span></a>
                         </ul>
                    </div>
               </div>

          </div>
     </div>

     <!-- Video -->
     <video controls autoplay loop muted>
          <source src="videos/video.mp4" type="video/mp4">
          Your browser does not support the video tag.
     </video>
</section>


<!-- ABOUT -->
<section id="about" class="parallax-section">
     <div class="container">
          <div class="row">

               <div class="col-md-offset-1 col-md-10 col-sm-12">
                    <div class="about-info">
                         <h3>Introducing Draft</h3>
                         <h1>This template is designed for you. Sed ornare, tortor nec placerat lacinia, leo quam rutrum leo, eget posuere ipsum sem eu justo. Integer nunc libero.</h1>
                    </div>
               </div>

          </div>
     </div>
</section>


<!-- PROJECT -->
<section id="project" class="parallax-section">
     <div class="container">
          <div class="row">

               <div class="col-md-6 col-sm-6">
                    <!-- PROJECT ITEM -->
                    <div class="project-item">
                         <a href="img/project-image1.jpg" class="image-popup">
                              <img src="img/project-image1.jpg" class="img-responsive" alt="">
                         
                              <div class="project-overlay">
                                   <div class="project-info">
                                        <h1>Beautiful Women</h1>
                                        <h3>Click to pop up!</h3>
                                   </div>
                              </div>
                         </a>
                    </div>
               </div>

               <div class="col-md-6 col-sm-6">
                    <!-- PROJECT ITEM -->
                    <div class="project-item">
                         <a href="img/project-image2.jpg" class="image-popup">
                              <img src="img/project-image2.jpg" class="img-responsive" alt="">
                         
                              <div class="project-overlay">
                                   <div class="project-info">
                                        <h1>Nulla efficitur quam</h1>
                                        <h3>Sed ligula accumsan</h3>
                                   </div>
                              </div>
                         </a>
                    </div>
               </div>

               <div class="col-md-6 col-sm-6">
                    <!-- PROJECT ITEM -->
                    <div class="project-item">
                         <a href="img/project-image3.jpg" class="image-popup">
                              <img src="img/project-image3.jpg" class="img-responsive" alt="">
                         
                              <div class="project-overlay">
                                   <div class="project-info">
                                        <h1>Large Sea Wave</h1>
                                        <h3>Nam feugiat dui in nisi</h3>
                                   </div>
                              </div>
                         </a>
                    </div>
               </div>

               <div class="col-md-6 col-sm-6">
                    <!-- PROJECT ITEM -->
                    <div class="project-item">
                         <a href="img/project-image4.jpg" class="image-popup">
                              <img src="img/project-image4.jpg" class="img-responsive" alt="">
                         
                              <div class="project-overlay">
                                   <div class="project-info">
                                        <h1>Lorem ipsum dolor</h1>
                                        <h3>Mollis aliquam faucibus urna</h3>
                                   </div>
                              </div>
                         </a>
                    </div>
               </div>               

          </div>
     </div>
</section>


<!-- TEAM -->
<section id="team" class="parallax-section">
     <div class="container">
          <div class="row">

               <div class="col-md-offset-2 col-md-8 col-sm-12">
                    
                    <div class="section-title">
                         <h1>Meet Our People</h1>
                    </div>
               </div>

               <div class="clearfix"></div>

               <div id="owl-team" class="owl-carousel">

                    
                    <div class="item col-6  d-flex flex-row justify-content-center">
                         <div class="admin-img">
                              
                              <div class="team-item">
                                   <img src="img/team-image1.jpg" class="img-responsive" alt="">
                                   <div class="team-overlay">
                                        <ul class="social-icon">
                                             <li><a href="#" class="fa fa-instagram"></a></li>
                                             <li><a href="#" class="fa fa-github"></a></li>
                                             <li><a href="#" class="fa fa-facebook"></a></li> 
                                             <li><a href="#" class="fa fa-linkedin"></a></li>
                                        </ul>
                                   </div>
                              </div>
                              <p>Catherine Jann</p>
                              <h3>Head Designer</h3>
                         </div >
                         <div class="admin-bio text-lg-start text-center mb-lg-0">
                              <p>Catherine Jann</p>
                         </div>
                    </div>

                    <div class="item col-6  d-flex flex-column justify-content-cente">
                         <div class="admin-img">
                              
                              <div class="team-item">
                                   <img src="img/team-image1.jpg" class="img-responsive" alt="">
                                   <div class="team-overlay">
                                        <ul class="social-icon">
                                             <li><a href="#" class="fa fa-instagram"></a></li>
                                             <li><a href="#" class="fa fa-github"></a></li>
                                             <li><a href="#" class="fa fa-facebook"></a></li> 
                                             <li><a href="#" class="fa fa-linkedin"></a></li>
                                        </ul>
                                   </div>
                              </div>
                              <p>Catherine Jann</p>
                              <h3>Head Designer</h3>
                         </div>
                         <div class="admin-bio">
                              <p>Catherine Jann</p>
                         </div>
                    </div>

                   
               </div>

          </div>
     </div>
</section>

<!--<section id="team" class="parallax-section">
     <div class="container">
          <div class="row">

               <div class="col-md-offset-2 col-md-8 col-sm-12">
                    
                    <div class="section-title">
                         <h1>Meet Our People</h1>
                    </div>
               </div>

               <div class="clearfix"></div>

               <div id="owl-team" class="owl-carousel">

                    
                    <div class="item col-6  d-flex flex-row justify-content-center">
                         <div class="admin-img">
                              
                              <div class="team-item">
                                   <img src="images/team-image1.jpg" class="img-responsive" alt="">
                                   <div class="team-overlay">
                                        <ul class="social-icon">
                                             <li><a href="#" class="fa fa-instagram"></a></li>
                                             <li><a href="#" class="fa fa-github"></a></li>
                                             <li><a href="#" class="fa fa-facebook"></a></li> 
                                             <li><a href="#" class="fa fa-linkedin"></a></li>
                                        </ul>
                                   </div>
                              </div>
                              <p>Catherine Jann</p>
                              <h3>Head Designer</h3>
                         </div >
                         <div class="admin-bio text-lg-start text-center mb-lg-0">
                              <p>Catherine Jann</p>
                         </div>
                    </div>

                    <div class="item col-6  d-flex flex-column justify-content-cente">
                         <div class="admin-img">
                              
                              <div class="team-item">
                                   <img src="images/team-image1.jpg" class="img-responsive" alt="">
                                   <div class="team-overlay">
                                        <ul class="social-icon">
                                             <li><a href="#" class="fa fa-instagram"></a></li>
                                             <li><a href="#" class="fa fa-github"></a></li>
                                             <li><a href="#" class="fa fa-facebook"></a></li> 
                                             <li><a href="#" class="fa fa-linkedin"></a></li>
                                        </ul>
                                   </div>
                              </div>
                              <p>Catherine Jann</p>
                              <h3>Head Designer</h3>
                         </div>
                         <div class="admin-bio">
                              <p>Catherine Jann</p>
                         </div>
                    </div>

                   
               </div>

          </div>
     </div>
</section>-->


<!-- CONTACT -->
<section id="contact" class="parallax-section">
     <div class="container">
          <div class="row">

               <div class="col-md-offset-3 col-md-6 col-sm-12">
                    <div class="section-title">
                         <h1>Talk to us!</h1>
                    </div>
               </div>

               <div class="clearfix"></div>

               <div class="col-md-offset-2 col-md-8 col-sm-12">
                    <!-- CONTACT FORM HERE -->
                    <form id="contact-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" role="form">

                         <div class="col-md-6 col-sm-6">
                              <input type="text" class="form-control" id="cf-name" name="name" placeholder="Name" required>
                         </div>

                         <div class="col-md-6 col-sm-6">
                              <input type="email" class="form-control" id="cf-email" name="email" placeholder="Email Address" required>
                         </div>

                         <div class="col-md-12 col-sm-12">
                              <input type="text" class="form-control" id="cf-subject" name="subject" placeholder="Subject" required>
                              <textarea class="form-control" rows="5" id="cf-message" name="message" placeholder="Message" ></textarea>
                         </div>

                         <div class="col-md-offset-4 col-md-4 col-sm-offset-4 col-sm-4">
                              <div class="section-btn">
                                   <button type="submit" class="form-control" id="cf-submit" name="submit"><span data-hover="Send Message">Send Message</span></button>
                              </div>
                         </div>
                    </form>
               </div>

          </div>
     </div>
</section>

<!-- FOOTER -->
<footer>
     <div class="container">
          <div class="row">

               

               <div class="col-md-6 col-sm-12">
                    <div class="footer-info">
                    	<h2>Keep in touch</h2>
                         <p><a href="tel:010-090-0780">010-090-0780</a></p>
                         <p><a href="mailto:info@company.com">info@company.com</a></p>
                         <p><a href="#">Our Location</a></p>
                    </div>
               </div>

               <div class="col-md-6 col-sm-12">
               		
                    <h2>About Us</h2>
                    <p>Sed vestibulum posuere ante, eget blandit metus. Morbi sodales feugiat erat, et placerat sapien suscipit ut.</p>
                    <ul class="social-icon">
                         <li><a href="#" class="fa fa-twitter"></a></li>
                         <li><a href="#" class="fa fa-facebook"></a></li>
                         <li><a href="#" class="fa fa-instagram"></a></li>
                         <li><a href="#" class="fa fa-linkedin"></a></li>
                    </ul>
                    
               </div>

               <div class="clearfix"></div>

               <div class="col-md-12 col-sm-12">
                    <div class="copyright-text">
                         <p>Copyright © 2018 Company Name 
                         
                         | Design: Tooplate</p>
                    </div>
               </div>
               
          </div>
     </div>
</footer>

<script>
     <?php
          if ($error != 0) {
               echo 'alert ("'.$errormsg.'")';
          }

          if ($succ != 0) {
               echo 'alert ("Success")';
          }
     ?>
</script>

<!-- SCRIPTS -->
<script src="js/indexjquery.js"></script>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.parallax.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/magnific-popup-options.js"></script>
<script src="js/modernizr.custom.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/custom.js"></script>

</body>
</html>