<?php
include('db_connection.php');
require("security3.php");

    $description = "";
    $quantity = "";
    $remarks ="";
    $id ="";
    $order = $_SESSION["order"];


    $errorMessage = "";
    $successMessage = "";

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        // if its a get request and there is no ID
            if(!isset($_GET["id"])){
                header("Location: Viewandedit.php"); die();
            }

            $id = $_GET["id"];

            $query = "SELECT * FROM requested_items WHERE id = $id ";
            $run = mysqli_query($MySQLDb,$query); 

            $row = $run->fetch_assoc();

            if(!$row ){
               // header("Location: ForemanIndex1.php"); die();
            }

            $description = $row["description1"];
            $quantity = $row["quantity"];
            $remarks = $row["remarks"];
    }
    //if its a posit requet, add to the server
    else{

        $description = $_POST["description"];
        $quantity = $_POST["qty"];
        $remarks = $_POST["remarks"];
        $id = $_GET["id"];

        do{
            if(empty($description) || empty($quantity) || empty($remarks) ){
                $errorMessage = 'All fields are mandotory';
                break;
            }   
            
            $update = "UPDATE requested_items SET remarks='$remarks', quantity='$quantity', description1='$description' WHERE  id='$id'";


            $result = mysqli_query($MySQLDb,$update);
            if(!$result){
                $errorMessage = 'Invalid data'. $MySQLDb->error;
                break;
            }

            $successMessage = "Changes saved successfuly!";
            header("Location: Viewandedit.php?order=$order"); die();

         }while(true);

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/mytable.css">
</head>
<body class="main-boday">
    <div class="card-1" >
    <div class="container my-5">
        <h2>Edit data</h2>
        
        <?php
            if(!empty($errorMessage)){

                echo "
                    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>$errorMessage</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' arial-babel='Close'></button>
                    </div>
                ";
            }
        ?>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Description</label>
                    <div class="col-sm-6">
                        <input type="textarea" class="form-control" name="description" value="<?php echo $description;?>">
                    </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Quantity</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" name="qty" value="<?php echo $quantity;?>">
                    </div>
            </div>

            <div class="row mb-3">
                <label  class="col-sm-3 col-form-label">Remarks</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="remarks" value="<?php echo $remarks;?>">
                    </div>
            </div>


            <?php
            if(!empty($successMessage)){

                echo "
                    <div class='row mb-3'>
                        <div class='offset-sm-3 col-sm-6'>
                            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' arial-babel='Close'></button>
                            </div>
                        </div>    
                  </div>
                  ";
            }
        ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary" name="submit" >Save</button>
                </div>
                    &#160
                <div class="col-sm-3 d-grid"> 
               <a href="Viewandedit.php?order=<?php echo $order?>" class="btn btn-outline-primary" role="button" >Cancel</a>
             </div>
            </div>
        </form>
    </div>
 </div>
</body>
</html>