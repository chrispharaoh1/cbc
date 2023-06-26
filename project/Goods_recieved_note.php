<?php 
   require("security7.php");

   include('db_connection.php');

   if(isset($_POST["submit"])){
      $vehicleN = $MySQLDb -> real_escape_string($_POST["vehicle"]);
      $supplier = $MySQLDb -> real_escape_string($_POST["supplier"]);
      $LPONumber = $MySQLDb -> real_escape_string($_POST["lpono"]);
      $DnoteNumber = $MySQLDb -> real_escape_string($_POST["dnote"]); 
      $DateRecieved = $MySQLDb -> real_escape_string($_POST["date"]);
      $remarks = $MySQLDb -> real_escape_string($_POST["remarks"]);
      $today = date("D M j G:i:s T Y");

      $name = $_SESSION["firstName"]." ".$_SESSION["sirname"];
      $order = $_GET["order"];

        if(!empty($vehicleN) && !empty($supplier) && !empty($LPONumber) && !empty($DateRecieved)){
            
            $query = "UPDATE `orders` SET `status`='5',`recieved_by`='$name',`recieved_date`='$DateRecieved',`vehicle_number`='$vehicleN',`suppliers`='$supplier',`lpo`='$LPONumber',`dnote`='$DnoteNumber',`recieve_note`='$remarks',recievedtime='$today' WHERE requisition_number='$order'";
            $run = $MySQLDb -> query($query);

            if($run){
                
                header("Location: Engine_track_request.php"); die();
            }
            else{

                echo "
                        <script>
                            alert('Failed to submit, Try again');
                        </script>
                     ";
            }
        }
      
      
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body class="bg-gray-800">
 
    
                <!-- Begin Page Content -->
                <div class="container-fluid">
                   
                  
                <br>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary" style="text-align:center">ALL RQUESTED ITEMS FOR THIS REQUISITION</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Quantity</th>
                                            <th>Description</th>
                                            <th>Unit</th>
                                            <th>Remarks</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>

                                    <?php 

                                        $order = $_GET["order"];
                                        include('db_connection.php'); 

                                        $query = "SELECT * FROM requested_items WHERE requisition_number='$order'";
                                        
                                    
                                        if($result = mysqli_query($MySQLDb,$query)){
                                            while($row = $result->fetch_assoc() ){
                                                echo" <tr>
                                                     <td>".$row["quantity"]."</td>
                                                     <td>".$row["description1"]."</td>
                                                     <td>".$row["unit"]."</td>
                                                     <td>".$row["remarks"]."</td>
                                                  
                                                 </tr>";
                                                 }
                                        }


                                        ?>
                                    </tbody>
                                </table>

                                
                            </div>
                        </div>
                    </div>


 <div class="card shadow mb-10" style="display:block;margin-left:auto;margin-right:auto; width:80%">
    
    <div class="p-5">
        <div class="text-center">
            
        </div>
        
        <form class="user" method="post" id="formId">
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="vehicle" class="form-control form-control-user" id="exampleFirstName"
                        placeholder="Vehicle number" required>
                </div>
                
                <div class="col-sm-6">
                    <input type="text" name="supplier"  class="form-control form-control-user" id="exampleLastName"
                        placeholder="Supplier" required>
                </div>

            </div>
            
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="lpono"  class="form-control form-control-user" id="exampleFirstName"
                        placeholder="L.P.O. No." required>
                </div>
                
                <div class="col-sm-6">
                    <input type="text" name="dnote"  class="form-control form-control-user" id="exampleLastName"
                      name="phone"  placeholder="D/NOTE No." required>
                </div>
            </div>
            

            <div class="form-group">
                <input type="text" name="date" onfocus="(this.type='date')" class="form-control form-control-user" id="exampleInputEmail"
                    placeholder="Date recieved" required>
            </div>
           

            <div class="form-group">
                <input type="text"  name="remarks"class="form-control form-control-user" id="exampleInputEmail"
                    placeholder="Remarks">
            </div>

            
            <hr>
            <button type="submit" id="submit" data-toggle="modal" data-target="#myModal"name="submit" class="btn btn-primary btn-user btn-block">
                Submit Note
            </button>
        </form>
        
    </div>
</div>

</div>

                </div>

</body>
</html>