<?php
    session_start();

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }
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

        <section class="posts">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="post-item">
                            <div class="d-flex flex-column">
                                <div class="post-item-img">
                                    <img src="img/sample_post_pic.jpg"  alt="">
                                </div>
                                <div class="post-item-content">
                                    <div class="d-flex flex-column">
                                        <span><b>Catelog Name</b> - 26 September, 2022</span>
                                        <h6>Your most unhappy customers are your greatest source of learning.</h6>
                                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                                        <div class="d-flex flex-row justify-content-lg-start justify-content-center">
                                            <div class="post-author-img">
                                                <img src="img/sample-avatar.jpg"  class="rounded-circle" alt="">
                                            </div>
                                            <div class="post-author-name">
                                                <span>Ayon Raihan</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="post-item">
                            <div class="d-flex flex-column">
                                <div class="post-item-img">
                                    <img src="img/sample_post_pic.jpg"  alt="">
                                </div>
                                <div class="post-item-content">
                                    <div class="d-flex flex-column">
                                        <span><b>Catelog Name</b> - 26 September, 2022</span>
                                        <h6>Your most unhappy customers are your greatest source of learning.</h6>
                                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                                        <div class="d-flex flex-row justify-content-lg-start justify-content-center">
                                            <div class="post-author-img">
                                                <img src="img/sample-avatar.jpg"  class="rounded-circle" alt="">
                                            </div>
                                            <div class="post-author-name">
                                                <span>Ayon Raihan</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="post-item">
                            <div class="d-flex flex-column">
                                <div class="post-item-img">
                                    <img src="img/sample_post_pic.jpg"  alt="">
                                </div>
                                <div class="post-item-content">
                                    <div class="d-flex flex-column">
                                        <span><b>Catelog Name</b> - 26 September, 2022</span>
                                        <h6>Your most unhappy customers are your greatest source of learning.</h6>
                                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                                        <div class="d-flex flex-row justify-content-lg-start justify-content-center">
                                            <div class="post-author-img">
                                                <img src="img/sample-avatar.jpg"  class="rounded-circle" alt="">
                                            </div>
                                            <div class="post-author-name">
                                                <span>Ayon Raihan</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="post-item">
                            <div class="d-flex flex-column">
                                <div class="post-item-img">
                                    <img src="img/sample_post_pic.jpg"  alt="">
                                </div>
                                <div class="post-item-content">
                                    <div class="d-flex flex-column">
                                        <span><b>Catelog Name</b> - 26 September, 2022</span>
                                        <h6>Your most unhappy customers are your greatest source of learning.</h6>
                                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                                        <div class="d-flex flex-row justify-content-lg-start justify-content-center">
                                            <div class="post-author-img">
                                                <img src="img/sample-avatar.jpg"  class="rounded-circle" alt="">
                                            </div>
                                            <div class="post-author-name">
                                                <span>Ayon Raihan</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="post-item">
                            <div class="d-flex flex-column">
                                <div class="post-item-img">
                                    <img src="img/sample_post_pic.jpg"  alt="">
                                </div>
                                <div class="post-item-content">
                                    <div class="d-flex flex-column">
                                        <span><b>Catelog Name</b> - 26 September, 2022</span>
                                        <h6>Your most unhappy customers are your greatest source of learning.</h6>
                                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                                        <div class="d-flex flex-row justify-content-lg-start justify-content-center">
                                            <div class="post-author-img">
                                                <img src="img/sample-avatar.jpg"  class="rounded-circle" alt="">
                                            </div>
                                            <div class="post-author-name">
                                                <span>Ayon Raihan</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="post-item">
                            <div class="d-flex flex-column">
                                <div class="post-item-img">
                                    <img src="img/sample_post_pic.jpg"  alt="">
                                </div>
                                <div class="post-item-content">
                                    <div class="d-flex flex-column">
                                        <span><b>Catelog Name</b> - 26 September, 2022</span>
                                        <h6>Your most unhappy customers are your greatest source of learning.</h6>
                                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                                        <div class="d-flex flex-row justify-content-lg-start justify-content-center">
                                            <div class="post-author-img">
                                                <img src="img/sample-avatar.jpg"  class="rounded-circle" alt="">
                                            </div>
                                            <div class="post-author-name">
                                                <span>Ayon Raihan</span>
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

        <footer>
            <div class="container">
                <span>Copyright ©2022 All rights reserved</span>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>