<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    

    <link rel="stylesheet" href="css/addpost.css">

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
                <h2 class="lead pb-md-0 mb-md-5 px-md-2">Edit Post</h2>
                <div class=" d-md-flex justify-content-md-end">
                    <button class="btn1 gradient-custom-2" type="button">Save</button>
                
                </div>
            </div>
            
            <div class="row100">
                <div class="col">
                    <input type="text" name="first_name" placeholder="Title" required>
                </div>
            </div>
            <div class="row100">
                <div class="col">
                    <select class="form-select selectpicker show-tick" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                </div>
            </div>
            <div class="row100">
                <div class="col">
                    <textarea  placeholder="Wright someting here...." required></textarea>
                </div>
            </div>
           
            <div class="row100">
                <div class="col">
                    <form class="wrapper text-center">
                                
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
        
                    </form> 
                    <input class="flex-row align-items-center justify-content-center" id="default-btn" type="file" hidden>
                    <button onclick="defaultBtnActive()" class="align-items-center justify-content-center" id="custom-btn">Choose a file</button>
                    <div class=" d-md-flex justify-content-md-end">
                        <a href="home.php"><i class="icon-back fa fa-chevron-circle-left" aria-hidden="true"></i></a>
                
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



  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
  <!---->
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
      <!---->

    
</body>
</html>