<?php
session_start();
    //securing Managers files
    if($_SESSION["role"] == "procurement officer"){

    }
    else{
        header("Location: signin.php"); die();
    }

 
?>

