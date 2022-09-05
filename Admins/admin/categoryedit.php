<?php include "includes/header.php"; 
include './server/db.php';
if(isset($_POST['category_add']))
{
    $name=$_POST['name'];

    $sql= "INSERT INTO catalog (catalogname) VALUES('$name')";
    //$querry_run= mysqli_quer($conn,$querry);
    $conn->query($sql);

    $error=0;
    $success=0;

    if($sql){
        $success=1;
    }
    else{
      $error=1;
    }
    
}


?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card_header">
                    <h4>Edit Category
                        <a href="dashboard.php" class="btn btn-danger justify-content-md-end float-end">Back</a>

                    </h4> 
                </div>
                <div class="card-body">
                    <?php
                    if(isset($_GET['catalogid']))
                    {
                        $id=$_GET['catalogid'];
                        echo $id;
                        $sql="SELECT * FROM catalog WHERE catalogid= $id LIMIT 1";
                        $sql_run=mysqli_query($conn,$sql);

                        if(mysqli_num_rows($sql_run) > 0){
                            $row=mysqli_fetch_array($sql_run);
                            ?>

        

                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                                <div class="form-group">
                                    <label for="">Category Name</label>
                                    <input name="name" type="text" placeholder="Your Name" value="<?php echo $row['catalogname']?>" class="form-control my-2 p-4 " required>
                                </div>
                                
                                <div class="form-group">
                                    <button type="submit" name="category_add" class="btn btn-md btn-info">Save Category</button>
                                </div>
                            </form>
                            <?php
                        }
                        else{
                            ?>
                            <h4>no record found</h4>
                            <?php
                        }
                        
                    }
                    ?>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include "includes/footer.php"; ?>
<?php include "includes/script.php"; ?>