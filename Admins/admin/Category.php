<?php include "includes/header.php"; 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $post_postid = $_GET['catalogid'];

        $sql = "DELETE from comments where postid in (select postid from post where catalogid=$post_postid)";

        $conn->query ($sql);

        $sql = "DELETE from report where postid in (select postid from post where catalogid=$post_postid)";

        $conn->query ($sql);

        $sql = "DELETE from post where catalogid=$post_postid";

        $conn->query ($sql);

        $sql = "DELETE from catalog where catalogid=$post_postid";

        $conn->query ($sql);
    }
?>

<div class="container my-3">
    <div class="row">
    <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Category
                        <a href="AddCategory.php" class="btn btn-primary float-end">Add Category</a>

                    </h4> 
                </div>
                <div class="card-body">
                   
                                
                    <table class="table table-dark table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql="SELECT * FROM catalog";
                            $sql_run=mysqli_query($conn,$sql);

                            if(mysqli_num_rows($sql_run) > 0)
                            {
                                foreach($sql_run as $item)
                                {
                            ?>
                            <tr>
                                <?php $postid = $item['catalogid']; ?>
                                <td><?= $item['catalogid']?></td>
                                <td><?= $item['catalogname']?></td>              
                                <td>
                                    <a href="categoryedit.php?catalogid=<?= $item['catalogid']?> " class="btn btn-info">Edit</a>                       
                                </td>
                                <td>
                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?catalogid=$postid";?>">
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
