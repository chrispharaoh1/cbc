<?php
session_start();
include('db_connection.php');
     if(isset($_GET["order"])){
        $order = $_GET["order"];
        $id = $_GET["id"];
        $now = date("D M j G:i:s T Y");
        $name = $_SESSION["firstName"]." ".$_SESSION["sirname"];

        if(isset($_POST["submit"])){
            $note = $_POST["note"];

            $sql = "UPDATE `orders` SET delivery_note='$note', deliverytime='$now', collected_by='$name' WHERE `requisition_number` = $order";//"DELETE FROM orders WHERE requisition_number = $order";

            if($MySQLDb->query($sql)){
                header("Location: Procurement_ongoing.php?id=$id"); die();
            }else{
                echo "
                <script>
                    alert('Failed to to reject!');
                    return false;
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body style="background-color:whitesmoke">
    <div class="card" style="width: 30rem;display:block;margin-left:auto;margin-right:auto;margin-top:3%;">
    <form method="POST" >
    
    <!-- Textarea 8 rows height -->
        <div class="form-outline">
            <textarea name="note"class="form-control" placeholder="Delivery note" id="textAreaExample2" rows="8" style="display:block;margin-left:auto;margin-right:auto;width:98%;margin-top:3%;"></textarea>
         <label class="form-label" for="textAreaExample2"></label>
        </div>
        <button typw="submit" style="display:block;margin-left:auto;margin-right:auto;width:98%;margin-top:1%;" name="submit"class="btn btn-primary" type="submit">Send</button>

    </form>
</div>
</body>
</html>