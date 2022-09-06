<?php
    session_start();

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }

    include 'server/db.php'; 

    $email = $_SESSION["email"];
    $id = $_SESSION['id'];

    $profile_id = $id;

    if (isset ($_GET['userid'])) {
        $profile_id = $_GET['userid'];
    }

    $sql = "SELECT * FROM users LEFT JOIN users_pic ON users.userid = users_pic.userid WHERE users.userid = $profile_id";

    $result_set = $conn->query($sql);

    if ($result_set->num_rows > 0) {
        while ($row = $result_set->fetch_assoc ()) {
            $name = $row["fullname"];
            $doj = $row["dateofreg"];
            $about = $row["about"];
            $location = $row["location"];
            $email = $row["email"];
        }
    }

    $sql = "select * from post inner join users on post.userid=users.userid inner join users_pic on users_pic.userid=post.userid inner join catalog on catalog.catalogid=post.catalogid where post.userid = $profile_id";

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

        <link rel="stylesheet" href="css/profile.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/footer.css">

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
                                <?php
                                    if ($profile_id == $id) {
                                        echo '<li><a href="editprofile.php">Edit Profile</a></li>';
                                    } else {
                                        echo '<li><a href="profile.php">View Profile</a></li>';
                                    }
                                ?>
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
            </div>
        </section>

        <?php include './footer.php'; ?>