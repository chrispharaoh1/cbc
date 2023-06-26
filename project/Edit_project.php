<?php
     include('db_connection.php'); 

     $id = $_GET["id"];

     $select = "SELECT * FROM `project` WHERE id=$id";
     $superv = "SELECT * FROM employee WHERE role = 'supervisor'";
     $foreM = "SELECT * FROM employee WHERE role = 'foreman'";
     $engin = "SELECT * FROM employee WHERE role = 'engineer'";

     $supervResuts = mysqli_query($MySQLDb,$superv);
     $foreMResuts = mysqli_query($MySQLDb,$foreM);
     $enginResuts = mysqli_query($MySQLDb,$engin);
     $selectResuts = mysqli_query($MySQLDb,$select);


?>

<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/formstyle.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Add project </title> 
</head>
<body style="background-color:#1d86b3">
    <div class="container">
        <header>New project</header>

        <form action="Edit_project_processing.php" method="post">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Project Details</span>
                    
                    <?php  while($row =  $selectResuts->fetch_assoc()):?>
                    <div class="fields">
                        <div class="input-field">
                        <input type="hidden" name="rojid" value="<?php echo $id; ?>"placeholder="Enter project name" required>
                            <label>Project Name</label>
                            <input type="text" name="projname" value="<?php echo $row['projectName']; ?>"placeholder="Enter project name" required>
                        </div>

                        <div class="input-field">
                            <label>Short Description</label>
                            <input type="text"name="description"  value="<?php echo $row['description']; ?>" placeholder="Enter Description" required>
                        </div>

                        <div class="input-field">
                            <label>Project ID code</label>
                            <input type="text" name="projid"  value="<?php echo $row['code']; ?>" placeholder="Enter Project ID eg (B No.)" required>
                        </div>

                        <div class="input-field">
                            <label>Start Date</label>
                            <input type="date"  value="<?php echo $row['startDate']; ?>" name="dat" required>
                        </div>


                        <div class="input-field">
                            <label>Expected duration</label>
                            <input type="text" name="duration"  value="<?php echo $row['duration']; ?>" placeholder="Enter duration" required>
                        </div>

                        <div class="input-field">
                            <label>Location</label>
                            <input type="text" name="location"  value="<?php echo $row['location']; ?>" placeholder="Enter project location" required>
                        </div>

                    </div>
                </div>
                <?php endwhile;?>
                <div class="details ID">
                    <span class="title">Assign Responsibilities</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Site Engeneer</label>
                            <select name="engeneer" id="engeneer">
                            <?php while($row =  $enginResuts->fetch_assoc()):?>
                                <option value="<?php echo $row['firstName'];?>"><?php echo $row['firstName']." ".$row['lastName'];?></option>
                                <?php endwhile;?>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Supervisor</label>
                            <select name="supervisor" id="supervisor">
                                <?php while($row = $supervResuts->fetch_assoc()):?>
                                <option value="<?php echo $row['firstName'];?>"><?php echo $row['firstName']." ".$row['lastName'];?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Foreman</label>
                            <select name="foreman" id="foreman">
                            <?php while($row = $foreMResuts->fetch_assoc()):?>
                                <option value="<?php echo $row['firstName'];?>"><?php echo $row['firstName']." ".$row['lastName'];?></option>
                                <?php endwhile;?>
                            </select>
                        </div>
                    </div>


                    <button class="nextBtn" name="submit">
                        <i class="fas fa-circle-plus"></i>
                        <span class="btnText">Create</span>   
                    </button>
                </div> 
            </div>

        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>