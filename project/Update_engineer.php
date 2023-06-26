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
        $req_order = '1';
    } 
        
    
    if(isset($_POST["send"])){
        $contract_number = $_POST['contract'];
        $place_of_delivery = $_POST['place'];
        $date_required = $_POST['date_required'];
        $hidden = $_POST['hidden'];
        $todayDate = $_POST['todayDate'];
        $projectID = $_POST['projectID'];

        $fname = $_SESSION["firstName"];
        $lname = $_SESSION["sirname"];



        $employ_id =  $_SESSION["userID"];
        $order_status = "1"; // 1 meaning the request is not yet approve and sent by site engineer
        

        if(!empty($contract_number) || !empty($place_of_delivery) || !empty($date_required) || !empty($todayDate)){
            
            $time_now = date("h:i:sa");
            //$date_now = date("d-m-Y");
            $projectCode = $_SESSION["projectID"];
            
        
        
        //Inserting data into oder database and setting status to one
        //$insert = "INSERT INTO `orders`(`requisition_number`, `order_date`, `employee_id`, `order_time`, `status`, `contract_number`, `place_of_delivery`, `date_required`,`projectID`,`projectCode`,`fullpgcode`) VALUES('$req_order','$todayDate',' $employ_id','$time_now','$order_status','$contract_number','$place_of_delivery','$date_required','$projectID','$projectCode','$hidden')";
        $insert = "UPDATE `orders` SET `requisition_number`='$projectID',`orderId`='$contract_number',`order_date`='$todayDate',`contract_number`='$contract_number',`place_of_delivery`='$place_of_delivery',`issued_by`='$fname.$lname',`date_required`='$date_required',`status`= '2' WHERE `requisition_number` = $projectID";
        //updating requested items table, inserting order number to each row where status is equal to 1
        $update = "UPDATE requested_items SET requisition_number='$projectID', status1='2' WHERE  status1=1";

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