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
 $id = "";

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
        $id = $_POST['rojid'];
    

            $updateEngine = "UPDATE employee SET projectId='$projectID' WHERE firstName = '$engineer'";
            $updateSupervisor = "UPDATE employee SET projectId='$projectID' WHERE firstName = '$supervisor'";
            $updateForeman = "UPDATE employee SET projectId='$projectID' WHERE firstName = '$foreman'";

            if(!empty($projectName) && !empty($duration) &&!empty($description) && !empty($projectID) && !empty($date) && !empty($location) && !empty($foreman) && !empty($engineer) && !empty($supervisor)){
                
                $query = "UPDATE `project` SET `projectName`='$projectName', `description`='$description', `code`='$projectID', `startDate`='$date', `duration`='$duration', `location`='$location', `foreman`='$foreman', `supervisor`='$supervisor', `engineer`='$engineer' WHERE id='$id'";
                $run = mysqli_query($MySQLDb,$query);
                $run2 = mysqli_query($MySQLDb,$updateEngine);
                $run2 = mysqli_query($MySQLDb,$updateSupervisor);
                $run2 = mysqli_query($MySQLDb,$updateForeman);
                if($run){
                    header("Location: Project_index.php?id=$id"); die(); 
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


                                    
                   