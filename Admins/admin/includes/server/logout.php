<?php
    // Initialize the session
    session_start();
    
    // Unset all of the session variables
    $_SESSION["adminloggedin"] = false;
    
    // Redirect to login page
    header("location: ../../login.php");
    exit;
?>