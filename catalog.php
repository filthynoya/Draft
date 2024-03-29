<?php 
    session_start();

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }

    include './server/db.php';

    $sql = "select catalogname from catalog";

    $res = $conn->query ($sql);

    $searched = 0;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $catalogname = $_POST['catalogname'];
        $searchtag = $_POST['searchtag'];

        if (strcmp ($catalogname, "Catalog") == 0) {
            $sql = "select * from post inner join users on post.userid=users.userid inner join users_pic on users_pic.userid=post.userid inner join catalog on catalog.catalogid=post.catalogid where posttitle like '%$searchtag%' limit 20";
        } else {
            $sql = "select * from post inner join users on post.userid=users.userid inner join users_pic on users_pic.userid=post.userid inner join catalog on catalog.catalogid=post.catalogid where catalogname='$catalogname' and posttitle like '%$searchtag%' limit 20";
        }

        $posts = $conn->query ($sql);

        $post_row = array();

        while ($row = $posts->fetch_assoc()) {
            array_push ($post_row, $row);
        }

        $post_cnt = count ($post_row);
        $itr = 0;

        $searched = 1;
    }
?>
<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://kit.fontawesome.com/16d805dc1a.js" crossorigin="anonymous"></script>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


<link rel="stylesheet" href="css/style.css">

<link rel="stylesheet" href="css/footer.css">
<link href="css/catalog.css" rel="stylesheet">

       

<title>Draft | Catalog</title>
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
                                <li><a href="./server/logout.php">Log Out</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
<!--_-----------catalog search----------_-->
        <div class="s-container">
            <div class="search-bar" id="myDropdown">
                <div id="select">
                    <p id="selectText" onchange="copy_data()">Catalog</p>
                    <i class="fa fa-sort-desc" aria-hidden="true"></i>
                    <ul id="list">
                        <?php 
                            while ($row = $res->fetch_assoc ()) {
                                echo '<li class="options">'.$row['catalogname'].'</li>.';
                            }
                        ?>
                    </ul>
                </div>
                <form action="" method="POST" id="send_help">
                    <input type="hidden" id="okk" name="catalogname" value="">
                    <input type="text" name="searchtag" id="inputfield" placeholder="Search in catalog" onkeyup="filterFunction()">
                </form>
            </div>
        </div>


        <section class="posts">
            <div class="container">
                <?php if ($searched == 1) {while ($itr < $post_cnt) { $postid=$post_row[$itr]['postid'];$userid=$post_row[$itr]['userid']?>
                    <div class="slider-item">
                        <div class="d-flex flex-lg-row flex-column">
                            <div class="slider-item-img text-lg-start text-center mb-lg-0 mb-3">
                                <img src="<?php echo $post_row[$itr]['postimg'] ?>" alt="">
                            </div>
                            <div class="slider-item-content">
                                <div class="d-flex flex-column">
                                    <span><b><?=$post_row[$itr]['catalogname']?></b> - <?=$post_row[$itr]['uploaddate']?></span>
                                    <h1><a href="post.php?postid=<?=$postid?>" ><?=$post_row[$itr]['posttitle']?></a></h1>
                                    <p><?=substr ($post_row[$itr]['postbody'], 0, 200)?></p>
                                    <div class="d-flex flex-row justify-content-lg-start justify-content-center">
                                        <div class="slider-author-img">
                                            <img src="<?=$post_row[$itr]['location']?>" class="rounded-circle" alt="">
                                        </div>
                                        <div class="slider-author-name">
                                            <span><a href="profile.php?userid=<?=$userid?>" ><?=$post_row[$itr]['fullname']?></a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php $itr++;}} ?>
            </div>
        </section>
      
        <script>
            function copy_data () {
                var b = document.getElementById('selectText');
                var c = document.getElementById('okk');

                c.value = b.innerHTML;
            }

            var ele = document.getElementById('send_help');
            if (ele.addEventListener){
                ele.addEventListener("submit", copy_data, false);  //Modern browsers
            }


            let select= document.getElementById("select");
            let list= document.getElementById("list");
            let selectText= document.getElementById("selectText");
            let inputfield= document.getElementById("inputfield");
            
            let options= document.getElementsByClassName("options");
          

            select.onclick=function(){
                list.classList.toggle("open");
            }
            for(option of options){
                option.onclick = function(){
                    selectText.innerHTML = this.innerHTML;
                    inputfield.placeholder = "Search in "+ selectText.innerHTML;
                }
            }

            function filterFunction() {
            var input, filter, ul, li, a, i;
            input = document.getElementById("inputfield");
            filter = input.value.toUpperCase();
            div = document.getElementById("myDropdown");
            a = div.getElementsByClassName("options");
            for (i = 0; i < a.length; i++) {
                txtValue = a[i].textContent || a[i].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = "";
                } else {
                a[i].style.display = "none";
                }
            }
}
        </script>

        <?php include './footer.php'; ?>
        