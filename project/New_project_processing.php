<?php
 include('db_connection.php'); 

 $projectName = "";
 $description = "";
 $projectID = "";
 $date = "";
 $duration = "";
 $location = "";
 $foreman = "";
 $engineer = "";
 $supervisor = "";

    if(isset($_POST['submit'])){
        $projectName = $_POST['projname'];
        $description = $_POST['description'];
        $projectID = $_POST['projid'];
        $date = $_POST['dat'];
        $duration = $_POST['duration'];
        $location = $_POST['location'];
        $supervisor = $_POST['supervisor'];
        $engineer = $_POST['engeneer'];
        $foreman = $_POST['foreman'];

            $updateEngine = "UPDATE employee SET projectId='$projectID' WHERE firstName = '$engineer'";
            $updateSupervisor = "UPDATE employee SET projectId='$projectID' WHERE firstName = '$supervisor'";
            $updateForeman = "UPDATE employee SET projectId='$projectID' WHERE firstName = '$foreman'";

            if(!empty($projectName) && !empty($duration) &&!empty($description) && !empty($projectID) && !empty($date) && !empty($location) && !empty($foreman) && !empty($engineer) && !empty($supervisor)){
                
                $query = "INSERT INTO `project`( `projectName`, `description`, `code`, `startDate`, `duration`, `location`, `foreman`, `supervisor`, `engineer`,`status`) VALUES ('$projectName','$description','$projectID','$date','$duration','$location','$foreman','$supervisor','$engineer','1')";
                $run = mysqli_query($MySQLDb,$query);
                $run2 = mysqli_query($MySQLDb,$updateEngine);
                $run2 = mysqli_query($MySQLDb,$updateSupervisor);
                $run2 = mysqli_query($MySQLDb,$updateForeman);
                if($run){
                    header("Location: index.php"); die(); 
                }
                else{
                    echo "<script>
                        alert('Failed to create new project, Try again');
                    </script>";
                    // echo $MySQLDb->error;
                }
            }

    }
?>


                                    
                   