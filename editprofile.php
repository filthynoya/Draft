<?php
    session_start();

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }

    include 'server/db.php'; 

    $email = $_SESSION["email"];

    $sql = "SELECT * FROM users INNER JOIN users_pic ON users.userid = users_pic.userid WHERE email = '$email'";

    $result_set = $conn->query($sql);

    $error = 0;
    $errorMsg = "";

    if ($result_set->num_rows > 0) {
        while ($row = $result_set->fetch_assoc ()) {
            $id = $row["userid"];
            $name = $row["fullname"];
            $doj = $row["dateofreg"];
            $about = $row["about"];
            $passkey = $row["passkey"];
            $dob = $row["dateofbirth"];
            $location = $row["location"];
        }
    }

    if(isset($_POST['page_form'])) {
        if ($_POST["page_form"] == 1) {
            $name = $_POST["fullname"];
            $dob = $_POST["dob"];
            $about = $_POST["about"];

            $sql = "UPDATE users SET fullname='$name', dateofbirth='$dob', about='$about' WHERE email='$email'";

            $conn->query($sql);

            $filename = $_FILES["propic"]["name"];
            $tempname = $_FILES["propic"]["tmp_name"];
            $folder = "uploads/".$filename; 
            move_uploaded_file($tempname, $folder);

            $sql = "UPDATE users_pic SET location='$folder' where userid=$id";
            $conn->query($sql);
            $location = $folder;
        }
        if ($_POST["page_form"] == 2) {
            $opass = $_POST["opass"];
            $npass = $_POST["npass"];
            $nnpass = $_POST["nnpass"];

            if (strcmp ($opass, $passkey) == 0) {
                if (strcmp ($npass, $nnpass) == 0) {
                    if (strlen ($npass) >= 6) {
                        $sql = "UPDATE users SET passkey='$npass' WHERE email='$email'";

                        $conn->query($sql);
                    } else {
                        $error++;
                        $errorMsg = "Password too short.";
                    }
                } else {
                    $error++;
                    $errorMsg = "Password does not match.";
                }
            } else {
                $error++;
                $errorMsg = "Wrong Password.";
            }
        }
    }
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link rel="stylesheet" href="css/editprofile.css">

        <script src="https://kit.fontawesome.com/16d805dc1a.js" crossorigin="anonymous"></script>

        <title>Edit Profile</title>
    </head>
    <body>
        <header class="fixed-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="logo text-lg-start text-center">
                            <span><a href=""><img src="img/logo.png" alt=""><a href="">Draft</a></span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <nav>
                            <ul>
                                <li><a href="home.php">Home</a></li>
                                <li><a href="catalog.php">Catalog</a></li>
                                <li><a href="addpost.php">Add Post</a></li>
                                <li><a href="profile.php">View Profile</a></li>
                                <li><a href="server/logout.php">Log Out</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>

        <main>
            <div class="container">
                <div class="row">
                    <div class="col-3">
                        <div class="sidebar">
                            <ul>
                                <li onclick="changeDisplay ('b1', 'b2', 'b3')">Basic Information</li>
                                <li onclick="changeDisplay ('b2', 'b1', 'b3')">Change Password</li>
                                <li onclick="changeDisplay ('b3', 'b2', 'b1')">Delete Profile</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-9">
                        <?php
                            if ($error != 0) {
                                echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
                                    <i class="fa-solid fa-triangle-exclamation me-3"></i>
                                    <div>' . $errorMsg . '</div>
                                </div>';
                            }
                        ?>
                        <div class="basic-info" id="b1">       
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                                <div class="form-field d-flex flex-column">
                                    <label for="">Full Name</label>
                                    <input type="text" name="fullname" id="" value="<?php echo $name; ?>" require>
                                    <input type="hidden" name="page_form" value="1">
                                </div>
                                <div class="form-field d-flex flex-column">
                                    <label for="">Email</label>
                                    <input type="email" name="email" id="" value="<?php echo $email; ?>" disabled>
                                    <span><i>Email cannot be changed</i></span>
                                </div>
                                <div class="form-field d-flex flex-column">
                                    <label for="">Date of Birth</label>
                                    <input type="date" name="dob" id="" value="<?php if ($dob != NULL) {echo $dob;} ?>" require>
                                </div>
                                <div class="form-field d-flex flex-column">
                                    <label for="">About Yourself</label>
                                    <textarea name="about" id="" maxlength="250" require><?php if ($about != NULL) { echo ($about); } ?></textarea>
                                </div>
                                <div class="form-field d-flex flex-column">
                                    <label for="">Avater</label>
                                    <input id="imgupload" accept="image/*" type="file" name="propic" id="">
                                    <img id="propicimg" src="<?php if ($location == NULL) {echo 'img/sample-avatar.jpg';} else { echo $location; } ?>" alt="">
                                </div>
                                <input type="submit" value="Submit">
                            </form>
                        </div>
                        <div class="change-pass" id="b2">
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                                <div class="form-field d-flex flex-column">
                                    <label for="">Old Password</label>
                                    <input type="password" name="opass" id="">
                                    <input type="hidden" name="page_form" value="2">
                                </div>
                                <div class="form-field d-flex flex-column">
                                    <label for="">New Password</label>
                                    <input type="password" name="npass" id="">
                                </div>
                                <div class="form-field d-flex flex-column">
                                    <label for="">Confirm Password</label>
                                    <input type="password" name="nnpass" id="">
                                </div>
                                <input type="submit" value="Submit">
                                <div class="d-lg-block d-none hhh"></div>
                            </form>
                        </div>
                        <div class="delete-profile d-flex flex-column">
                            <div class="delete-pro" id="b3">
                                <div class="form-field d-flex flex-column">
                                    <span>Are you Sure? This process cannot be undone.</span>
                                    <input type="button" value="Submit" class="c-btn">
                                </div>
                                <div class="d-lg-block d-none hhh"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer>
            <div class="container">
                <span>Copyright ©2022 All rights reserved</span>
            </div>
        </footer>

        <script src="js/editprofile.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>