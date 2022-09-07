<?php include "includes/header.php"; 
    $contactid = $_GET['contactid'];

    $sql = "select * from contact where contactid=$contactid";

    $row = ($conn->query ($sql))->fetch_assoc ();

    $name = $row['contactname'];
    $email = $row['contactemail'];

    $sent_email = 0;

    if (isset ($_POST['sendmail'])) {
        $to = $email;
        $subject = $_POST['subject'];
        $msg = $_POST['msg'];
        $header = "From: drafted8080@outlook.com \r\n";
        $header .= "MIME-Version: 1.0" . "\r\n";
        $header .= "Content-type:text/html;charset=UTF-8"."\r\n";

        if (mail ($to, $subject, $msg, $header)) {
            $sent_email = 1;
            exit;
        }
    }
?>

<div class="container my-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Send Mail
                        <a href="dashboard.php" class="btn btn-danger justify-content-md-end float-end">Back</a>
                    </h4> 
                </div>
                <div class="card-body">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?contactid=$contactid";?>" method="POST">
                        <div class="form-group">
                            <label for="">Name: <?php echo $name; ?></label>
                        </div>
                        <div class="form-group">
                            <label for="">Email: <?php echo $email; ?></label>
                        </div>

                        <div class="form-group">
                            <label for="">Subject: </label>
                            <input type="text" name="subject" required class="form-control my-2 p-2" id="">
                        </div>

                        <div class="form-group">
                            <label for="">Message: </label>
                            <textarea required class="form-control my-2 p-2" name="msg"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" name="sendmail" class="btn btn-md btn-info">Send</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    <?php 
        if ($sent_email != 0) {
            echo 'alert ("Sent Email.")';
        }
    ?>
</script>

<?php 
include ('includes/footer.php');
?>
<?php 
include ('includes/script.php');
?>
