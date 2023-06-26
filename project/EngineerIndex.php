<?php 
require("security3.php"); 
   // require("security3.php"); 
    include('db_connection.php'); 

        if($_SESSION["userID"]){
           $id = $_SESSION["userID"];
          $pgID = $_SESSION["projectID"];
        }
              
            $query = "SELECT * FROM `requested_items` WHERE status1=1 AND employee_id = $id";
            $count = "SELECT COUNT(*) FROM requested_items WHERE status1=1 AND employee_id = $id";        

            // if ($rst = mysqli_query($MySQLDb,$query))  {
            //     if(mysqli_num_rows($rst)<1){
            //          header('Location: ForemanIndex.php?id'.$id); die();
            //     }                
                    
            // }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Forman Home</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/mytable.css">
    

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <script type="text/javascript" src="js/main.js"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon rotate-n-15">
                   <i class="fas fa-city"></i>
                </div>
                <div class="sidebar-brand-text mx-3">CBC Contractors</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="">
                <i class="fas fa-building"></i>
                    <span>My work space</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

             <!-- Nav Item - Dashboard -->
             <li class="nav-item active">
            <a class="nav-link" href="Engine_track_request.php">
            <i class="fas fa-clock"></i>
            <span>Current orders</span></a>
            </li>

                       <!-- Divider -->
           <hr class="sidebar-divider my-0">

           
           <!-- Nav Item - Dashboard -->
           <li class="nav-item active">
           <a class="nav-link" href="EnginePrevOrder.php">
           <i class="fas fa-arrow-left"></i>
           <span>Previous orders</span></a>
           </li>

           <hr class="sidebar-divider my-0">


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="Engineer_notification.php" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <?php

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

//$time = time_elapsed_string('2023-06-20 02:02:35');
//Query for retrieving recent LAST row in the database
$sql_query = "SELECT * FROM orders WHERE status > 2 AND projectCode='$pg' ORDER BY requisition_number DESC LIMIT 3"; 
$query_result = mysqli_query($MySQLDb,$sql_query);

if($query_result){
if(mysqli_num_rows($query_result)>0){

    

    $noteCount = mysqli_num_rows($query_result);
     if($noteCount>=4){
        $noteCount = "3+";
     }



echo "
    <span class='badge badge-danger badge-counter'>$noteCount</span>
    </a>
    <!-- Dropdown - Alerts -->
    <div class='dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in'
    aria-labelledby='alertsDropdown'>
    <h6 class='dropdown-header'>
        Note Notification 
    </h6>
";

     while($row0 = $query_result->fetch_assoc()){
        $geime = $row0["recievedtime"];
        $gettime = $row0["deliverytime"];

        $time0 = time_elapsed_string($geime);
        $time = time_elapsed_string($gettime);

        echo "
        <a class='dropdown-item d-flex align-items-center'href='Engineer_notification.php'>
        <div class='mr-3'>
            <div class='icon-circle bg-primary'>
                <i class='fas fa-file-alt text-white'></i>
            </div>
        </div>
        <div>
            <div class='small text-gray-500'>$time</div>
            <span class='font-weight-bold'>".$row0['delivery_note']."</span>
            <span class='font-weight-bold'></span>
        </div>
    </a>
        ";
        
        if($row0['recieve_note'] !== ""){
            echo "
  
          <a class='dropdown-item d-flex align-items-center'href='Engineer_notification.php'>
        <div class='mr-3'>
            <div class='icon-circle bg-primary'>
                <i class='fas fa-file-alt text-white'></i>
            </div>
        </div>
        <div>
            <div class='small text-gray-500'>$time0</div>
            <span class='font-weight-bold'>".$row0['recieve_note']."</span>
            <span class='font-weight-bold'></span>
        </div>
    </a>
            ";
        }else{}
     }
    }
}
?>
   

                            </a>

                            <a class="dropdown-item text-center small text-gray-500" href="Engineer_notification.php">Show All Alerts</a>
                            </div>
                        </li>

                            
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">

                                

                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">

                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION["firstName"]." ".$_SESSION["sirname"]?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="Profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
 
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                <?php
                     include('db_connection.php');

                        $_midleNumber ="";

                       //Query for retrieving recent LAST row in the database
                        $sql_query = "SELECT * FROM orders ORDER BY requisition_number DESC LIMIT 1"; 
                        $query_result = mysqli_query($MySQLDb,$sql_query);
    

                        if(mysqli_num_rows($query_result)>0){
                              $row = $query_result->fetch_assoc();
                              $req_order = $row["requisition_number"] + 1;

                              if($row["requisition_number"] < 10 ){
                                $_midleNumber ="00";
                              }
                              elseif($row["requisition_number"] < 100 ){
                                $_midleNumber ="0";
                              }
                              else{
                                $_midleNumber ="";
                              }
                           }   else{
                               $req_order = '1';
                               $_midleNumber ="00";
                           } 

                 ?>          
            <form  method="POST" action="Foreman_send_request.php">
                
                 
                <input type="number" style="text-align: center !important; background-color:#c8cbcf; color:red" class="form-control form-control-user"
                id="exampleInputPassword" name="projectcode" value="<?php echo $req_order;?>" ></input>

                <input type="hidden" name="hidden" value="<?php echo $pgID."".$_midleNumber.$req_order?>"></input>
                
                &#160 &#160 &#160 &#160 &#160
                <div class="row" id="top-ele">
                <div class="form-group">
                <input type="number"  class="form-control form-control-user"
                id="exampleInputPassword" name="contract" placeholder="CONTRACT No."></input>
                </div>

                &#160 &#160 &#160 &#160 &#160
                <div class="form-group">
                <input type="text" class="form-control form-control-user"
                id="exampleInputPassword" name="place" placeholder="Place of delivery"></input>
                </div>

              
           
                &#160 &#160 &#160 &#160 &#160
                <div class="form-group">  
                <input type="text" class="form-control form-control-user"
                id="exampleInputPassword" onfocus="(this.type='date')" name="date_required" placeholder="Date required"></input>
                </div>

                &#160 &#160 &#160 &#160 &#160
                <td> <button type="submit" name="send" class="btn btn-primary"><i class="far fa-paper-plane"></i>&#160 Send request</button></td> 
                           
                <div class="row">
                &#160
                <div class="form-group">  
                <input type="text" class="form-control form-control-user"
                id="exampleInputPassword" name="todayDate" onfocus="(this.type='date')" placeholder="Todays date"></input>
                </div>
                </div>
            </form>
         </div>
                           
        <table class="content-tablee" style="widith: fit-content !important">
        <tbody>
          <tr class="tablee">        
            <td> <button name="submit"  data-toggle="modal" data-target="#myModal" class="btn btn-primary"><i class="fas fa-plus"></i>&#160 Add new item</button></td>   
          </tr>
          </tbody>
       </table>
     

    <table class="content-table" style="width:100%">
        <thead>
          <tr>
            <th style="width:10%">Quantity</th>
            <th style="width:40%">Description</th>
            <th style="width:20%">Remarks</th>
            <th style="width:20%">Action</th>
          </tr>
        </thead>
        <tbody>

            <!-- PHP code to display data in the table -->
            <?php 
               include('db_connection.php'); 

               $query = "SELECT * FROM `requested_items` WHERE status1=1 AND employee_id = $id";
               $count = "SELECT COUNT(*) FROM requested_items WHERE status1=1";

               $result = mysqli_query($MySQLDb,$query);
               $countResult = mysqli_query($MySQLDb,$count);

               while($row = $result->fetch_assoc() ){

                 echo  "<tr>
                            <td>". $row["quantity"] ."</td>
                            <td style='text-align:left'>".$row["description1"]."</td>
                            <td>".$row["remarks"]."</td>
                            <td style='width:20%;' class='btn-delete'>
                               <a  href='Foreman_edit.php?id=$row[id]' style='background: #009879' class='btn btn-primary'><i class='fas fa-pen'></i></a>
                               &#160
                               <a href='Engineer_delete.php?id=$row[id]' style='background: red' class='btn btn-primary'><i class='fas fa-trash'></i></a>
                            </td>
                   </tr>";
               
                }
          ?>
        </tbody>

      </table>


      <div class='row'>
             <!-- DataTales Example -->
            <div class="card shadow mb-4" style="display:block; margin:auto;">
                <div class="card-header py-3">
                    <h4 class="text-gray-900" style="text-align:center">Current requsitions that requires your attention</h4>
                </div>
            <div class="card-body">






      <?php 
      
                    include('db_connection.php'); 

                    $query = "SELECT * FROM `orders` WHERE status = 1 AND projectCode = '$pgID'";
                    $status = "SELECT status FROM `orders` where status < 5";

                    $result_step = mysqli_query($MySQLDb,$query);


                    //$countResult = mysqli_query($MySQLDb,$count);
                    if($result = mysqli_query($MySQLDb,$query)){ 
                        //$row1 = $result->fetch_assoc();
                        

                        while($row = $result->fetch_assoc() ){ 

                           if($row["status"] == '1' ){
                            $currentStage ="20%";
                            $perMessage = "Stage 2/6";
                            $messageName = "Waiting your approval";
                            
                            $_note = $row["noteMessage"];

                            if($_note != null){
                                
                                
                                echo "
                                <script>
                                    var fade = document.getElementById('fade');
                                    fade.style.display='block';
                                </script>
                                ";
                            }
                            else{
                                
                                $_note = "Not yet rejected";
                                echo "
                                <script>
                                    var fade = document.getElementById('fade');
                                    fade.style.display='none';
                                </script>
                                ";
                            }
                            
                
                        echo  "
                                <div class='row' id='report-wraper'>


                                <h2 style='margin:auto'>Requisition ID: ". $row["fullpgcode"] ."</h2>

                                 <table class='content-table' style='width:100%'>
                                    <thead >
                                        <tr class='bg-gradient-info'>
                                            <th >Order No.</th>
                                            <th style='text-align:center'>Contract No.</th>
                                            <th style='text-align:center'>Ordered by</th>
                                            <th style='text-align:right'>Issue Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                         <!-- PHP code to display data in the table -->


                                        <tr>
                                            <td><h6>". $row["requisition_number"] ."</h6></td>
                                            <td style='text-align:center'><h6>".$row["contract_number"]."</h6></td>
                                            <td style='text-align:center'><h6>".$row["employee_id"]."</h6></td>
                                            <td style='text-align:right'><h6>".$row["order_date"]."</h6></td>
                                        </tr>   
                                        <tr>
                                            <td colspan='4'> 
                                                <h6 style='text-align:center'>Current stage: <i  class='fas fa-clock'></i><span style='font-weight:bold'>" .$messageName."</span><h6>
                                                <div class='progress' style='height: 20px;'>
                                                <div class='progress-bar bg-warning' role='progressbar' style='width: ".$currentStage."' aria-valuenow='25' aria-valuemin='0' aria-valuemax='100'>".$perMessage."</div>
                                                </div>
                                            </td>  
                                        </tr> 
                                        <tr >
                                            <td style='display:block;margin-right:10%;'>
                                               
                                            </td>

                                            <td> 
                                                <a data-toggle='modal' data-target='#myModal3' class='btn btn-info btn-sm'  id='fade' style='background:red;padding-left:2%;'>Rejection note</a>
                                                &#160 &#160 &#160 &#160 &#160
                                                <a href='Viewandedit.php?order=".$row["requisition_number"]."' class='btn btn-info btn-sm'>View & Edit</a>
                                            </td>
                                            <td>
                                                <a href='OderDelete.php?order=".$row["requisition_number"]."' class='btn btn-warning btn-sm'>Delete</a>
                                            </td>
                                            <td>
                                                <a href='Orderforward.php?order=".$row["requisition_number"]."' class='btn btn-success btn-sm'>Foward</a>
                                            </td>
                                        </tr>
                                    </tbody>

                                    </table>

                            </div>
                            <hr>

                            <!-- modal 3 for Deleting  user-->
                        <div class='modal' tabindex='-1' id='myModal3'>
                            <div class='modal-dialog'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title'>Rejection </h5>
                                        <button type='button' class='btn-close' data-dismiss='modal' aria-label='Close'></button>
                                    </div>
                                <div class='modal-body'>
           
                                <p>$_note;</p>
                           </div>
                     <div class='modal-footer'>
            <button type='button' class='btn btn-secondary' style='background: #eb927c' data-dismiss='modal'>Ok</button>     
      </div>
    </div>
</div>
</div>

                            &#160 &#160 &#160&#160&#160&#160 &#160";
                 }
                }
            }
             ?>

        </div>
    </div>
</div>









<div class="row">
<!-- modal -->
<div class="modal" tabindex="-1" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add new material</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
   <form  method="POST" action="Engineer_edit.php">
        <div class="form-outline">
        <textarea type="text" id="formControlDefault" class="form-control" name="item-name"  placeholder="MATERIAL NAME (DESCRIPTION)"></textarea>
        </div>
        <hr>
        <div class="form-outline">
        <input type="number" id="formControlDefault" name="item-qty" class="form-control"  placeholder="QUANTITY"/>
        </div>
        <hr>

        <div class="form-outline">
        <input type="text" id="formControlDefault" name="unit" class="form-control"  placeholder="UNIT"></input>
        </div>
        <hr>

        <div class="form-outline">
        <input type="text area" id="formControlDefault" name="remarks"class="form-control"  placeholder="REMARKS"/>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" style="background: #eb927c" data-dismiss="modal">Cancel</button>
        <button type="Reset" class="btn btn-secondary" >Reset</button>
        <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-plus"></i>Add</button>
      </div>
    </div>
</form>
  </div>
</div>

<!-- modal 2 for UPDATING -->
<div class="modal" tabindex="-1" id="myModal2">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update material</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
       </div>
        <div class="modal-body">
       <form  method="POST" action="Engineer_edit.php">
        <div class="form-outline">
        <textarea type="text" id="formControlDefault" class="form-control" name="item-name"  placeholder="MATERIAL NAME (DESCRIPTION)"></textarea>
        </div>
        <hr>
        <div class="form-outline">
        <input type="number" id="formControlDefault" name="item-qty" class="form-control"  placeholder="QUANTITY"/>
        </div>
        <hr>
        <div class="form-outline">
        <input type="text" id="formControlDefault" name="unit" class="form-control"  placeholder="UNIT"/>
        </div>
        <hr>
        <div class="form-outline">
        <input type="text area" id="formControlDefault" name="remarks"class="form-control"  placeholder="REMARKS"/>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" style="background: #eb927c" data-dismiss="modal">Cancel</button>
        <button type="Reset" class="btn btn-secondary" >Reset</button>
        <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-save"></i> &#160 Save</button>
      </div>
    </div>
</form>
  </div>
</div>


<!-- Pie Chart -->
<div class="col-xl-4 col-lg-5">

</div>
</div>

        </div>
                <!-- /.container-fluid -->           

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; city building contractors 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Log Out?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure you want to log out?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="logout.php" method="post">
                         <button type="submit" name="logout" class="btn btn-primary" >Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>