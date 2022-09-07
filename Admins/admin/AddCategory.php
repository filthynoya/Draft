<?php include "includes/header.php"; 

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
<div class="container my-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Category
                        <a href="index.php" class="btn btn-danger justify-content-md-end float-end">Back</a>

                    </h4> 
                </div>
                <div class="card-body">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                        <div class="form-group">
                            <label for="">Category Name</label>
                            <input name="name" type="text" placeholder="Your Name" class="form-control my-2 p-4 " required>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" name="category_add" class="btn btn-md btn-info">Save Category</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    <?php if($error==1){
        echo'alert("something went wrong")';
    }
    if($success==1){
        echo'alert("Added successfully")';
    } 
    ?>
</script> 
<?php 
include ('includes/footer.php');
?>
<?php 
include ('includes/script.php');
?>