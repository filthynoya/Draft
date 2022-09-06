<?php include "includes/header.php"; 
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $post_postid = $_GET['userid'];

        $sql = "DELETE from comments where userid=$post_postid";

        $conn->query ($sql);

        $sql = "DELETE from users_pic where userid=$post_postid";

        $conn->query ($sql);

        $sql = "DELETE from post where userid=$post_postid";

        $conn->query ($sql);

        $sql = "DELETE from users where userid=$post_postid";

        $conn->query ($sql);
    }
?>

<div class="container my-3">
    <div class="row">
    <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Users</h4> 
                </div>
                <div class="card-body">
                   
                                
                    <table class="table table-dark table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Verified</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql="SELECT userid, fullname, email, activated FROM users";
                            $sql_run=mysqli_query($conn,$sql);

                            if(mysqli_num_rows($sql_run) > 0)
                            {
                                foreach($sql_run as $item)
                                {
                            ?>
                            <tr>
                                <?php $postid = $item['userid']; ?>
                                <td><?= $item['userid']?></td>
                                <td><?= $item['fullname']?></td>
                                <td><?= $item['email']?></td>
                                <td><?= $item['activated']?></td>         
                                <td>
                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?userid=$postid";?>">
                                        <button type="submit" class="btn btn-md btn-danger">Delete</button>
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
