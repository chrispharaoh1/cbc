<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Notification</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link href="css/sb-admin-2.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/style2.css">
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container"> <a class="navbar-brand" href="#">
      <h1 class="logo-title">Goods recieved and delivery notifications</h1>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

      </div>
    </div>
  </nav>
</header>
<h3 class='m-b-50 heading-line' style="margin-left:10%;margin-top:1%;">Notifications <i class='fa fa-bell text-muted'></i></h3>
<?php
        require("security3.php");  
                                    function time_elapsed_string($datetime, $full = true) {
                                    $now = new DateTime;
                                    $ago = new DateTime($datetime);
                                    $diff = $now->diff($ago);

                                    $diff->w = floor($diff->d / 7);
                                    $diff->d -= $diff->w * 7;

                                    $string = array(
                                    'y' => 'year',
                                    'm' => 'month',
                                    'w' => 'week',
                                    'd' => 'day',
                                    'h' => 'hour',
                                    'i' => 'minute',
                                    's' => 'second',
                                    );
                                    foreach ($string as $k => &$v) {
                                     if ($diff->$k) {
                                         $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                                        } else {
                                     unset($string[$k]);
                                     }
                                     }

                                    if (!$full) $string = array_slice($string, 0, 1);
                                    return $string ? implode(', ', $string) . ' ago' : 'just now';
                                    }

                                    //end of time format
                                     $noteCount = ""; 
                                     $pg = $_SESSION["projectID"];                           
                                    include('db_connection.php');

                                    
                                    
                                    $today = date("D M j G:i:s T Y");
                                    //Query for retrieving recent LAST row in the database
                                    $sql_query = "SELECT * FROM orders WHERE status > 2 AND projectCode='$pg' ORDER BY requisition_number DESC LIMIT 1000"; 
                                    $query_result = mysqli_query($MySQLDb,$sql_query);

                                    
                                    if(mysqli_num_rows($query_result)>0){

                                        $noteCount = mysqli_num_rows($query_result);
                                         if($noteCount>=4){
                                            $noteCount = "3+";
                                         }
                                  
 
                                         while($row0 = $query_result->fetch_assoc()){

                                          $gettime = $row0["deliverytime"];
                                          $recived = $row0["recievedtime"];
                                          
                                          $time = time_elapsed_string($gettime);
                                          $recivedtime = time_elapsed_string($recived);

                                            
                                          if($row0['recieve_note'] !== ""){
                                            echo "
                                            <section class='section-10' style='padding-right:10px;'>
                                            <div class='container' >  
                                              <div class='notification-ui_dd-content'>
                                                <div class='notification-list notification-list--unread'>
                                                  <div class='notification-list_content'>
                                                  <div class='icon-circle bg-primary' >
                                                  <i class='fas fa-file-alt text-white'></i>
                                                    </div>
                                                    <div class='notification-list_detail' style='padding-left:10px;'>
                                                      <p><b>Goods recieved note</b></p>                                               
                                                      <p class='text-muted' >".$row0['recieve_note']."</p>
                                                      <p class='text-muted'><small>$recivedtime</small></p>
                                                      
                                                    </div>
                                                  </div>        
                                                </div>
                                              </div>
                                            </div>
                                          </section>
                                            ";
                                        }else{}
    

                                            echo "
                                            <section class='section-10' style='padding-right:10px;'>
                                            <div class='container' >  
                                              <div class='notification-ui_dd-content'>
                                                <div class='notification-list notification-list--unread'>
                                                  <div class='notification-list_content'>
                                                  <div class='icon-circle bg-primary' >
                                                  <i class='fas fa-file-alt text-white'></i>
                                                    </div>
                                                    <div class='notification-list_detail' style='padding-left:10px;'>
                                                      <p><b>Delivery note</b></p>
                                                      <p class='text-muted' >".$row0['delivery_note']."</p>
                                                      <p class='text-muted'><small>$time</small></p>
                                                    </div>
                                                  </div>        
                                                </div>
                                              </div>
                                            </div>
                                          </section>                                         
                                            ";

                                         }
                                    }
                                ?>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>