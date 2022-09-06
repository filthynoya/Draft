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

    $sql = "SELECT * FROM catalog";

    $result = $conn->query ($sql);

    if (!$result) {
        die ("Can't fetch catalog");
    }

    $error = 0;
    $success = 0;

    $postid = $_GET['postid'];

    $sql = "select * from post inner join catalog on post.catalogid=catalog.catalogid where post.postid=$postid";

    $res = $conn->query ($sql);

    $row = $res->fetch_assoc ();

    $title = $row['posttitle'];
    $body = $row['postbody'];
    $img = $row['postimg'];
    $cata = $row['catalogid'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST['title'];
        $body = $_POST['body'];
        $catalog = $_POST['catalogs'];

        $userid = $_SESSION['id'];

        $filename = $_FILES["post_img"]["name"];
        $tempname = $_FILES["post_img"]["tmp_name"];
        $folder = "uploads/posts/".$filename; 
        move_uploaded_file($tempname, $folder);

        if (strcmp ($filename, "") == 0) {
            $folder = $img;
        }

        if ($error == 0) {
            $sql = "UPDATE post SET posttitle='$title', postbody='$body', uploaddate=CURDATE(), catalogid=$catalog, postimg='$folder' WHERE postid=$postid";

            $conn->query($sql);
            $success = 1;

            $img = $folder;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
   
    

<link rel="stylesheet" href="css/addpost.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <script src="https://kit.fontawesome.com/16d805dc1a.js" crossorigin="anonymous"></script>
    
    <!--b5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

   
    <title>Edit|Post</title>
</head>
<body>
    <section>
        <div class="container">
                
        <div class="create">
                <div class="d-flex flex-lg-row flex-column justify-content-center section-btn">
                    <h2 class="lead pb-md-0 mb-md-5">Edit Post</h2>
                       <!-- <button class="section-btn" id="cf-submit"  name="submit"><span data-hover="Post">Post</span></button>-->
                       <a href="#about" class="smoothScroll my-lg-0 my-5"><span data-hover="Save">Save</span></a>
                 </div>
            </div>
            
            <div class="row100">
                <div class="col">
                    <input type="text" name="title" placeholder="Title" required value="<?php echo $title ?>">
                </div>
            </div>
            <div class="row100">
                <div class="col">
                    <select name="catalogs" class="form-select selectpicker show-tick" aria-label="Default select example">
                            <?php
                                while ($rows = $result->fetch_assoc ()) {
                                    $id = $rows['catalogid'];
                                    $name = $rows['catalogname'];

                                    //echo '<option value="'.$id.'">'.$name.'</option>';

                                    if ($id == $cata) {
                                        echo '<option selected value="'.$id.'">'.$name.'</option>';
                                    } else {
                                        echo '<option value="'.$id.'">'.$name.'</option>';
                                    }
                                }
                            ?>
                        </select>
                </div>
            </div>
            <div class="row100">
                <div class="col">
                    <textarea name="body" placeholder="Write someting here...." required><?php echo $body ?></textarea>
                </div>
            </div>
           
            <div class="row100">
                <div class="col">
                    <form class="wrapper text-center">
                                
                        <div class="image">
                            <img class="img-fluid" src="<?php echo $img ?>" alt="">
                        </div>
                        <div class="conten">
                            <div class="icon">
                                <i class="fa fa-cloud-upload"></i>
                            </div>
                            <div class="text">No file chosen,yet!</div>
                        </div>
                        <div id="cancel-btn"><i class="fa fa-times"></i></div>
                        <div class="file-name">File name here</div>
        
                       <!-- <button type="submit" class="btn btn-success btn-lg mb-1">Submit</button>  -->
        
                    </form> 
                    <input class="flex-row align-items-center justify-content-center" id="default-btn" type="file" hidden>
                    <button onclick="defaultBtnActive()" class="align-items-center justify-content-center" id="custom-btn">Choose a file</button>
                    <div class=" d-md-flex justify-content-md-end">
                    <a href="post.php?postid=<?php echo $postid; ?>"><i class="icon-back fa fa-chevron-circle-left" aria-hidden="true"></i></a>
                
                </div>


                </div>
            </div>
                <script>
                    
                    const textarea= document.querySelector("textarea");

                    const wrapper= document.querySelector(".wrapper");
                    const fileName= document.querySelector(".file-name");
                    const cancelBtn= document.querySelector("#cancel-btn");
                    const defaultBtn= document.querySelector("#default-btn");
                    const customBtn= document.querySelector("#custom-btn");
                    const img= document.querySelector("img");



                    let regExp=/[0-9a-zA-Z\^\&\'\@\{\}\[\]\, \$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;

                    textarea.addEventListener("keyup", e =>{
                        textarea.style.height="55px";
                        let scHeight = e.target.scrollHeight;
                        textarea.style.height=`${scHeight}px`;
                    });

                    function defaultBtnActive(){
                        defaultBtn.click();
                    }
                    defaultBtn.addEventListener("change",function(){
                        const file=this.files[0];
                        if(file){
                            const reader= new FileReader();
                            reader.onload=function(){
                                const result=reader.result;
                                img.src=result;
                                wrapper.classList.add("active");
                            }
                            cancelBtn.addEventListener("click",function(){
                                img.src=" ";
                                wrapper.classList.remove("active");
                            });
                            reader.readAsDataURL(file);
                        }
                        if(this.value){
                            let valueStore=this.value.match(regExp);
                            fileName.textContent=valueStore;
                        }

                    });

                                
                </script>
        </div>
      
    </section>



  

    <script src="js/jquery.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/modernizr.custom.js"></script>
      <script src="js/smoothscroll.js"></script>

    
</body>
</html>