<?php 
    require("security.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
 
    
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

                </div>

</body>
</html>