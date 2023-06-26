<?php 
    require("security3.php"); 
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

            $_SESSION["order"] = $_GET['order'];
            $orderNumber = $_SESSION["order"];
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
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
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
                <div class="container-fluid">

                <?php
                     include('db_connection.php');

                        $_midleNumber ="";

                       //Query for retrieving recent LAST row in the database
                        $sql_query = "SELECT * FROM orders WHERE requisition_number=$orderNumber"; 
                        $query_result = mysqli_query($MySQLDb,$sql_query);
    

                        if(mysqli_num_rows($query_result)>0){
                              $row = $query_result->fetch_assoc();
                              $orderNumber = $row["requisition_number"];
                              $today = $row["order_time"];
                              $daterequired = $row["date_required"];
                              $deliveryPlace = $row["place_of_delivery"]; 
                              $Contract = $row["contract_number"];
                           } 

                 ?>          
            <form  method="POST" action="Update_engineer.php">
                
                <input type="hidden" name="projectID" value="<?php echo $orderNumber;?>"></input>

                <input type="number" style="text-align: center !important; background-color:#c8cbcf; color:red" class="form-control form-control-user"
                id="exampleInputPassword" name="projectcode" value="<?php echo $orderNumber;?>" ></input>
                
                &#160 &#160 &#160 &#160 &#160
                <div class="row" id="top-ele">
                <div class="form-group">
                <input type="number" value="<?php echo $Contract ;?>" class="form-control form-control-user"
                id="exampleInputPassword" name="contract" placeholder="CONTRACT No."></input>
                </div>

                &#160 &#160 &#160 &#160 &#160
                <div class="form-group">
                <input type="text" value="<?php echo $deliveryPlace;?>" class="form-control form-control-user"
                id="exampleInputPassword" name="place" placeholder="Place of delivery"></input>
                </div>

              
           
                &#160 &#160 &#160 &#160 &#160
                <div class="form-group">  
                <input type="text" class="form-control form-control-user"
                id="exampleInputPassword" onfocus="(this.type='date')" name="date_required" value="<?php echo $daterequired;?>" placeholder="Date required"></input>
                </div>

                &#160 &#160 &#160 &#160 &#160
                <div class="form-group">  
                <input type="text" class="form-control form-control-user"
                id="exampleInputPassword" name="todayDate" value="<?php echo $today;?>" onfocus="(this.type='date')" placeholder="Todays date"></input>
                </div>

                &#160 &#160 &#160 &#160 &#160
                <td> <button type="submit" name="send" class="btn btn-primary"><i class="far fa-paper-plane"></i>&#160 Send request</button></td> 


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

               $query = "SELECT * FROM `requested_items` WHERE status1=1 AND employee_id = $id OR requisition_number=$orderNumber";
               $count = "SELECT COUNT(*) FROM requested_items WHERE status1=1";

               $result = mysqli_query($MySQLDb,$query);
               $countResult = mysqli_query($MySQLDb,$count);

            if($result ){
               while($row = $result->fetch_assoc() ){

                 echo  "<tr>
                            <td>". $row["quantity"] ."</td>
                            <td style='text-align:left'>".$row["description1"]."</td>
                            <td>".$row["remarks"]."</td>
                            <td style='width:20%;' class='btn-delete'>
                               <a  href='Engineer_item_edit.php?id=$row[id]' style='background: #009879' class='btn btn-primary'><i class='fas fa-pen'></i></a>
                               &#160
                               <a href='Viewandedit_delete.php?id=$row[id]' id='delete' style='background: red' class='btn btn-primary'><i class='fas fa-trash'></i></a>
                            </td>
                   </tr>";
               
                }
            }
          ?>
        </tbody>
                
      </table>



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
   <form  method="POST" action="Viewandedit_process.php">
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
       <form  method="POST" action="Foreman_Add_item.php">
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

<!-- modal 3 for Deleting  user-->
<div class="modal" tabindex="-1" id="myModal3">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
           <div class="modal-body">
           <form  method="POST" action="Foreman_Delete.php">

            <p>Are you sure you want to delete this item?</p>
            
         </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" style="background: #eb927c" data-dismiss="modal">Cancel</button>
        <button type="submit" name="submit" style="background:red"class="btn btn-primary"><i class="fas fa-trash"></i> &#160 Delete</button>
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