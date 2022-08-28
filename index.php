<?php
    session_start();
    
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: home.php");
        exit;
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/index.css">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Draft</title>

    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <img class="feature-img" src="img/landing2.jpeg">
    <header>
        <nav class="fixed-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="logo text-lg-start text-center">
                            <span><a href=""><img src="img/logo.png" alt=""> Draft</a></span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li><a href="">Contact</a></li>
                                <li><a href="login.php">Log in</a></li>
                            </ul>
                    
                    </div>
                </div>
            </div>
            
        </nav>
    <!--
        
    <nav>
        
            <div class="logo text-lg-start text-center">
               <span><a href="">Draft</a></span>
            </div>
     
            <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">Contact</a></li>
                    <li><a href="">Log in</a></li>
            </ul>
        
    </nav>



     <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="logo text-lg-start text-center">
                        <span><a href="">Draft</a></span>
                    </div>
                </div>
                <div class="col-lg-5">
                    
                        <ul>
                            <li><a href="">Home</a></li>
                            <li><a href="">Contact</a></li>
                            <li><a href="">Log in</a></li>
                        </ul>
                   
                </div>
            </div>
        </div>
        
    </nav>
    -->
    </header>
    
    <div class="container  h-100">
        <div class="msg-container">
            <div id="slider">
                <div class="msg-col logo text-lg-start text-center">
                    <div class="slider">
                        <div>
                            <h1>Do you have a great idea?</h1>
                            <p>Draft is a new ........Now let's explore all it's amazing features.</p>
                            <a href="regisration.html">
                                <button type="button"class="btn1 gradient-custom-2 mb-2 mt-0">Join Now 

                                </button>
                            </a>
                        </div>
                    
                    </div>
                </div>
                <div class="msg-col text-lg-start text-center">
                    <h1>Let's create it together</h1>
                    <p>Draft is a new ........Now let's explore all it's amazing features.</p>
                  
                    <a href="regisration.html">
                        <button type="button"class="btn1 gradient-custom-2 mb-2 mt-0">Join Now 

                        </button>
                    </a>
                    <!--<div class="msg-col">
                        <p class="text-muted  mb-2 fw-bold text-body">Already Member? <a href="login.html"
                            class="fw-bold text-body"><u>Sign in here</u></a></p>
                    </div>-->
                
                    
                </div>
                
               
            </div>
        </div>
        <!--<img src="image/landing2.jpeg" class="feature-img">-->

       
       
        <div class="controller">
            <div id="line1"></div>
            <div id="line2"></div>
          
            <div id="active"></div>
        </div>
       
    </div>

    <section class="post-slider">
        <div class="container">
            <div class="trending-title text-center">
                <h1>Trending</h1>
            </div>
            <div class="slider">
                <div id="carouselExampleSlidesOnly" class="carousel carousel-dark slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="slider-item">
                                <div class="d-flex flex-lg-row flex-column">
                                    <div class="slider-item-img text-lg-start text-center mb-lg-0 mb-3">
                                        <img src="img/sample_post_pic_sq.jpg" alt="">
                                    </div>
                                    <div class="slider-item-content">
                                        <div class="d-flex flex-column">
                                            <span><b>Catelog Name</b> - 26 September, 2022</span>
                                            <h1>Your most unhappy customers are your greatest source of learning.</h1>
                                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                                            <div class="d-flex flex-row justify-content-lg-start justify-content-center">
                                                <div class="slider-author-img">
                                                    <img src="img/sample-avatar.jpg" class="rounded-circle" alt="">
                                                </div>
                                                <div class="slider-author-name">
                                                    <span>Ayon Raihan</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="slider-item">
                                <div class="d-flex flex-lg-row flex-column">
                                    <div class="slider-item-img text-lg-start text-center mb-lg-0 mb-3">
                                        <img src="img/sample_post_pic_sq.jpg" alt="">
                                    </div>
                                    <div class="slider-item-content">
                                        <div class="d-flex flex-column">
                                            <span><b>Catelog Name</b> - 26 September, 2022</span>
                                            <h1>Your most unhappy customers are your greatest source of learning.</h1>
                                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                                            <div class="d-flex flex-row justify-content-lg-start justify-content-center">
                                                <div class="slider-author-img">
                                                    <img src="img/sample-avatar.jpg" class="rounded-circle" alt="">
                                                    </div>
                                                <div class="slider-author-name">
                                                   <span>Ayon Raihan</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="slider-item">
                                <div class="d-flex flex-lg-row flex-column">
                                    <div class="slider-item-img text-lg-start text-center mb-lg-0 mb-3">
                                        <img src="img/sample_post_pic_sq.jpg" alt="">
                                    </div>
                                    <div class="slider-item-content">
                                        <div class="d-flex flex-column">
                                            <span><b>Catelog Name</b> - 26 September, 2022</span>
                                            <h1>Your most unhappy customers are your greatest source of learning.</h1>
                                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                                            <div class="d-flex flex-row justify-content-lg-start justify-content-center">
                                                <div class="slider-author-img">
                                                    <img src="img/sample-avatar.jpg" class="rounded-circle" alt="">
                                                </div>
                                                <div class="slider-author-name">
                                                    <span>Ayon Raihan</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-indicators c-slider-btn-div">
                        <button type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide-to="0" class="active"></button>
                        <button type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide-to="1"></button>
                        <button type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide-to="2"></button>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script>
        var slider= document.getElementById('slider');
        var active= document.getElementById('active');
        var line1= document.getElementById('line1');
        var line2= document.getElementById('line2');
        
       
        function selectUpper () {
            slider.style.transform='translateX(0)';
            active.style.top='0px';
        }

        function selectLower () {
            slider.style.transform='translateX(-50%)';
            active.style.top='50px';
        }

        setInterval (selectLower, 5000);

        setInterval (selectUpper, 10000);

        line1.onclick=function(){
            selectUpper ();
        }
        line2.onclick=function(){
            selectLower ();
        }
    </script>

    <footer>
        <div class="container">
            <span>Copyright ©2022 All rights reserved</span>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
      

</body>
</html>