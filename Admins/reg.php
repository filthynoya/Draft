<?php 

    session_start();
    
    if(isset($_SESSION["adminloggedin"]) && $_SESSION["adminloggedin"] === true){
        header("location: admin/index.php");
        exit;
    }

    include './admin/server/db.php';

    $error = 0;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fname = trim_data ($_POST["fname"]);

        if (!preg_match("/^[a-zA-Z-' ]*$/", $fname)) {
            $error_msg = "Only White Space and Alphabets Allowed.";
            $error++;
        }

        $lname = trim_data ($_POST["lname"]);

        if (!preg_match("/^[a-zA-Z-' ]*$/", $lname)) {
            $error_msg = "Only White Space and Alphabets Allowed.";
            $error++;
        }

        $email = trim_data ($_POST["email"]);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error_msg = "Incorrect Email";
            $error++;
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
            $sql = "insert into admin (fname, lname, email, passkey) values ('$fname', '$lname', '$email', '$pass')";

            $conn->query ($sql);

            header("location: login.php");
            exit;
        }
    }

    include ('includes/header.php');
    include('includes/nav.php')
?>

<div class="py-5">
    <div class="container">
       <div class="card o-hidden border-0 shadow-lg my-5 justify-content-center">
            <div class="card-body p-0">
                <div class="row justify-content-center">

                
                    <div class="col-lg-7">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                    </div>
                                    <form class="user" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                                    placeholder="First Name" name="fname" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-user" id="exampleLastName"
                                                    placeholder="Last Name" name="lname" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                                placeholder="Email Address" name="email" required>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="password" class="form-control form-control-user"
                                                    id="exampleInputPassword" placeholder="Password" name="passkey" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control form-control-user"
                                                    id="exampleRepeatPassword" placeholder="Repeat Password" name="conpasskey" required>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Register Account
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="login.php">Already have an account? Login!</a>
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