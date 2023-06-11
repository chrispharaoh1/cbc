<?php
session_start();
include('db_connection.php');
     if(isset($_GET["id"])){
        $id = $_GET["id"];
        $order = $_SESSION["order"];

        $sql = "DELETE FROM requested_items WHERE id = $id";
        
    }
    if($MySQLDb->query($sql)){

        
       header("Location: Viewandedit.php?order=$order"); die();
    }
    
?>

