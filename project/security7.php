<?php
session_start();
    //securing Managers files
    if($_SESSION["role"] == "engineer" || $_SESSION["role"] == "supervisor" || $_SESSION["role"] == "foreman" ){

    }
    else{
        header("Location: signin.php"); die();
    }

 
?>