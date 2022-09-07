<?php
    include './server/db.php';

    $sent = 0;
    $error = 0;
    $errorMsg = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];

        $sql = "select * from users where email='$email'";
        $res = $conn->query ($sql);

        if ($res->num_rows == 0) {
            $error = 1;
            $errorMsg = "Email dont exists.";
        } else {
            $pkey = md5 ($email);

            $to = $email;
            $subject = "Change Password";
            $msg = "<a href='http://localhost/Draft/changepass.php?pkey=$pkey&email=$email'>Change your password.</a>";
            $header = "From: drafted8080@outlook.com \r\n";
            $header .= "MIME-Version: 1.0" . "\r\n";
            $header .= "Content-type:text/html;charset=UTF-8"."\r\n";

            if (mail ($to, $subject, $msg, $header)) {
                $sent = 1;
                $sql = "insert into passkey_reset (pkey) values ('$pkey')";
                $conn->query ($sql);
            } else {
                $error = 1;
                $errorMsg = "Error.";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--social icon-->

    <link rel="stylesheet" href="Admins/asset/css/bootstrap5.min.css">
    <link rel="stylesheet" href="Admins/asset/css/custom.css">
    <link rel="stylesheet" href="Admins/asset/css/sb-admin-2.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/16d805dc1a.js" crossorigin="anonymous"></script>

    <title>Change Password</title>
</head>
<body>
    <section>
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
                                                <h1 class="h4 text-gray-900 mb-4">Enter Your Email</h1>
                                            </div>
                                            <form class="user" id="ei_obelay" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                                <div class="form-group">
                                                    <input type="email" class="form-control form-control-user"
                                                        id="exampleInputEmail" aria-describedby="emailHelp"
                                                        placeholder="Enter Email Address..." name="email" required>
                                                </div>

                                                <a href="#" onclick="document.getElementById('ei_obelay').submit()" class="btn btn-primary btn-user btn-block">
                                                    Sent
                                                </a>
                                                
                                            </form>

                                            <?php if ($error == 1 || $sent == 1) {?>
                                                <hr>
                                                <div class="text-center">
                                                    <p class="small">
                                                        <?php if ($error == 1) {echo $errorMsg;} else {echo 'Email sent.';} ?> 
                                                    </p>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>