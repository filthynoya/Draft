<?php
    session_start();
    
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: home.php");
        exit;
    }

    include 'server/db.php';

    $fullname = "";
    $email = "";
    $username = "";
    $pass = "";
    $conpass = "";
    $error = 0;
    $error_msg = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fullname = trim_data ($_POST["fullname"]);

        if (!preg_match("/^[a-zA-Z-' ]*$/", $fullname)) {
            $error_msg = "Only White Space and Alphabets Allowed.";
            $error++;
        }

        $email = trim_data ($_POST["email"]);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error_msg = "Incorrect Email";
            $error++;
        }

        $sql = "select * from users where email='$email'";

        $res = $conn->query ($sql);

        if ($res->num_rows > 0) {
            $error++;
            $error_msg = "Email already Exists.";
        }

        $pass = trim_data ($_POST["passkey"]);
        $conpass = trim_data ($_POST["conpasskey"]);

        if (strcmp ($pass, $conpass) != 0) {
            $error_msg = "Password Does not Match.";
            $error++;
        } else if (strlen ($pass) < 6) {
            $error_msg = "Password too short.";
            $error++;
        }

        if ($error == 0) {
            $vkey = md5 (time().$username);

            $sql = "INSERT INTO users (fullname, email, dateofreg, passkey, dateofbirth, activated, about, vkey) VALUES ('$fullname', '$email', CURDATE(), '$pass', NULL, 0, NULL, '$vkey')";
            
            if ($conn->query($sql) === TRUE) {
                $sql = "INSERT INTO users_pic (userid, location) values ((SELECT MAX(userid) FROM users), './img/sample-avatar.jpg')";
                $conn->query($sql);
                header("location: login.php");
            } else {
                $error_msg = "User Does not Exist.";
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
        <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/logregstyle.css">


    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--social icon-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/16d805dc1a.js" crossorigin="anonymous"></script>
    <title>Registration</title>
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
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                    <p class="h1 fw-bold mb-2 mx-1 mx-md-4 mt-5">Sign up</p>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="mx-1 mx-md-3">
                            <div class="form-row">
                                <div class="col-lg-10 d-flex flex-row boxes">
                                    <i class="fa fa-user-o icon"></i>
                                    <input name="fullname" type="text" placeholder="Your Name" class="form-control my-2 " value="<?php echo $fullname; ?>" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-10 d-flex flex-row boxes">
                                    <i class="fa fa-envelope icon"></i>
                                    <input name="email" type="email" placeholder="Email address" class="form-control my-2 " value="<?php echo $email; ?>" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-10 d-flex flex-row boxes">
                                    <i class="fa fa-key icon"></i>
                                    <input name="passkey" type="password" placeholder="Password" class="form-control my-2 " required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-10 d-flex flex-row boxes">
                                    <i class="fa fa-lock icon"></i>
                                    <input name="conpasskey" type="password" placeholder="Repeat your password" class="form-control my-2 " required>
                                </div>
                            </div>
                
                            <div class="col-lg-10 d-flex flex-row  d-flex justify-content-around  mb-5">
                            <!-- Checkbox -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked require/>
                                <label class="form-check-label" for="form1Example3">I agree all statements in <a href="#!">Terms of service</a></label>
                            </div>
                            
                            </div>
                            <div class="form-row">
                                <div class="col-lg-10">
                                    <div class="d-flex flex-row align-items-center justify-content-center">
                                    <div class="section-btn">
                                        <button type="submit" id="cf-submit" name="submit"><span data-hover="Sign in">Sign up</span></button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="col-lg-10">
                                <p class="text-center text-muted  mb-4">Have already an account? 
                                    <a href="login.php" class="fw-bold text-body"><u>Sign in here</u></a>
                                </p>
                            </div>
                    </form>
                
                </div>
                <div class="col-md-10 col-lg-6 col-xl-3 d-flex align-items-center order-1 order-lg-2 justify-content-center" style="width: 35%;">
                    <img src="img/signup-image.jpg" class="img-fluid mt-lg-0 mt-5" alt="">
                </div>
            </div>
            </div>
       </section>
    </section>
    <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/modernizr.custom.js"></script>
     <script src="js/smoothscroll.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>