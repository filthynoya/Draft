<?php
  session_start();
  
  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
      header("location: home.php");
      exit;
  }

  include 'server/db.php';

  $email = $password = "";
  $error = 0;

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim_data ($_POST["email"]);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error_msg = "Incorrect Email";
      $error++;
    }

    $password = trim_data ($_POST["passkey"]);

    if ($error == 0) {
      $sql = "SELECT userid, email, passkey FROM users WHERE email = '$email'";
      $result_set = $conn->query($sql);

      if ($result_set->num_rows > 0) {
        while($row = $result_set->fetch_assoc()) {
          if (strcmp ($password, $row["passkey"]) == 0) {
            session_start();
                            
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $row['userid'];
            $_SESSION["email"] = $email;

            header("location: home.php");
            exit;
          } else {
            $error_msg = "Wrong Password.";
            $error++;
          }
        }
      } else {
        $error_msg = "User don't exist.";
        $error++;
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/logregstyle.css">


    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--social icon-->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/16d805dc1a.js" crossorigin="anonymous"></script>
    
    <title>Login & Register</title>
</head>
<body>
  <section class="Form" style="background-color: rgb(0, 0, 0)">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <?php
          if ($error != 0) {
            echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
            <i class="fa-solid fa-triangle-exclamation me-3"></i>
            <div>' . $error_msg . '</div>
            </div>';
          }
        ?>
        <div class="col-lg-6 d-flex align-items-center justify-content-center mt-lg-0 mt-5">
          <img src="img/signin-image.jpg" class="img-fluid" style="height: 400px;" alt="">
        </div>
        <div class="col-lg-6">
          <p class="h1 fw-bold mb-4 mx-1 mx-md-3 mt-1">Sign in</p>
          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-row">
              <div class="col-lg-8 d-flex flex-row boxes">

                <i class="fa fa-user icon"></i>
                <input name="email" type="email" placeholder="Email address or Username" class="form-control my-2 p-4 " required>
              </div>
            </div>
            <div class="form-row">
              <div class="col-lg-8 d-flex flex-row boxes">
                <i class="fa fa-lock icon"></i>
                <input name="passkey" type="password" placeholder="******" class="form-control my-2 p-4" required>
              </div>
            </div>

            <div class="col-lg-8 d-flex flex-row  d-flex justify-content-around align-items-center mb-3">
              <!-- Checkbox -->
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                <label class="form-check-label" for="form1Example3"> Remember me </label>
              </div>
              <a href="passform.php" class="text-muted  mb-2" style="margin-top:12px; margin-left: 100px;">Forgot password?</a>
            </div>
            <div class="form-row">
              <div class="col-lg-8">
                <div class="d-flex flex-row align-items-center justify-content-center">
                  <button type="submit"class="btn1 gradient-custom-2 mt-3 mb-4">Sign in</button>
                </div>
              </div>
            </div>
        
            <div class=" col-lg-8 divider d-flex align-items-center my-">
              <p class="text-center fw-bold mx-2 mb-0 text-muted">OR</p>
            </div>
          
            <div class="form-row">
              <div class="col-lg-8">
                <div class="social d-flex flex-row align-items-center justify-content-center">
                  <p class="lead fw-normal mt-2 mb-2 me-3">Login in with</p>
                  <!-- Facebook -->
                  <a style="color: #3b5998;" href="#!" role="button"
                  ><i class="fa fa-facebook-f fa-lg"></i
                  ></a>

                  <!-- Twitter -->
                  <a style="color: #55acee;" href="#!" role="button"
                  ><i class="fa fa-twitter fa-lg"></i
                  ></a>

                  <!-- Google -->
                  <a style="color: #dd4b39;" href="#!" role="button"
                  ><i class="fa fa-google fa-lg"></i
                  ></a>
                </div>

                <div class="text-center pt-2 mb-5 pb-4">
              
                  <a class="text-muted fw-bold text-body" href="registration.php">Create an account</a>
                  
                </div>
            </div>
          </div>
           
          </form>
          
        </div>
      </div>
    </div>
   </section>
 


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
</body>
</html>