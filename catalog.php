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
                    <p id="selectText">Catalog</p>
                    <i class="fa fa-sort-desc" aria-hidden="true"></i>
                    <ul id="list">
                        <li class="options">Default</li>
                        <li class="options">1</li>
                        <li class="options">2</li>
                        <li class="options">sd</li>
                        <li class="options">sumaiya</li>
                        <li class="options">3</li>
                        <li class="options">14</li>
                        <li class="options">mumu</li>
                        <li class="options">24</li>
                        <li class="options">ayon</li>
                    </ul>
                </div>
                <form action="">
                <input type="text" id="inputfield" placeholder="Search in catalog" onkeyup="filterFunction()">
                </form>
            </div>
        </div>

        <section class="slider">
            <div class="c-container">
                <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="10000">
                            <div class="slider-title text-Start">
                                <h1>#Catalog 1</h1>
                            </div>
                            <div class="slider-item">
                                <div class="d-flex flex-lg-row flex-column">
                                    <div class="slider-item-img text-lg-start text-center mb-lg-0 mb-3">
                                        <img src="img/sample_post_pic_sq.jpg" alt="">
                                    </div>
                                    <div class="slider-item-content">
                                        <div class="d-flex flex-column">
                                            <span>26 September, 2022</span>
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
                            <div class="slider-item">
                                <div class="d-flex flex-lg-row flex-column">
                                    <div class="slider-item-img text-lg-start text-center mb-lg-0 mb-3">
                                        <img src="img/sample_post_pic_sq.jpg" alt="">
                                    </div>
                                    <div class="slider-item-content">
                                        <div class="d-flex flex-column">
                                            <span>26 September, 2022</span>
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
                            <div class="slider-item">
                                <div class="d-flex flex-lg-row flex-column">
                                    <div class="slider-item-img text-lg-start text-center mb-lg-0 mb-3">
                                        <img src="img/sample_post_pic_sq.jpg" alt="">
                                    </div>
                                    <div class="slider-item-content">
                                        <div class="d-flex flex-column">
                                            <span>26 September, 2022</span>
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
                        <div class="carousel-item" data-bs-interval="2000">
                            <div class="slider-title text-Start">
                                <h1>#Catalog 2</h1>
                            </div>
                            <div class="slider-item">
                                <div class="d-flex flex-lg-row flex-column">
                                    <div class="slider-item-img text-lg-start text-center mb-lg-0 mb-3">
                                        <img src="img/sample_post_pic_sq.jpg" alt="">
                                    </div>
                                    <div class="slider-item-content">
                                        <div class="d-flex flex-column">
                                            <span>26 September, 2022</span>
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
                            <div class="slider-item">
                                <div class="d-flex flex-lg-row flex-column">
                                    <div class="slider-item-img text-lg-start text-center mb-lg-0 mb-3">
                                        <img src="img/sample_post_pic_sq.jpg" alt="">
                                    </div>
                                    <div class="slider-item-content">
                                        <div class="d-flex flex-column">
                                            <span>26 September, 2022</span>
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
                            <div class="slider-item">
                                <div class="d-flex flex-lg-row flex-column">
                                    <div class="slider-item-img text-lg-start text-center mb-lg-0 mb-3">
                                        <img src="img/sample_post_pic_sq.jpg" alt="">
                                    </div>
                                    <div class="slider-item-content">
                                        <div class="d-flex flex-column">
                                            <span>26 September, 2022</span>
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
                            <div class="slider-title text-Start">
                                <h1>#Catalog 3</h1>
                            </div>
                            <div class="slider-item">
                                <div class="d-flex flex-lg-row flex-column">
                                    <div class="slider-item-img text-lg-start text-center mb-lg-0 mb-3">
                                        <img src="img/sample_post_pic_sq.jpg" alt="">
                                    </div>
                                    <div class="slider-item-content">
                                        <div class="d-flex flex-column">
                                            <span>26 September, 2022</span>
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
                            <div class="slider-item">
                                <div class="d-flex flex-lg-row flex-column">
                                    <div class="slider-item-img text-lg-start text-center mb-lg-0 mb-3">
                                        <img src="img/sample_post_pic_sq.jpg" alt="">
                                    </div>
                                    <div class="slider-item-content">
                                        <div class="d-flex flex-column">
                                            <span>26 September, 2022</span>
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
                            <div class="slider-item">
                                <div class="d-flex flex-lg-row flex-column">
                                    <div class="slider-item-img text-lg-start text-center mb-lg-0 mb-3">
                                        <img src="img/sample_post_pic_sq.jpg" alt="">
                                    </div>
                                    <div class="slider-item-content">
                                        <div class="d-flex flex-column">
                                            <span>26 September, 2022</span>
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
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"></button>
                    </div>
                </div>
            </div>
        </section>
      
        <script>
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
        