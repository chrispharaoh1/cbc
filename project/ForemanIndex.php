<?php 
 require("security2.php"); 
 include('db_connection.php'); 
 $id = "";
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        $id = $_SESSION["userID"];
    }
     $query = "SELECT * FROM `requested_items` WHERE status1=1 AND employee_id = $id";
     $count = "SELECT COUNT(*) FROM requested_items WHERE status1=1";



     if ($rst = mysqli_query($MySQLDb,$query))  {
        if(mysqli_num_rows($rst)>0){
            header('Location: ForemanIndex1.php?id='.$id); die();
        }
              
     }
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
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

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
                        <a class="nav-link" href="Foreman_track_requet.php">
                        <i class="fas fa-clock"></i>
                        <span>Current orders</span></a>
                        </li>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

           <!-- Nav Item - Dashboard -->
           <li class="nav-item active">
           <a class="nav-link" href="ForemanPrevOders.php">
           <i class="fas fa-arrow-left"></i>
           <span>Previous orders</span></a>
           </li>

                       <!-- Divider -->
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
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
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
 $myid = $_SESSION["userID"];                          
include('db_connection.php');

//$time = time_elapsed_string('2023-06-20 02:02:35');
//Query for retrieving recent LAST row in the database
$sql_query = "SELECT * FROM orders WHERE status > 2 AND employee_id=$myid ORDER BY requisition_number DESC LIMIT 3"; 
$query_result = mysqli_query($MySQLDb,$sql_query);


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
        <a class='dropdown-item d-flex align-items-center'href='Foreman_notifcation.php'>
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
  
          <a class='dropdown-item d-flex align-items-center'href='Foreman_notifcation.php'>
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
?>



                                <a class="dropdown-item text-center small text-gray-500" href="Foreman_notifcation.php">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- <i class="fas fa-envelope fa-fw"></i>
                                
                                <span class="badge badge-danger badge-counter">7</span> -->
                            </a>
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

                             <!-- Illustrations -->
                             <div class="card shadow mb-4" >
                                <div class="card-body">
                                    <div class="text-center" >
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"  
                                            src="img/undraw_chilling_re_4iq9.svg" alt="...">
                                    </div>
                                    <div class="row">
                                        <span style="dislay:block;margin-left:auto;margin-right:auto;">
                                    <h5 style="text-align: center !impotant"> Start requesting new materials!!</h5>
                                    &#160 &#160 &#160 &#160
                                    <div class="my-2"></div>
                                    <a class="btn btn-success btn-icon-split">
                                    <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                    </span>
                                    <p><span data-toggle="modal" data-target="#myModal" class="text">Create new request</span></p>
                                    </a>
                                    </span>
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
   <form  method="POST" action="foreman_modal_process.php">
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
        <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-plus"></i>Add</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Log out?</h5>
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