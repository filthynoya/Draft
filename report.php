<?php
    session_start();

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }

    include './server/db.php';

    if (!isset($_GET['postid'])) {
        header ("location: home.php");
        exit;
    }

    $id = $_SESSION['id'];
    $postid = $_GET['postid'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $body = $_POST['feedback'];

        $sql = "insert into report (reportbody, postid) values ('$body', $postid)";

        if ($conn->query ($sql)) {
            header ("location: post.php?postid=".$postid);
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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="css/style.css" res="stylesheet">

    <script src="https://kit.fontawesome.com/16d805dc1a.js" crossorigin="anonymous"></script>

    <title>Report</title>
</head>
<body>
    <section>
        <div class="container">
            <div class="d-row flex-row justify-content-center my-5">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])."?postid=".$postid;?>">
                    <div class="report-form mb-3">
                        <label class="form-label">Enter Feedback.</label><br>
                        <textarea style="
                            resize: none;
                            width: 100%;
                            height: 200px;
                        " name="feedback" required></textarea>
                        <div class="form-text">We'll never share your feedback with anyone else.</div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>    
            </div>
        </div>
    </section>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>