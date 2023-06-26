<?php
    include('db_connection.php'); 
   
    // Include the database configuration file
     $statusMsg = "";
    
    // File upload path
     
    if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
        $targetDir = "uploads/";
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        $today = date("Y-m-d");
        $time = "";
        // Allow certain file formats
        $allowTypes = array('jpg','png','jpeg','gif','pdf');
        if(in_array($fileType, $allowTypes)){
            // Upload file to server
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                // Insert image file name into database
                $qyery = "INSERT INTO `images`(`file_name`, `uploaded_date`, `uploaded_on`) VALUES ('$fileName','$today','$time') ";
                $insert = $MySQLDb->query($qyery);    //("INSERT into images (file_name, uploaded_on,uploaded_date) VALUES ('".."', ),'$today'");
                if($insert){
                    $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                    header("Location: Report4.php"); die();

                    echo "
                    <script>
                        alert('File has been uploaded successfully.');
                    </script>
                 ";
                    
                }else{
                    $statusMsg = "File upload failed, please try again.";
                    header("Location: Report4.php"); die();
                    echo "
                        <script>
                            alert('File upload failed, please try again.');
                        </script>
                     ";
                } 
            }else{
                $statusMsg = "Sorry, there was an error uploading your file.";
                header("Location: Report4.php"); die();
                echo "
                <script>
                    alert('Sorry, there was an error uploading your file.');
                </script>
             ";
            }
        }else{
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
            header("Location: Report4.php"); die();
            echo "
            <script>
                alert('Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.');
            </script>
         ";
        }
    }else{
        
    }
    
    // Display status message
    echo $statusMsg;
    
?>

