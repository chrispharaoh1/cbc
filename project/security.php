<?php
session_start();
    //securing Managers files
    if($_SESSION["role"] == "manager"){

    }
    else{
        header("Location: signin.php"); die();
    }

 
?>