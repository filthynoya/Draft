<?php
    session_start();

    if(!isset($_SESSION["adminloggedin"]) || $_SESSION["adminloggedin"] !== true){
        header("location: login.php");
        exit;
    }

    header("location: admin/index.php");
    exit;
?>