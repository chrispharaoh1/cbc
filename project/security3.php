<?php
session_start();
    //securing Managers files
    if($_SESSION["role"] == "engineer"){

    }
    else{
        header("Location: signin.php"); die();
    }

 
?>