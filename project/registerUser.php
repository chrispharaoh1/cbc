<?php 
 require("security.php");
    include('db_connection.php'); 

    $Err = "";
    $modal = "";

    $fname = "";
    $lname = "";
    $employmentID = "";
    $phoneNumber = "";
    $userName = "";
    $email = "";
    $password1 = "";
    $password2 = "";

    if(isset($_POST['submit'])){

        $errors = array();

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $employmentID = $_POST['employmentID'];
        $phoneNumber = $_POST['phone'];
        $userName  = $_POST['username'];
        $email = $_POST['email'];
        $password1 = $_POST['pass1'];
        $password2 = $_POST['pass2'];
        $role = isset($_POST['position']);
        $role1 = $_POST['position'];


        if(empty($fname)){
            $errors['f'] = "First Name is required";
        }

        if(empty($lname)){
            $errors['l'] = "Sirname is required";
        }

        if(empty($password1)){
            $errors['pas'] = "Password is required";
        }

        if($password1 != $password2){
            $errors['pas'] = "Please use a matching password";
        }

        if(empty($role)){
            $errors['r'] = "Please select role";
        }


        $employmentQuery = "SELECT employeeNumber FROM employee WHERE employeeNumber='$employmentID'";
        $employRun = mysqli_query($MySQLDb,$employmentQuery);

        $phoneQry = "SELECT phoneNumber FROM employee WHERE phoneNumber=$phoneNumber'";
        $phoneRun = mysqli_query($MySQLDb,$phoneQry);

        $emailQuery = "SELECT email FROM employee WHERE email='$email'";
        $emailRun = mysqli_query($MySQLDb,$emailQuery);

        $userQuery = "SELECT user_name FROM employee WHERE user_name='$userName'";
        $userRun = mysqli_query($MySQLDb, $userQuery);

        if(empty($phoneNumber)){
            $errors['p'] = "Phone number is required";
        }elseif($phoneRun){
            if(mysqli_num_rows($phoneRun)>0){
                $errors['p'] = "User with that phone number already exist";
            }          
        }


        if(empty($userName)){
            $errors['u'] = "Username is required";
        }elseif ($userRun) {
            if(mysqli_num_rows($userRun)>0){
                $errors['u'] = "User with that username already exist";
            }           
        }

        if(!empty($email)){
            if($emailRun){
                if(mysqli_num_rows($emailRun)>0){
                    $errors['em'] = "User with that email already exist";
                }
               
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['em'] = "Invalid email format";
              }
        }

        
        if(empty($employmentID)){
            $errors['e'] = "Employement ID is required";

        }
        elseif($employRun){
            if(mysqli_num_rows($employRun)>0){
                $errors['e'] = "User with this ID already exist";
            }
            
        }
        
    if(count($errors) == 0){
        if(!empty($fname) && !empty($lname) && !empty($fname) && !empty($employmentID) && !empty($phoneNumber) && !empty($userName) && !empty($password1) && !empty($password2) && !empty($role)){
            if($password1 == $password2){
                $pasword_hash = md5($password1);

                $fullname = "$fname.$lname";

                $query = "INSERT INTO `employee`(`employeeNumber`, `firstName`, `projectId`, `lastName`, `phoneNumber`, `email`, `role`, `password`,`user_name`,`fullname`) VALUES ('$employmentID','$fname','','$lname','$phoneNumber','$email','$role1','$pasword_hash','$userName', '$fullname')";
                
                $run = mysqli_query($MySQLDb,$query);
                
                if($run){

                        $modal =  "ok" ;                                      
                }else{
                    $modal =  "err" ; 
                }

            }
         }
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

    <title>Register user</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>




    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">


    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
     @media (max-width: 1444px) {
        #card1{
          
            margin-left: 15%;
        }
     }

        @media (max-width: 768px) {
            #card1{
          
          margin-left: 1%;
      }
        }

        #err{
            text-align:center ;
        }

        .successModal {
	font-family: 'Varela Round', sans-serif;
}
.modal-confirm {		
	color: #434e65;
	width: 525px;
}
.modal-confirm .modal-content {
	padding: 20px;
	font-size: 16px;
	border-radius: 5px;
	border: none;
}
.modal-confirm .modal-header {
	background: #47c9a2;
	border-bottom: none;   
	position: relative;
	text-align: center;
	margin: -20px -20px 0;
	border-radius: 5px 5px 0 0;
	padding: 35px;
}
.modal-confirm h4 {
	text-align: center;
	font-size: 36px;
	margin: 10px 0;
}
.modal-confirm .form-control, .modal-confirm .btn {
	min-height: 40px;
	border-radius: 3px; 
}
.modal-confirm .close {
	position: absolute;
	top: 15px;
	right: 15px;
	color: #fff;
	text-shadow: none;
	opacity: 0.5;
}
.modal-confirm .close:hover {
	opacity: 0.8;
}
.modal-confirm .icon-box {
	color: #fff;		
	width: 95px;
	height: 95px;
	display: inline-block;
	border-radius: 50%;
	z-index: 9;
	border: 5px solid #fff;
	padding: 15px;
	text-align: center;
}
.modal-confirm .icon-box i {
	font-size: 64px;
	margin: -4px 0 0 -4px;
}
.modal-confirm.modal-dialog {
	margin-top: 80px;
}
.modal-confirm .btn, .modal-confirm .btn:active {
	color: #fff;
	border-radius: 4px;
	background: #eeb711 !important;
	text-decoration: none;
	transition: all 0.4s;
	line-height: normal;
	border-radius: 30px;
	margin-top: 10px;
	padding: 6px 20px;
	border: none;
}
.modal-confirm .btn:hover, .modal-confirm .btn:focus {
	background: #eda645 !important;
	outline: none;
}
.modal-confirm .btn span {
	margin: 1px 3px 0;
	float: left;
}
.modal-confirm .btn i {
	margin-left: 1px;
	font-size: 20px;
	float: right;
}
.trigger-btn {
	display: inline-block;
	margin: 100px auto;
}

    </style>
<script>

    
</script>

</head>

<body id="page-top">

<?php
    if($modal == "ok"){
   
            echo "<script type='text/javascript'>
            $('#myModal').fadeIn('show');
            </script>"; 
                                                              
    }

    elseif($modal == "err"){
        
        header("Location: 500err.php",true); die();

    }
    ?>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                   <i class="fas fa-city"></i>
                </div>
                <div class="sidebar-brand-text mx-3">CBC Contractors</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                <i class="fas fa-folder"></i>
                    <span>Projects</span></a>
            </li>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>User management</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Select Action:</h6>
                        <a class="collapse-item" href="registerUser.php">Register new user</a>
                        <a class="collapse-item" href="manageuser.php">Delete or edit user</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                LOGS
            </div>

            <!-- Nav Item - Charts -->
          
           <!-- Divider -->
          

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="AuditLogs.php">
                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Audit logs</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

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
                            <a class="nav-link dropdown-toggle" href="Manager_notification.php" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
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
$sql_query = "SELECT * FROM orders WHERE status > 2 ORDER BY requisition_number DESC LIMIT 3"; 
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
        <a class='dropdown-item d-flex align-items-center'href='Manager_notification.php'>
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
  
          <a class='dropdown-item d-flex align-items-center'href='Manager_notification.php'>
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
                           
                    <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            
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
                                <a class="dropdown-item" href="#">
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
           

 <div class="col-xl-8 col-lg-7" id="card1">
 <div class="card shadow mb-4" style="width:100%">
    
    <div class="p-5">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Register new employee!</h1>
        </div>
        
        <form class="user" method="post" id="formId">
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="fname" value="<?php echo $fname;?>" class="form-control form-control-user" id="exampleFirstName"
                        placeholder="First Name">
                </div>
                
                <div class="col-sm-6">
                    <input type="text" name="lname" value="<?php echo $lname;?>" class="form-control form-control-user" id="exampleLastName"
                        placeholder="Last Name">
                </div>
                <p style="color:red" id="err"><?php if(isset( $errors['f'])) echo $errors['f']; ?></p>
                <p style="color:red" id="err"><?php if(isset( $errors['l'])) echo $errors['l']; ?></p>
            </div>
            <p style="color:red" id="err"><?php echo $Err;?><p>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="employmentID" value="<?php echo $employmentID;?>" class="form-control form-control-user" id="exampleFirstName"
                        placeholder="Employment ID">
                </div>
                
                <div class="col-sm-6">
                    <input type="phone" name="phone" value="<?php echo $phoneNumber;?>" class="form-control form-control-user" id="exampleLastName"
                      name="phone"  placeholder="Phone number">
                </div>
            </div>
            <p style="color:red" id="err"><?php if(isset( $errors['e'])) echo $errors['e']; ?></p>
            <p style="color:red" id="err"><?php if(isset( $errors['p'])) echo $errors['p']; ?></p>

            <div class="form-group">
                <input type="username" name="username" value="<?php echo $userName;?>" class="form-control form-control-user" id="exampleInputEmail"
                    placeholder="Username">
            </div>
            <p style="color:red" id="err"><?php if(isset( $errors['u'])) echo $errors['u']; ?></p>

            <div class="form-group">
                <input type="email" value="<?php echo $email;?>" name="email"class="form-control form-control-user" id="exampleInputEmail"
                    placeholder="Email Address (Optional)">
            </div>
            <p style="color:red" id="err"><?php if(isset( $errors['em'])) echo $errors['em']; ?></p>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" value="<?php echo $password1;?>" name="pass1" class="form-control form-control-user"
                        id="exampleInputPassword" placeholder="Password">
                </div>
                
                <div class="col-sm-6">
                    <input type="password" name="pass2" value="<?php echo $password2;?>" class="form-control form-control-user"
                        id="exampleRepeatPassword" placeholder="Repeat Password">
                </div>

                <p style="color:red" id="err"><?php if(isset( $errors['pas'])) echo $errors['pas']; ?></p>
            </div>
            <hr>
            <div class="text-center">
            <h4  style="font-size: 20 !mportant">Select position</h4>
            </div>
            <p style="color:red" id="err"><?php if(isset( $errors['r'])) echo $errors['r']; ?></p>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="position" id="inlineRadio1" value="managing director" />
            <label class="form-check-label" for="inlineRadio1">Managing Director</label>
            </div>

            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="position" id="inlineRadio1" value="manager" />
            <label class="form-check-label" for="inlineRadio1">Manager</label>
            </div>

            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="position" id="inlineRadio2" value="foreman" />
            <label class="form-check-label" for="inlineRadio2">Foreman</label>
            </div>

            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="position" id="inlineRadio3" value="supervisor" />
            <label class="form-check-label" for="inlineRadio3"> Supervisor</label>
            </div>

            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="position" id="inlineRadio3" value="engineer" />
            <label class="form-check-label" for="inlineRadio3">Engineer</label>
            </div>

            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="position" id="inlineRadio3" value="procurement officer" />
            <label class="form-check-label" for="inlineRadio3">Procurement officer</label>
            </div>

            
            <hr>
            <button type="submit" id="submit" data-toggle="modal" data-target="#myModal"name="submit" class="btn btn-primary btn-user btn-block">
                Register Account
            </button>
        </form>
        
    </div>
</div>

</div>
</div>


<!-- <start of success modal> -->


<div class="successModal"></div>
<!-- Modal HTML -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header justify-content-center">
				<div class="icon-box">
					<i class="material-icons">&#xE876;</i>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body text-center">
				<h4>Success!</h4>	
				<p>User created successfully.</p>
				<button class="btn btn-success" data-dismiss="modal"><span>Ok!</span> <i class="material-icons">&#xE5C8;</i></button>
			</div>
		</div>
	</div>
</div> 
</div> 
<!-- 
end of success modal -->


<!-- End form Content -->
</div>
<script src="js/script.js"></script>  
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->



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
                    <h5 class="modal-title" id="exampleModalLabel"> Log out?</h5>
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

     <div class="sect"> 
<div class="text-center">
	<!-- Button HTML (to Trigger Modal) -->
	
</div>

<!-- Modal HTML -->
<div id="errModal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header justify-content-center">
				<div class="icon-box">
					<i class="material-icons">&#xE5CD;</i>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body text-center">
				<h4>Ooops!</h4>	
				<p>Something went wrong. User was not created.</p>
				<button class="btn btn-success" data-dismiss="modal">Try Again</button>
			</div>
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