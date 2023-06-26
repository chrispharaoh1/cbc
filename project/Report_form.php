<?php
    include('db_connection.php'); 

    $proj = "SELECT * FROM `project` WHERE status=1";
    $projects = mysqli_query($MySQLDb,$proj);

    $dn = "";

    if(isset($_POST["submit"])){
        $date = $MySQLDb -> real_escape_string($_POST["date"]);
        $job = $MySQLDb -> real_escape_string($_POST["job"]);
        $sheet = $MySQLDb -> real_escape_string($_POST["sheet"]);
        $shift = $MySQLDb -> real_escape_string($_POST["shift"]);
        $client = $MySQLDb -> real_escape_string($_POST["client"]);
        $projectname = $MySQLDb -> real_escape_string($_POST["projectname"]);
        $sunny = $MySQLDb -> real_escape_string($_POST["sunny"]);
        $cloudy = $MySQLDb -> real_escape_string($_POST["cloudy"]);
        $rain = $MySQLDb -> real_escape_string($_POST["rain"]);
        $vistors = $MySQLDb -> real_escape_string($_POST["vistors"]);
        $hours = $MySQLDb -> real_escape_string($_POST["hours"]); 

        if(!empty($date) && !empty($job) && !empty($sheet) && !empty($client) && !empty($projectname)){
            $query = "INSERT INTO `report`(`job_number`, `date`, `sheet_number`, `shift`, `project_name`, `client`, `sunny`, `cloudy`, `rainy`, `hours_lost`, `vistors`) VALUES ('$job','$date','$sheet','$shift','$projectname','$client','$sunny','$cloudy','$rain','$hours','$vistors')";

            $run = $MySQLDb -> query($query);

            if($run){
                header("Location: Report2.php"); die();
            }else{
                echo "
                        <script>
                            alert('Unsuccessful, please try again');
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
    <title>Report</title>
    

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">  
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">  
    </script>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">  
    </script>


    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        * {
    margin: 0;
    padding: 0;
}

html {
    height: 100%;
}

/*Background color*/
#grad1 {
    background-color: : #9C27B0;
    background-image: linear-gradient(120deg, #FF4081, #81D4FA);
}

/*form styles*/
#msform {
    text-align: center;
    position: relative;
    margin-top: 20px;
}

#msform fieldset .form-card {
    background: white;
    border: 0 none;
    border-radius: 0px;
    box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
    padding: 20px 40px 30px 40px;
    box-sizing: border-box;
    width: 94%;
    margin: 0 3% 20px 3%;

    /*stacking fieldsets above each other*/
    position: relative;
}

#msform fieldset {
    background: white;
    border: 0 none;
    border-radius: 0.5rem;
    box-sizing: border-box;
    width: 100%;
    margin: 0;
    padding-bottom: 20px;

    /*stacking fieldsets above each other*/
    position: relative;
}

/*Hide all except first fieldset*/
#msform fieldset:not(:first-of-type) {
    display: none;
}

#msform fieldset .form-card {
    text-align: left;
    color: #9E9E9E;
}

#msform input, #msform textarea {
    padding: 0px 8px 4px 8px;
    border: none;
    border-bottom: 1px solid #ccc;
    border-radius: 0px;
    margin-bottom: 25px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    font-family: montserrat;
    color: #2C3E50;
    font-size: 16px;
    letter-spacing: 1px;
}

#msform input:focus, #msform textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: none;
    font-weight: bold;
    border-bottom: 2px solid skyblue;
    outline-width: 0;
}

/*Blue Buttons*/
#msform .action-button {
    width: 100px;
    background: skyblue;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px;
}

#msform .action-button:hover, #msform .action-button:focus {
    box-shadow: 0 0 0 2px white, 0 0 0 3px skyblue;
}

/*Previous Buttons*/
#msform .action-button-previous {
    width: 100px;
    background: #616161;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px;
}

#msform .action-button-previous:hover, #msform .action-button-previous:focus {
    box-shadow: 0 0 0 2px white, 0 0 0 3px #616161;
}

/*Dropdown List Exp Date*/
select.list-dt {
    border: none;
    outline: 0;
    border-bottom: 1px solid #ccc;
    padding: 2px 5px 3px 5px;
    margin: 2px;
}

select.list-dt:focus {
    border-bottom: 2px solid skyblue;
}

/*The background card*/
.card {
    z-index: 0;
    border: none;
    border-radius: 0.5rem;
    position: relative;
}

/*FieldSet headings*/
.fs-title {
    font-size: 25px;
    color: #2C3E50;
    margin-bottom: 10px;
    font-weight: bold;
    text-align: left;
}

/*progressbar*/
#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: lightgrey;
}

#progressbar .active {
    color: #000000;
}

#progressbar li {
    list-style-type: none;
    font-size: 12px;
    width: 25%;
    float: left;
    position: relative;
}

/*Icons in the ProgressBar*/
#progressbar #account:before {
    font-family: FontAwesome;
    content: "\f023";
}

#progressbar #personal:before {
    font-family: FontAwesome;
    content: "\f007";
}

#progressbar #payment:before {
    font-family: FontAwesome;
    content: "\f09d";
}

#progressbar #confirm:before {
    font-family: FontAwesome;
    content: "\f00c";
}

/*ProgressBar before any progress*/
#progressbar li:before {
    width: 50px;
    height: 50px;
    line-height: 45px;
    display: block;
    font-size: 18px;
    color: #ffffff;
    background: lightgray;
    border-radius: 50%;
    margin: 0 auto 10px auto;
    padding: 2px;
}

/*ProgressBar connectors*/
#progressbar li:after {
    content: '';
    width: 100%;
    height: 2px;
    background: lightgray;
    position: absolute;
    left: 0;
    top: 25px;
    z-index: -1;
}

/*Color number of the step and the connector before it*/
#progressbar li.active:before, #progressbar li.active:after {
    background: skyblue;
}

/*Imaged Radio Buttons*/
.radio-group {
    position: relative;
    margin-bottom: 25px;
}

.radio {
    display:inline-block;
    width: 204;
    height: 104;
    border-radius: 0;
    background: lightblue;
    box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
    box-sizing: border-box;
    cursor:pointer;
    margin: 8px 2px; 
}

.radio:hover {
    box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3);
}

.radio.selected {
    box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1);
}

/*Fit image in bootstrap div*/
.fit-image{
    width: 100%;
    object-fit: cover;
}
    </style>


<script>

</script>
</head>
<body>
<p><?php echo $dn;?><p>
    <!-- MultiStep Form -->
<div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
        <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h2><strong>Dairy progress report</strong></h2>
                <p>Fill all form field to go to next step</p>
                <div class="row">
                    <div class="col-md-12 mx-0">
                        <form id="msform" method="post">
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <div class="progress mb-4" style="margin-left:5%; margin-right:5%;height: 25px;">
                            
                                <div class="progress-bar" role="progressbar" style="width: 20%; height: 25px; font-weight:bold;"
                                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"> Stage 1/5</div>
                        </div>
                            </ul>
                            <!-- fieldsets -->
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Basic Info</h2>
                                   
                                    <input type="text" onfocus="(this.type='date')" name="date" placeholder="Date" required/>
                                    <input type="text" name="job" placeholder="Job number" required/>
                                    <input type="text" name="shift" placeholder="SHIFT (Day or Night)" required/>
                                    <input type="text" name="sheet" placeholder="Sheet No" required/>

                                     
                                    <select name="projectname" >
                                    <?php while($row = $projects->fetch_assoc()):?>
                                        <option style="text-align:center; width:90%;">---Project name---</option>
                                        <option value="<?php echo $row['projectName'];?>"><?php echo $row['projectName'];?></option>
                                    <?php endwhile;?>
                                    </select>

                                    <hr>
                                    <input type="text" name="client" placeholder="Client" required/>
                                    <h2 class="fs-title">Weather</h2>
                                    <input type="text" name="sunny" placeholder="SUNNY:"/>
                                    <input type="text" name="cloudy" placeholder="CLOUDY:"/>
                                    <input type="text" name="rain" placeholder="RAIN:"/>
                                    <input type="text" name="hours" placeholder="Hours lost"/>
                                    <textarea type="textarea" name="vistors" placeholder="Vistors" ></textarea>
                                    
                                </div>
                                <button name="submit" class="btn btn-primary">&#160 Next Step</button>
                            </fieldset>
   
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>

</body>
</html>