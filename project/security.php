<?php
session_start();
    if(!$_SESSION["userID"]){
        header("Location: signin.php"); die();
    }
?>