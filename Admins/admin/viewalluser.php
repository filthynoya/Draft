<?php include "includes/header.php"; ?>
<div class="container">
    <div class="row">
    <table class="table table-dark table-hover">
    <thead>
      <tr>
        <th>Full Name</th>
        
        <th>Email</th>
        <th>Username</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        
        <td>john@example.com</td>
        <td>Doe</td>
        <td><div class="btn-group">
            <button class="btn btn-md btn-success">Update</button>
            <button class="btn btn-md btn-danger">Delete</button>
        </div></td>
      </tr>
      <tr>
        <td>Mary</td>
       
        <td>mary@example.com</td>
        <td>Moe</td>
        <td><div class="btn-group">
            <button class="btn btn-md btn-success">Update</button>
            <button class="btn btn-md btn-danger">Delete</button>
        </div></td>
      </tr>
      
    </tbody>
  </table>
        
    </div>
</div>

<?php include "includes/footer.php"; ?>
<?php include "includes/script.php"; ?>