<?php
    $error = 0;
    $succ = 0;

    include 'db.php';
    
    if (isset($_GET["vkey"])) {
        $vkey = $_GET["vkey"];

        $rs = $conn->query ("SELECT activated, vkey FROM users WHERE activated=0 and vkey='$vkey'");

        if ($rs->num_rows == 1) {
            $conn->query ("UPDATE users SET activated=1 WHERE vkey='$vkey'");
            $succ = 1;
        } else {
            $error = 1;
        }
    } else {
        $error = 1;
    }

    if ($succ == 1) {
        echo 'Verified';
    } else if ($error == 1) {
        echo 'Error';
    } 
?>