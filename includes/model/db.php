<?php
   $connection = new mysqli(
        "localhost",
        "root",
        "arzeus1998",
        "study_control"
    );
    
    if ($connection->connect_errno) {
        console.log("Connect failed");
        exit();
    } 
?>

