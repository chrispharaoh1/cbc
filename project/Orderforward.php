<?php
include('db_connection.php');
     if(isset($_GET["order"])){
        $order = $_GET["order"];

        $sql = "UPDATE `orders` SET `status`= 2 WHERE `requisition_number` = $order";//"DELETE FROM orders WHERE requisition_number = $order";

        $MySQLDb->query($sql);
    }
    
    header("Location: EngineerIndex.php"); die();
?>