<?php include "includes/header.php"; 
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset ($_POST['delete'])) {
            $contactid = $_GET['contactid'];

            $sql = "delete from contact where contactid='$contactid'";

            $conn->query ($sql);
        }
    }
?>

<div class="container my-3">
    <div class="row">
    <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Mail</h4> 
                </div>
                <div class="card-body">
                   
                                
                    <table class="table table-dark table-hover">
                        <thead>
                            <tr>
                                <th>From</th>
                                <th>Subject</th>
                                <th>Body</th>
                                <th>Reply</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql="SELECT contactid, contactemail, contactsub, contactmsg FROM contact";
                            $sql_run=mysqli_query($conn,$sql);

                            if(mysqli_num_rows($sql_run) > 0)
                            {
                                foreach($sql_run as $item)
                                {
                            ?>
                            <tr>
                                <?php $postid = $item['contactid']; ?>
                                <td><?= $item['contactemail']?></td>
                                <td><?= $item['contactsub']?></td>
                                <td><?= substr ($item['contactmsg'], 0, 50) . ".." ?></td>
                                <td>
                                    <a href="sendmail.php?contactid=<?php echo $postid; ?>" class="btn btn-md btn-danger">Reply</a>
                                </td>              
                                <td>
                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?contactid=$postid";?>">
                                        <button type="submit" name="delete" class="btn btn-md btn-danger">Delete</button>
                                    </form>
                                </td>
                                </tr>
                            <?php
                                }   
                            }
                            else{
                            ?>
                            <tr>
                                <td colspan="5">No record found.</td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                    
                </div>
            </div>

        </div>
    </div>
</div>

<?php 
include ('includes/footer.php');
?>
<?php 
include ('includes/script.php');
?>
