<?php 

    session_start();
    
    if(isset($_SESSION["adminloggedin"]) && $_SESSION["adminloggedin"] === true){
        header("location: admin/index.php");
        exit;
    }

    include './admin/server/db.php';

    $error = 0;
    $error_msg = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = trim_data ($_POST["email"]);
    
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $error_msg = "Incorrect Email";
          $error++;
        }
    
        $password = trim_data ($_POST["passkey"]);
    
        if ($error == 0) {
          $sql = "SELECT adminid, email, passkey FROM admin WHERE email = '$email'";
          $result_set = $conn->query($sql);
    
          if ($result_set->num_rows > 0) {
            while($row = $result_set->fetch_assoc()) {
              if (strcmp ($password, $row["passkey"]) == 0) {
                session_start();
                                
                $_SESSION["adminloggedin"] = true;
                $_SESSION["adminid"] = $row['adminid'];
                $_SESSION["adminemail"] = $email;
    
                header("location: admin/index.php");
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

    include ('includes/header.php');
    include('includes/nav.php')
?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-xl-7 col-lg-6 col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row justify-content-center">
                           
                            <div class="col-lg-8">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" id="ei_obelay" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name="passkey" required>
                                        </div>

                                        <a href="#" onclick="document.getElementById('ei_obelay').submit()" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </a>
                                        
                                        
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="reg.php">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    <?php
        if($error != 0) {
            echo 'alert ("'. $error_msg .'")';
        }
    ?>
</script>

<?php 
include ('includes/footer.php');
?>