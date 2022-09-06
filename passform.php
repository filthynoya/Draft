<?php
    include './server/db.php';

    $sent = 0;
    $error = 0;
    $errorMsg = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];

        $pkey = md5 ($email);

        $sql = "insert into passkey_reset (pkey) values ('$pkey')";

        $conn->query ($sql);

        $to = $email;
        $subject = "Change Password";
        $msg = "<a href='http://localhost/Draft/changepass.php?pkey=$pkey&email=$email'>Change your password.</a>";
        $header = "From: drafted8080@outlook.com \r\n";
        $header .= "MIME-Version: 1.0" . "\r\n";
        $header .= "Content-type:text/html;charset=UTF-8"."\r\n";

        if (mail ($to, $subject, $msg, $header)) {
            $sent_email = 1;
        } else {
            $error = 1;
            $errorMsg = "Error.";
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

    <style>
        .boxx {
            width: 50%;
            margin-left: auto;
            margin-right: auto;
        }

        .boxx input {
            width: 100%;
        }
    </style>

    <title>Change Password</title>
</head>
<body>
    <section>
        <div class="container">
            <div class="d-row flex-row justify-content-center my-5 boxx">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
                    <div class="report-form mb-3">
                        <label class="form-label">Enter Email</label><br>
                        <input type="email" name="email" id="" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>    
            </div>

            <?php 
                if ($sent == 1) {
                    echo 'Sent Email.';
                }
            ?>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>