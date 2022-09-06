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

        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/home.css">
        <link rel="stylesheet" href="css/footer.css">
       

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

        <?php include 'footer.php'; ?>