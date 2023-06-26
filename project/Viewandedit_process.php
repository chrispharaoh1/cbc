<?php
session_start(); 
include('db_connection.php');

if(isset($_POST['submit'])){ //if form is submitted
  if(!empty($_POST['item-name']) && !empty($_POST['item-qty']) && !empty($_POST['item-qty'])){
    $id = $_SESSION["userID"];
    $description = $_POST['item-name'];
    $quantity = $_POST['item-qty'];
    $remarks = $_POST['remarks'];
    $unit = $_POST['unit'];
    $order = $_SESSION["order"];



    $query = "INSERT INTO `requested_items` (`remarks`, `quantity`, `description1`, `status1`, `employee_id`, `L.P.O. No`, `D/NOTE No.`,`unit`) VALUES ('$remarks','$quantity','$description','1','$id','','','$unit')"; 
               

    $run = mysqli_query($MySQLDb,$query);  
    
    if($run){
        header('Location: Viewandedit.php?order='.$order); die();
    }
  }

}
?>