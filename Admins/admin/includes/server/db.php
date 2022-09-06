<?php
    $conn = new mysqli("localhost", "root", "", "draft");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    function trim_data ($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>