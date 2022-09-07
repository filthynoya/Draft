<?php 
    if (!isset ($_GET['pkey']) || !isset ($_GET['email'])) {
        header ("location: login.php");
        exit;
    }

    include './server/db.php';

    $pkey = $_GET['pkey'];
    $email = $_GET['email'];

    $error = 0;
    $error_msg = "";

    

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $passkey = $_POST['passkey'];
        $cpasskey = $_POST['conpasskey'];

        if (strcmp ($passkey, $cpasskey) != 0) {
            $error = 1;
            $error_msg = "Does not match";
        }

        if (strlen ($passkey) < 6) {
            $error = 1;
            $error_msg = "Too short";
        }

        if ($error == 0) {
            $sql = "delete from passkey_reset where pkey='$pkey'";

            $conn->query ($sql);

            $sql = "update users set passkey='$passkey' where email='$email'";

            $conn->query ($sql);

            header ("location: login.php");
            exit;
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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/16d805dc1a.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="Admins/asset/css/bootstrap5.min.css">
    <link rel="stylesheet" href="Admins/asset/css/custom.css">
    <link rel="stylesheet" href="Admins/asset/css/sb-admin-2.min.css">

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
                                                <h1 class="h4 text-gray-900 mb-4">Enter Your New Password</h1>
                                            </div>
                                            <form class="user" id="ei_obelay" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?pkey=$pkey" . "&email=$email"?>">
                                                <div class="form-group">
                                                    <input type="password" class="form-control form-control-user"
                                                        id="exampleInputEmail" aria-describedby="emailHelp"
                                                        placeholder="Enter New Passoword..." name="passkey" required>
                                                </div>

                                                <div class="form-group">
                                                    <input type="password" class="form-control form-control-user"
                                                        id="exampleInputEmail" aria-describedby="emailHelp"
                                                        placeholder="Confirm New Passoword..." name="conpasskey" required>
                                                </div>

                                                <a href="#" onclick="document.getElementById('ei_obelay').submit()" class="btn btn-primary btn-user btn-block">
                                                    Submit
                                                </a>
                                                
                                            </form>

                                            <?php if ($error == 1) {?>
                                                <hr>
                                                <div class="text-center">
                                                    <p class="small">
                                                        <?php echo $error_msg; ?> 
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
</body>
</html>