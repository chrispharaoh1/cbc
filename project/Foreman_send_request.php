<?php
    session_start(); 
    include('db_connection.php');

    $project_ses_code = "";
    $projectID = "";

    if($_SESSION["userID"]){
        $project_ses_code = $_SESSION["projectID"];
     }

     $projects = "SELECT * FROM `project` WHERE `code` = '$project_ses_code'";
     if($queryRun = mysqli_query($MySQLDb,$projects)){
        $myRow = $queryRun->fetch_assoc();
        $projectID = $myRow['id'];
     }

    //Query for retrieving recent LAST row in the database
    $sql_query = "SELECT * FROM orders ORDER BY requisition_number DESC LIMIT 1"; 
    $query_result = mysqli_query($MySQLDb,$sql_query);
    

    if(mysqli_num_rows($query_result)>0){
        $row = $query_result->fetch_assoc();
        $req_order = $row["requisition_number"] + 1;
    }   else{
        $req_order = '17644';
    } 
        
    
    if(isset($_POST["send"])){
        $contract_number = $_POST['contract'];
        $place_of_delivery = $_POST['place'];
        $date_required = $_POST['date_required'];



        $employ_id =  $_SESSION["userID"];
        $order_status = "1"; // 1 meaning the request is not yet approve and sent by site engineer
        

        if(!empty($contract_number) || !empty($place_of_delivery) || !empty($date_required)){
            
            $time_now = date("h:i:sa");
            $date_now = date("d-m-Y");
        
        
        //Inserting data into oder database and setting status to one
        $insert = "INSERT INTO `orders`(`requisition_number`, `order_date`, `employee_id`, `order_time`, `status`, `contract_number`, `place_of_delivery`, `date_required`,`projectID`) VALUES('$req_order','$date_now',' $employ_id','$time_now','$order_status','$contract_number','$place_of_delivery','$date_required','$projectID')";
        //updating requested items table, inserting order number to each row where status is equal to 1
        $update = "UPDATE requested_items SET requisition_number='$req_order', status1='2' WHERE  status1=1";

        $run = mysqli_query($MySQLDb,$insert );
        $run2 = mysqli_query($MySQLDb,$update );

        if($run && $run2){
            header("Location: ForemanOrderSuccess.php"); die();
            echo "Success";
        }else {
            $errMess = 'Error sending';
        }

            
        } else {
            
            echo '<script>alert("")</script>';
                       
        }

        
    }
?>