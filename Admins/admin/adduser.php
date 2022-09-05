<?php include "includes/header.php"; ?>
<div class="container">
    <div class="row">
        <div class="col-md-2">
        
        </div>
        <div class="col-md-8">
            <form action="code.php" method="POST">
                <div class="form-group">
                    <label for="">User Name</label>
                    <input name="fullname" type="text" placeholder="Your Name" class="form-control my-2 p-4 " required>
                </div>
                <div class="form-group">
                    <label for="">User Email</label>
                    <input name="email" type="email" placeholder="Email address" class="form-control my-2 p-4 " required>
                </div>
                <div class="form-group">
                    <label for="">Username</label>
                    <input name="username" type="text" placeholder="Username" class="form-control my-2 p-4 " required>
                </div>
                <div class="form-group">
                    <label for="">User password</label>
                    <input name="passkey" type="password" placeholder="Password" class="form-control my-2 p-4" required>
                </div>
                <div class="form-group">
                    <input type="submit" name="register" class="btn btn-md btn-info">
                </div>
            </form>
        </div>
        <div class="col-md-2">
        
        </div>
    </div>
</div>

<?php include "includes/footer.php"; ?>
<?php include "includes/script.php"; ?>
