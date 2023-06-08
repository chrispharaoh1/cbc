<?php 
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
    $id = "";

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        // if its a get request and there is no ID
            if(!isset($_GET["id"])){
                header("Location: manageuser.php"); die();
            }

            $id = $_GET["id"];

            $query = "SELECT * FROM employee WHERE id = $id ";
            $run = mysqli_query($MySQLDb,$query); 

            $row = $run->fetch_assoc();

            if(!$row ){
               // header("Location: ForemanIndex1.php"); die();
            }

            $fname = $row["firstName"];
            $lname  = $row["lastName"];
            $employmentID = $row["employeeNumber"];
            $phoneNumber = $row["phoneNumber"];
            $userName = $row["user_name"];
            $email = $row["email"];

    }


    elseif(isset($_POST['submit'])){

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
        $id = $_GET["id"];


        if(empty($fname)){
            $errors['f'] = "First Name is required";
        }

        if(empty($lname)){
            $errors['l'] = "Sirname is required";
        }

        if($password1 != $password2){
            $errors['pas'] = "Please use a matching password";
        }

        if(empty($role)){
            $errors['r'] = "Please select role";
        }


       
        if(empty($phoneNumber)){
            $errors['p'] = "Phone number is required";
        }


        if(empty($userName)){
            $errors['u'] = "Username is required";
        }

        if(!empty($email)){

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['em'] = "Invalid email format";
              }
        }

        
        if(empty($employmentID)){
            $errors['e'] = "Employement ID is required";

        }
  
        
    if(count($errors) == 0){
        if(!empty($fname) && !empty($lname)  && !empty($employmentID) && !empty($phoneNumber) && !empty($userName) && !empty($password1) && !empty($password2) && !empty($role)){
            if($password1 == $password2){
                $pasword_hash = md5($password1);

                $query = "UPDATE employee SET employeeNumber='$employmentID', firstName='$fname', lastName='$lname', phoneNumber='$phoneNumber', email='$email', role ='$role1', user_name='$userName'  WHERE  id ='$id'";
                
                $run = mysqli_query($MySQLDb,$query);
                
                if($run){

                    header("Location: manageuser.php"); die();                                     
                }else{
                    echo "<script>
                        alert('Failed to update, Try again');
                    </script>";
                    // echo $MySQLDb->error;
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

    <title>Edit user</title>

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
#card1{
    padding-top: 2% !important;
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

                 <!-- End of Topbar -->

                <!-- Begin Page Content -->
           
 <div class="col-xl-8 col-lg-7" id="card1">
 <div class="card shadow mb-4" style="width:100%">
    
    <div class="p-5">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Edit emloyee information</h1>
        </div>
        
        <form class="user" method="post" id="formId">
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">

                <input type="hidden" name="id" value="<?php echo $id;?>">

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
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
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