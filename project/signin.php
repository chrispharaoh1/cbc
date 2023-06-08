<?php
$errors1 = ""; // Username
$errors2 = ""; // Password
$errors3 = ""; // Err report
$errors4 = ""; // Password strength
$usernam = "";
$role = "";
 include('db_connection.php');
 session_start(); 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      
        $role = "";
        $username = "";
        $firstName = "";
        $lastName = "";
        $phoneNumber = "";
        $email = "";
        $employeNumber = "";
        $userID= "";
        $projectID = "";

        $username = $MySQLDb -> real_escape_string($_POST["username"]);
        $password = $MySQLDb -> real_escape_string($_POST["pass"]);
        $usernam = $username;
        $md5password = md5($password);


        if(empty($username)){

            $errors1 = "Please enter username";
        }

        if(empty($password)){

            $errors2 = "Please enter Password";
        }
          
        // validating password strength
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if(!empty($password) && !empty($username)){
            
            $query = "SELECT * FROM employee WHERE user_name = '$username' AND password = '$md5password'";          

            if($run = mysqli_query($MySQLDb,$query)){
                $rowcount = mysqli_num_rows($run);
                if($rowcount >0){
                    if($row = $run->fetch_assoc()){
                        
                        //$errors3 = $row['role'];
                        $role = $row['role'];
                        $username = $row['user_name'];
                        $firstName = $row['firstName'];
                        $lastName = $row['lastName'];
                        $phoneNumber = $row['phoneNumber'];
                        $email = $row['email'];
                        $employeNumber = $row['employeeNumber'];
                        $userID= $row['id'];
                        $projectID = $row['projectId'];

                        //Session variables
                        $_SESSION["username"] =  $username;
                        $_SESSION["email"] =  $email;
                        $_SESSION["role"] =  $row['role'];
                        $_SESSION["phone"] =  $phoneNumber;
                        $_SESSION["employeeNumber"] = $employeNumber ;
                        $_SESSION["userID"] =  $userID;
                        $_SESSION["firstName"] = $firstName ;
                        $_SESSION["sirname"] =  $lastName;
                        $_SESSION["projectID"] =  $projectID;

                        if($row['role'] == 'managing director'){
                            header("Location: director.php"); die();
                    
                        }

                        elseif($row['role'] == 'manager'){
                            header("Location: index.php"); die();
                            
                        }

                        elseif($row['role'] == 'procurement officer'){
                            //header("Location: ForemanIndex.php"); die();
                           
                        }

                        elseif($row['role'] == 'supervisor'){
                            header('Location: ForemanIndex.php?id='.$row['id']); die();
                            
                        }
                        
                        elseif($row['role'] == 'foreman'){
                            header('Location: ForemanIndex.php?id='.$row['id']); die();
                            
                        }
                        
                        elseif($row['role'] == 'engineer'){
                            header('Location: ForemanIndex.php?id='.$row['id']); die();
                            
                        }else{
                            $errors3 = "Unknown user";
                        }
                        
                    }
                    
                }else{
                    $errors3 = "Username or password incorect";
                }
                
            }
        }
            
    }
?>

<!doctype html>
<html>
<head>
<meta charset='utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<title>CBC sign in</title>
<link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' rel='stylesheet'>
<link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
<style>@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif
}

body {
    height: 100vh;
    background: linear-gradient(to top, #c9c9ff 50%, #9090fa 90%) no-repeat
}

.container {
    margin: 50px auto
}

.panel-heading {
    text-align: center;
    margin-bottom: 10px
}

#forgot {
    min-width: 100px;
    margin-left: auto;
    text-decoration: none
}

a:hover {
    text-decoration: none
}

.form-inline label {
    padding-left: 10px;
    margin: 0;
    cursor: pointer
}

.btn.btn-primary {
    margin-top: 20px;
    border-radius: 15px
}

.panel {
    min-height: 380px;
    box-shadow: 20px 20px 80px rgb(218, 218, 218);
    border-radius: 12px
}

.input-field {
    border-radius: 5px;
    padding: 5px;
    display: flex;
    align-items: center;
    cursor: pointer;
    border: 1px solid #ddd;
    color: #4343ff
}

input[type='text'],
input[type='password'] {
    border: none;
    outline: none;
    box-shadow: none;
    width: 100%
}

.fa-eye-slash.btn {
    border: none;
    outline: none;
    box-shadow: none
}

img {
    width: 40px;
    height: 40px;
    object-fit: cover;
    border-radius: 50%;
    position: relative
}

a[target='_blank'] {
    position: relative;
    transition: all 0.1s ease-in-out
}

.bordert {
    border-top: 1px solid #aaa;
    position: relative
}

.bordert:after {
    content: "City Bulding Contractors";
    position: absolute;
    top: -13px;
    left: 25%;
    background-color: #fff;
    padding: 0px 8px
}
#er3{
    text-align:center;
}

@media(max-width: 360px) {
    #forgot {
        margin-left: 0;
        padding-top: 10px
    }

    body {
        height: 100%
    }

    .container {
        margin: 30px 0
    }

    .bordert:after {
        left: 25%
    }
}</style>
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
<script type='text/javascript' src='https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js'></script>

<script>
    function myFunction() {
  var x = document.getElementById("pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
</head>
<body oncontextmenu='return false' class='snippet-body'>
<div class="container">
    <div class="row">
        <div class="offset-md-2 col-lg-5 col-md-7 offset-lg-4 offset-md-3">
            <div class="panel border bg-white">
                <div class="panel-heading">
                    <h3 class="pt-3 font-weight-bold">Login</h3>
                </div>     
                <p id="er3" style="color:red"><?php echo $errors3; ?><p>
                <div class="panel-body p-3">
                    <form  method="POST">
                        <div class="form-group py-2">
                            <div class="input-field"> <span class="far fa-user p-2">
                            </span> <input type="text" value="<?php echo $usernam;?>" name="username" placeholder="Username" > 
                        </div>
                        </div>
                        <p id="er" style="color:red"><?php echo $errors1; ?><p>
                        <div class="form-group py-1 pb-2">
                            <div class="input-field"> <span class="fas fa-lock px-2"></span> <input id="pass"type="password" name="pass" placeholder="Enter your Password" >
                        </div>
                        <p id="er" style="color:red"><?php echo $errors2; ?><p>
                        <div class="form-inline"> 
                            <input type="checkbox" onclick="myFunction()" name="remember" id="remember">
                             <label for="remember" class="text-muted">Show password</label> 
                            <a href="forgot.php" id="forgot" class="font-weight-bold">Forgot password?</a> </div>
                        <button type="submit" name="submit" class="btn btn-primary btn-block mt-3">Login</button>
                    </form>
                </div>
                <div class="mx-3 my-2 py-2 bordert">
                    
            </div>
        </div>
    </div>
</div>
<script type='text/javascript'></script>
</body>
</html>