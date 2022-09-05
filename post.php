<?php
    session_start();

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }

    include './server/db.php';

    if (!isset($_GET['postid'])) {
        header ("location: home.php");
        exit;
    }

    $postid = $_GET['postid'];
    $id = $_SESSION["id"];

    if(isset($_POST['page_form'])) {
        if ($_POST["page_form"] == 1) {
            $cbody = $_POST["cmnt_body"];
            
            $sql = "insert into comments (commentbody, userid, postid, commentdate) values ('$cbody', $id, $postid, CURDATE())";

            $conn->query ($sql);
        }
    }

    $sql = "select * from post inner join users on post.userid = users.userid inner join users_pic on post.userid = users_pic.userid where post.postid = $postid";

    $res = $conn->query ($sql);

    $row = $res->fetch_assoc();

    $title = $row['posttitle'];
    $body = $row['postbody'];

    $author_name = $row['fullname'];
    $author_img = $row['location'];
    $img = $row['postimg'];

    $postuserid = $row['userid'];

    $sql = "select * from comments inner join post on comments.postid = post.postid inner join users on comments.userid = users.userid inner join users_pic on users_pic.userid = comments.userid";

    $res = $conn->query ($sql);

    $cmnt_row = array();

    while ($row = $res->fetch_assoc()) {
        array_push ($cmnt_row, $row);
    }

    $cmnt_cnt = count ($cmnt_row);
    $itr = 0;
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link rel="stylesheet" href="css/post.css">

        <script src="https://kit.fontawesome.com/16d805dc1a.js" crossorigin="anonymous"></script>

        <title><?php echo $title; ?></title>
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
                                <li><a href="">Home</a></li>
                                <li><a href="">Catalog</a></li>
                                <li><a href="">Add Post</a></li>
                                <li><a href="">View Profile</a></li>
                                <li><a href="">Log Out</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>

        <section id="title">
            <div class="c-container">
                <div class="d-flex flex-column">
                    <div class="heading text-center">
                        <h1><?php echo $title; ?></h1>
                    </div>
                    <div class="sub-heading">
                        <div class="d-flex flex-row justify-content-center">
                            <div class="slider-author-img">
                                <img src="<?php echo $author_img; ?>" class="rounded-circle" alt="">
                            </div>
                            <div class="slider-author-name">
                                <span><?php echo $author_name; ?></span>
                            </div>
                        </div>
                        <?php
                            if ($postuserid == $id) {
                                echo '
                                    <div class="d-flex flex-row justify-content-center my-5 edit-btn">
                                        <a class="btn1" href="editpost.php?postid='.$postid.'">Edit</a>
                                    </div>
                                ';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </section>

        <section id="post-img">
            <div class="container">
                <img src="<?php echo $img; ?>" class="img-fluid" alt="">
            </div>
        </section>

        <section id="post">
            <div class="c-container">
                <p><?php echo $body; ?></p>
            </div>
        </section>

        <section id="comments">
            <div class="c-container">
                <div class="d-flex flex-column">
                    <div class="add-comment d-flex flex-column">
                        <h4>Add Comment</h4>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?postid=$postid";?>">
                            <input type="hidden" name="page_form" value="1">
                            <textarea name="cmnt_body" class="comment-textarea"></textarea>
                            <button class="btn1" type="submit">Comment</button>
                        </form>
                    </div>
                    <div class="display-comments">
                        <?php 
                            while ($itr < $cmnt_cnt) {
                                echo '
                                <div class="single-comment d-flex flex-column">
                                    <div class="comment-author d-flex flex-row">
                                        <img src="'.$cmnt_row[$itr]['location'].'" alt="" class="author-comment-img rounded-circle">
                                        <span class="author-comment-name">'.$cmnt_row[$itr]['fullname'].'</span>
                                    </div>
                                    <div class="comment-body">
                                        <p>'.$cmnt_row[$itr]['commentbody'].'</p>
                                    </div>
                                ';

                                $itr++;
                            }
                        ?>
                    </div>
                    <div class="report">
                        <button class="btn1">Report</button>
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