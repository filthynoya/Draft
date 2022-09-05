<?php
    session_start();

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }

    include './server/db.php';

    $sql = "select * from post inner join users on post.userid=users.userid inner join users_pic on users_pic.userid=post.userid inner join catalog on catalog.catalogid=post.catalogid order by post.visitcnt desc limit 3";

    $trending = $conn->query ($sql);

    $tpost1 = $trending->fetch_assoc();
    $tpost2 = $trending->fetch_assoc();
    $tpost3 = $trending->fetch_assoc();

    $sql = "select * from post inner join users on post.userid=users.userid inner join users_pic on users_pic.userid=post.userid inner join catalog on catalog.catalogid=post.catalogid limit 6";

    $posts = $conn->query ($sql);

    $post_row = array();

    while ($row = $posts->fetch_assoc()) {
        array_push ($post_row, $row);
    }

    $post_cnt = count ($post_row);
    $itr = 0;
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link href="css/style.css" res="stylesheet">
        <link href="css/home.css" rel="stylesheet">

        <script src="https://kit.fontawesome.com/16d805dc1a.js" crossorigin="anonymous"></script>

        <title>Draft | Home</title>
    </head>
    <body>
        <header class="fixed-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="logo text-lg-start text-center">
                        <span><a href=""><img src="img/logo.png" alt=""><a href="">Draft</a></span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <nav>
                            <ul>
                                <li><a href="home.php">Home</a></li>
                                <li><a href="catalog.php">Catalog</a></li>
                                <li><a href="addpost.php">Add Post</a></li>
                                <li><a href="profile.php">View Profile</a></li>
                                <li><a href="server/logout.php">Log Out</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>

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
                                            <img src="<?php echo $tpost1['postimg'] ?>" alt="">
                                        </div>
                                        <div class="slider-item-content">
                                            <div class="d-flex flex-column">
                                                <span><b><?php echo $tpost1['catalogname'] ?></b> - <?php echo $tpost1['uploaddate'] ?></span>
                                                <h1><a class="post-title" href="post.php?postid=<?php echo $tpost1['postid'] ?>"><?php echo $tpost1['posttitle'] ?></a></h1>
                                                <p>
                                                    <?php
                                                        for ($i = 0, $k = strlen($tpost1['postbody']); $i < $k && $i < 200; $i++) {
                                                            echo $tpost1['postbody'][$i];
                                                        } 
                                                    ?>...
                                                </p>
                                                <div class="d-flex flex-row justify-content-lg-start justify-content-center">
                                                    <div class="slider-author-img">
                                                        <img src="<?php echo $tpost1['location'] ?>" class="rounded-circle" alt="">
                                                    </div>
                                                    <div class="slider-author-name">
                                                        <span><a href="profile.php?userid=<?php echo $tpost1['userid'] ?>" ><?php echo $tpost1['fullname'] ?></a></span>
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
                                            <img src="<?php echo $tpost2['postimg'] ?>" alt="">
                                        </div>
                                        <div class="slider-item-content">
                                            <div class="d-flex flex-column">
                                                <span><b><?php echo $tpost2['catalogname'] ?></b> - <?php echo $tpost2['uploaddate'] ?></span>
                                                <h1><a class="post-title" href="post.php?postid=<?php echo $tpost2['postid'] ?>"><?php echo $tpost2['posttitle'] ?></a></h1>
                                                <p>
                                                <?php
                                                    for ($i = 0, $k = strlen($tpost2['postbody']); $i < $k && $i < 200; $i++) {
                                                        echo $tpost2['postbody'][$i];
                                                    } 
                                                ?>...
                                                </p>
                                                <div class="d-flex flex-row justify-content-lg-start justify-content-center">
                                                    <div class="slider-author-img">
                                                        <img src="<?php echo $tpost2['location'] ?>" class="rounded-circle" alt="">
                                                    </div>
                                                    <div class="slider-author-name">
                                                        <span><a href="profile.php?userid=<?php echo $tpost2['userid'] ?>" ><?php echo $tpost2['fullname'] ?></a></span>
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
                                            <img src="<?php echo $tpost3['postimg'] ?>" alt="">
                                        </div>
                                        <div class="slider-item-content">
                                            <div class="d-flex flex-column">
                                                <span><b><?php echo $tpost3['catalogname'] ?></b> - <?php echo $tpost3['uploaddate'] ?></span>
                                                <h1><a class="post-title" href="post.php?postid=<?php echo $tpost3['postid'] ?>"><?php echo $tpost3['posttitle'] ?></a></h1>
                                                <p>
                                                <?php
                                                    for ($i = 0, $k = strlen($tpost3['postbody']); $i < $k && $i < 200; $i++) {
                                                        echo $tpost3['postbody'][$i];
                                                    } 
                                                ?>...
                                                </p>
                                                <div class="d-flex flex-row justify-content-lg-start justify-content-center">
                                                    <div class="slider-author-img">
                                                        <img src="<?php echo $tpost3['location'] ?>" class="rounded-circle" alt="">
                                                    </div>
                                                    <div class="slider-author-name">
                                                        <span><a href="profile.php?userid=<?php echo $tpost3['userid'] ?>" ><?php echo $tpost3['fullname'] ?></a></span>
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

        <section class="posts">
            <div class="container">
                <div class="row">
                    <?php
                        while ($itr < $post_cnt && $itr < 3) {
                            echo '<div class="col-lg-4">
                                    <div class="post-item">
                                        <div class="d-flex flex-column">
                                            <div class="post-item-img">
                                                <img src="'.$post_row[$itr]['postimg'].'"  alt="">
                                            </div>
                                            <div class="post-item-content">
                                                <div class="d-flex flex-column">
                                                    <span><b>'.$post_row[$itr]['catalogname'].'</b> - '.$post_row[$itr]['uploaddate'].'</span>
                                                    <h6><a class="post-title" href="post.php?postid='.$post_row[$itr]['postid'].'" >'.$post_row[$itr]['posttitle'].'</a></h6>
                                                    <p>'
                                                    . substr ($post_row[$itr]['postbody'], 0, 200) .
                                                    '...</p>
                                                    <div class="d-flex flex-row justify-content-lg-start justify-content-center">
                                                        <div class="post-author-img">
                                                            <img src="'.$post_row[$itr]['location'].'"  class="rounded-circle" alt="">
                                                        </div>
                                                        <div class="post-author-name">
                                                            <span><a href="profile.php?userid='.$post_row[$itr]['userid'].'">'.$post_row[$itr]['fullname'].'</a></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                            
                            $itr++;
                        }
                    ?>
                </div>
                <div class="row">
                <?php
                        while ($itr < $post_cnt && $itr < 6) {
                            echo '<div class="col-lg-4">
                                    <div class="post-item">
                                        <div class="d-flex flex-column">
                                            <div class="post-item-img">
                                                <img src="'.$post_row[$itr]['postimg'].'"  alt="">
                                            </div>
                                            <div class="post-item-content">
                                                <div class="d-flex flex-column">
                                                    <span><b>'.$post_row[$itr]['catalogname'].'</b> - '.$post_row[$itr]['uploaddate'].'</span>
                                                    <h6><a class="post-title" href="post.php?postid='.$post_row[$itr]['postid'].'" >'.$post_row[$itr]['posttitle'].'</a></h6>
                                                    <p>'
                                                    . substr ($post_row[$itr]['postbody'], 0, 200) .
                                                    '...</p>
                                                    <div class="d-flex flex-row justify-content-lg-start justify-content-center">
                                                        <div class="post-author-img">
                                                            <img src="'.$post_row[$itr]['location'].'"  class="rounded-circle" alt="">
                                                        </div>
                                                        <div class="post-author-name">
                                                            <span><a href="profile.php?userid='.$post_row[$itr]['userid'].'">'.$post_row[$itr]['fullname'].'</a></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                            
                            $itr++;
                        }
                    ?>
                </div>
            </div>
        </section>

        <section>
        <footer>
            <div class="row">
                <div class="col">
                    <img src="./img/logo.png" class="logof" alt="">
                    <p>Draft is a (Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.)</p>
                </div>
                <div class="col">
                    <h3>Office <div class="underline"><span></span></div></h3>
                    <p>itpl Road</p>
                    <p>Dhaka</p>
                    <p class="email-id">siddiqua@gmail.com</p>
                    <h5>+880-1294995959</h5>
                </div>
                <div class="col">
                <h3>links <div class="underline"><span></span></div></h3>
                <ul>
                    <li><a href="">home</a></li>
                    <li><a href="">post</a></li>
                    <li><a href="">contacts</a></li>
                </ul>
            </div>
                <div class="col">
                    <h3>contact us <div class="underline"><span></span></div></h3>
                    
                     <div class="button1 d-md-flex justify-content-md-start">
                        <button class="btn1 gradient-custom-2" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Contact</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                              <div class="modal-content box">
                                <div class="modal-header">
                                    <h2 class="h1-responsive font-weight-bold text-center my-1">Contact us</h2>
                                  <button type="button" class="btn-close cancel" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                   <!--<form>
                                    <div class="mb-3">
                                      <label for="recipient-name" class="col-form-label">Recipient:</label>
                                      <input type="text" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="mb-3">
                                      <label for="message-text" class="col-form-label">Message:</label>
                                      <textarea class="form-control" id="message-text"></textarea>
                                    </div>


                                  </form>-->

                                  <!--Section: Contact v.2-->
                                    <section class="mb-3">

                                       
                                        <!--Section description-->
                                        <p class="text-center w-responsive mx-auto mb-5 d-md-block d-none">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
                                            a matter of hours to help you.</p>

                                        <div class="row contact">

                                            <!--Grid column-->
                                            <div class="col-md-9 mb-md-0 mb-5">
                                                <form id="contact-form" name="contact-form" action="mail.php" method="POST">

                                                    <!--Grid row-->
                                                    <div class="row">

                                                        <!--Grid column-->
                                                        <div class="col-md-6 input-container">
                                                            <div class="md-form mb-0">
                                                                <input type="text" id="name" name="name" required>
                                                                <label for="name" class="">Your name</label>
                                                            </div>
                                                        </div>
                                                        <!--Grid column-->

                                                        <!--Grid column-->
                                                        <div class="input-container col-md-6">
                                                            <div class="md-form mb-0">
                                                                <input type="text" id="email" name="email" required >
                                                                <label for="email" class="">Your email</label>
                                                            </div>
                                                        </div>
                                                        <!--Grid column-->

                                                    </div>
                                                    <!--Grid row-->

                                                    <!--Grid row-->
                                                    <div class="input-container row">
                                                        <div class="col-md-12">
                                                            <div class="md-form mb-0">
                                                                <input type="text" id="subject" name="subject" required>
                                                                <label for="subject" class="">Subject</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--Grid row-->

                                                    <!--Grid row-->
                                                    <div class="input-container row">

                                                        <!--Grid column-->
                                                        <div class="col-md-12">

                                                            <div class="md-form mb-0">
                                                                <textarea type="text" id="message" name="message" rows="2" class="md-textarea" required></textarea>
                                                                <label for="message">Your message</label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!--Grid row-->
                                                    <div class="text-center text-md-left">
                                                    <!--<a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Send</a>-->
                                                    <a class="btn btn-primary" onclick="validateForm();">Send</a>
                                                    <!--<input type="submit" class="form-control submit" value="SEND" onclick="validateForm();">-->

                                                </div>

                                                </form>

                                                
                                                <div class="status"></div>
                                            </div>
                                            <!--Grid column-->

                                            <!--Grid column-->
                                            <div class="col-md-3 text-center  d-md-block d-none">
                                                <ul class="list-unstyled mb-0">
                                                    <li><i class="fas fa-map-marker-alt fa-2x"></i>
                                                        <p>San Francisco, CA 94126, USA</p>
                                                    </li>

                                                    <li><i class="fas fa-phone mt-3 fa-2x"></i>
                                                        <p>+ 01 234 567 89</p>
                                                    </li>

                                                    <li><i class="fas fa-envelope mt-3 fa-2x"></i>
                                                        <p>contact@mdbootstrap.com</p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!--Grid column-->

                                        </div>

                                    </section>
                                    <!--Section: Contact v.2-->

                                  


                                </div>
                                <div class="modal-footer">
                                  
                                </div>
                              </div>
                            </div>
                          </div>
                          
                    </div>
                    
                    <div class="social-icons">
                        <i class="fab fa-facebook-f"></i>
                        <i class="fab fa-twitter"></i>
                        <i class="fab fa-instagram"></i>
                        <i class="fab fa-pinterest"></i>
                    </div>
                </div>
            </div>
            <hr>
            <div class="copyright">
                <span>Copyright ©2022 All rights reserved</span>
            </div>
        </footer>
    </section>
    <script>
       function validateForm() {
    
            document.getElementById('status').innerHTML = "Sending...";
            formData = {
            'name': $('input[name=name]').val(),
            'email': $('input[name=email]').val(),
            'subject': $('input[name=subject]').val(),
            'message': $('textarea[name=message]').val()
            };


            $.ajax({
            url: 'mail.php',
            method:'POST',
            dataType:'json'
            data: formData,
            success: function (data, textStatus, jqXHR) {

                $('#status').text(data.message);
                if (data.code) //If mail was sent successfully, reset the form.
                $('#contact-form').closest('form').find("input[type=text], textarea").val("");
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $('#status').text(jqXHR);
            }
        });
    }

    </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>