<?php
include('db_connection.php');
     if(isset($_GET["id"])){
        $id = $_GET["id"];

        $sql = "DELETE FROM requested_items WHERE id = $id";
        $MySQLDb->query($sql);
    }
    
    header("Location: ForemanIndex1.php"); die();
?>

