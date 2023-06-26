<?php
include('db_connection.php');
     if(isset($_GET["id"])){
        $id = $_GET["id"];

        $sql = "UPDATE `project` SET `status`='2' WHERE id=$id";
        $MySQLDb->query($sql);
    }
    
    header("Location: index.php"); die();
?>