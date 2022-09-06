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
            $error++;
            $error_msg = "Does not match";
        }

        if (strlen ($passkey) < 6) {
            $error++;
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
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?pkey=$pkey" . "&email=$email"?>">
                    <div class="report-form mb-3">
                        <label class="form-label">New Password</label><br>
                        <input type="password" name="passkey" id="" required>
                    </div>
                    <div class="report-form mb-3">
                        <label class="form-label">Confirm Password</label><br>
                        <input type="password" name="conpasskey" id="" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>    
            </div>
        </div>
    </section>

    <script>
        <?php
            if ($error != 0) {
                echo 'alert ("'. $error_msg .'")';
            }
        ?>
    </script>
</body>
</html>