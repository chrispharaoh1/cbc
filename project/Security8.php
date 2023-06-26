<?php
    session_start();

    if($_SESSION["role"] == "managing director"){

    }
    else{
        header("Location: signin.php"); die();
    }

?>