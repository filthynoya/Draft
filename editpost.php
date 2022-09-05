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

    <script src="https://kit.fontawesome.com/16d805dc1a.js" crossorigin="anonymous"></script>
    
    <!--b5-->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

   
    <title>Edit | Post</title>
</head>
<body>
    <section>
        <div class="container">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?postid=$postid";?>" enctype="multipart/form-data">
                <div class="create">
                    <h2 class="lead pb-md-0 mb-md-5 px-md-2">Edit Post</h2>
                    <div class=" d-md-flex justify-content-md-end">
                        <button class="btn1 gradient-custom-2" type="submit">Post</button>
                    
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
                        <div class="wrapper text-center">
                                    
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
            
                        </div> 
                        <input name="post_img" class="flex-row align-items-center justify-content-center" id="default-btn" type="file" hidden require>
                        <button onclick="defaultBtnActive()" class="align-items-center justify-content-center" id="custom-btn" type="button">Choose a file</button>
                        <div class=" d-md-flex justify-content-md-end">
                        <a href="post.php?postid=<?php echo $postid; ?>"><i class="icon-back fa fa-chevron-circle-left" aria-hidden="true"></i></a>    
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!--
    <section class="h-100 h-custom" style="background-color: #000000;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-8 justify-content-center align-items-cente ">
                    <div class="card rounded-3">
                
                        <div class="card-body p-2 p-md-5">
                            <div>
                                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Create Post</h3>
                                <div class="d-md-flex justify-content-md-end">
                                    <button class="btn1 gradient-custom-2" type="button">Post</button>
                                
                                </div>
                            </div>
                            <div class="msg col-lg-12  mb-4">
                                <input type="text" name="first_name" placeholder="Title" required>
                               
                            </div>
                            <div class="msg col-lg-12">
                                <textarea  placeholder="Wright someting here...." required></textarea>
      
                            </div>
                            <form class="wrapper px-md-2 text-center">
                                
                                <div class="image">
                                    <img class="img-fluid" src=" " alt="">
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
                
                           <!-- </form>
                           
                            <input class="flex-row align-items-center justify-content-center" id="default-btn" type="file" hidden>
                            <button onclick="defaultBtnActive()" id="custom-btn">Choose a file</button>
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
                </div>
            </div>
        </div>
      </section>

      -->

      <script>

                <?php
                    if ($error == 1) {
                        echo 'alert ("Please Submit an Image.")';
                    }
                    if ($success == 1) {
                        echo 'alert ("Uploaded")';
                    }
                ?>

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

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
  <!---->
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
      <!---->

    
</body>
</html>