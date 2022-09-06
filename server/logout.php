<?php
    // Initialize the session
    session_start();
    
    // Unset all of the session variables
    $_SESSION['loggedin'] = false;
    
    // Destroy the session.
    session_destroy();
    
    // Redirect to login page
    header("location: ../login.php");
    exit;
?>