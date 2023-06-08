<?php
include('db_connection.php');
     if(isset($_GET["id"])){
        $id = $_GET["id"];

        $sql = "DELETE FROM employee WHERE id = $id";
        $MySQLDb->query($sql);
    }
    
    header("Location: manageuser.php"); die();
?>