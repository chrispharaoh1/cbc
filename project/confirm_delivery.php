<?php
include('db_connection.php');
     if(isset($_GET["order"])){
        $order = $_GET["order"];
        $id = $_GET["id"];

        $sql = "UPDATE `orders` SET `status`= 4 WHERE `requisition_number` = $order";//"DELETE FROM orders WHERE requisition_number = $order";

        $MySQLDb->query($sql);

    }
    
    header("Location: Procurement_ongoing.php?id=$id"); die();
?>