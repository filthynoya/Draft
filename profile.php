<?php
    session_start();

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }

    include 'server/db.php'; 

    $email = $_SESSION["email"];

    $sql = "SELECT * FROM users LEFT JOIN users_pic ON users.userid = users_pic.userid WHERE email = '$email'";

    $result_set = $conn->query($sql);

    if ($result_set->num_rows > 0) {
        while ($row = $result_set->fetch_assoc ()) {
            $name = $row["fullname"];
            $doj = $row["dateofreg"];
            $about = $row["about"];
            $location = $row["location"];
        }
    }
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link rel="stylesheet" href="css/profile.css">

        <script src="https://kit.fontawesome.com/16d805dc1a.js" crossorigin="anonymous"></script>

        <title>Profile</title>
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
                                <li><a href="editprofile.php">Edit Profile</a></li>
                                <li><a href="server/logout.php">Log Out</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>

        <section class="profile">
            <div class="container">
                <div class="d-flex flex-lg-row flex-column">
                    <div class="author-img text-lg-start text-center my-lg-0 my-5">
                        <img src="<?php if ($location === NULL || strcmp ($location, "") === 0) {echo 'img/sample-avatar.jpg';} else { echo $location; } ?>" class="rounded-circle" alt="">
                    </div>
                    <div class="author-info text-lg-start text-center ms-lg-5 ms-0">
                        <div class="d-flex flex-column">
                            <div class="author-name">
                                <span><?php echo $name; ?></span>
                            </div>
                            <div class="author-email">
                                <span><?php echo $email; ?></span>
                            </div>
                            <div class="author-date">
                                <span><?php echo $doj; ?></span>
                            </div>
                            <div class="author-about">
                                <p><i><?php 
                                    if ($about == NULL) {
                                        echo 'Seems like user is a bit shy..';
                                    } else {
                                        echo $about;
                                    }
                                ?></i></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="posts">
            <div class="container">
                <div class="posts-heading">
                    <h1>author's posts</h1>
                </div>
                <div class="row">
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