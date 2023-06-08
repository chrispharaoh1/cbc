
<?php
session_start();
    if(isset($_POST['logout'])){
       session_destroy(); 
       unset($_SESSION["id"]);
       unset($_SESSION["name"]);
       unset($_SESSION["username"]);
       unset($_SESSION["email"]);
       unset($_SESSION["role"]);
       unset($_SESSION["phone"]);
       unset($_SESSION["phone"]);
       unset($_SESSION["employeeNumber"]);
       unset($_SESSION["userID"]);
       unset($_SESSION["firstName"]);
       unset($_SESSION["sirname"]);
       unset($_SESSION["projectID"]);

            
       header("Location: signin.php"); die(); 
    }
?>