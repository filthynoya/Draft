<?php include "includes/header.php"; 
    include './server/db.php';
?>

<div class="container">
    <div class="row">
    <div class="col-md-12">
            <div class="card">
                <div class="card_header">
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
                                    <td><?= $item['catalogid']?></td>
                                        <td><?= $item['catalogname']?></td>
                                        
                                    
                                        <td>
                                        <a href="categoryedit.php?catalogid=<?= $item['catalogid']?> " class="btn btn-info">edit</a>
                                                   
                                        </td>
                                        <td>
                                            <button  class="btn btn-md btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                    <?php
                                }   
                             }
                            else{
                                ?>
                                <tr>
                                    <td colspan="5">no record found</td>
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
