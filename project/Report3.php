<?php
include('db_connection.php'); 
$today = date("Y-m-d");
    if(isset($_POST["submitform"])){

        $equip = $MySQLDb -> real_escape_string($_POST["equip"]);
        $no = $MySQLDb -> real_escape_string($_POST["no"]);
        $inuse = $MySQLDb -> real_escape_string($_POST["inuse"]);
        $idle = $MySQLDb -> real_escape_string($_POST["idle"]);
        $repair = $MySQLDb -> real_escape_string($_POST["repair"]);
        $hrs = $MySQLDb -> real_escape_string($_POST["hrs"]);
        $material = $MySQLDb -> real_escape_string($_POST["material"]);
        $qnty = $MySQLDb -> real_escape_string($_POST["qnty"]);

        if(!empty($equip) && !empty($no) && !empty($inuse) && !empty($idle) && !empty($repair) && !empty($hrs)){
            $insert = "INSERT INTO machines(equipment, no, idle, underRepair, HRS, item, qnty, dateCreated) VALUES ('$equip','$no','$idle','$repair','$hrs','$material','$qnty','$today')";
            $run = mysqli_query($MySQLDb,$insert);

            
            if($run){
                
                echo "
                <script>
                    alert('Successful');
                </script>
                ";
            }else{
                echo "
                <script>
                    alert('Unsuccessful, please try again');
                </script>
             ";
            }
        }

    }


    if(isset($_POST["submitwork"])){

        $Workdone = $MySQLDb -> real_escape_string($_POST["Workdone"]);
        $wnumber = $MySQLDb -> real_escape_string($_POST["wnumber"]);

        if(!empty($wnumber) && !empty($Workdone)){
            $insert = "INSERT INTO `work`(`numb`, `workDone`, `datecreated`, `projectcode`, `user`) VALUES ('$wnumber','$Workdone','$today','','')";
            $run = mysqli_query($MySQLDb,$insert);
           
            if($run){
                
                echo "
                <script>
                    alert('Successful');
                </script>
                ";
            }else{
                echo "
                <script>
                    alert('Unsuccessful, please try again');
                </script>
             ";
            }
        }

    }


    if(isset($_POST["next"])){

        $Workdone = $MySQLDb -> real_escape_string($_POST["Workdone"]);
 
        if(!empty($Workdone)){
            $update = "UPDATE `work` SET 'otherInfo'='$Workdone' WHERE datecreated=$today";
            $run1 = mysqli_query($MySQLDb,$update);
           
            if($run1){
                header("Location: Report3.php"); die();
            }else{
                echo "
                <script>
                    alert('Unsuccessful, please try again');
                </script>
             ";
            }
        }

        if(empty($Workdone)){
            header("Location: Report4.php"); die();
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
    $(document).ready(function(){
    
    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;
    
    $(".next").click(function(){
        
        current_fs = $(this).parent();
        next_fs = $(this).parent().next();
        
        //Add Class Active
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
        
        //show the next fieldset
        next_fs.show(); 
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now) {
                // for making fielset appear animation
                opacity = 1 - now;
    
                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                next_fs.css({'opacity': opacity});
            }, 
            duration: 600
        });
    });
    
    $(".previous").click(function(){
        
        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();
        
        //Remove class active
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
        
        //show the previous fieldset
        previous_fs.show();
    
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now) {
                // for making fielset appear animation
                opacity = 1 - now;
    
                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previous_fs.css({'opacity': opacity});
            }, 
            duration: 600
        });
    });
    
    $('.radio-group .radio').click(function(){
        $(this).parent().find('.radio').removeClass('selected');
        $(this).addClass('selected');
    });
    
    $(".submit").click(function(){
        return false;
    })
        
    });
</script>
</head>
<body>
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
                            
                                        <div class="progress-bar" role="progressbar" style="width: 60%; height: 25px; font-weight:bold;"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"> Stage 3/5</div>
                                    </div>
                            </ul>
                            <!-- fieldsets -->
                            <div class="form-card">
                                    <h2 class="fs-title" style="text-align:center;">Personal on site</h2>
                                    <h5 class="text-gray-800" style="text: size 15px;font-weight:bold; text-align:left; margin-left:2%;">1. Plant and machinery on site</h5>
                                    
                                    <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" style="text: size 15px;font-weight:bold;" width="100% !important" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Equipment</th>
                                            <th>No</th>
                                            <th>Material Delivered</th>
                                            <th>Qty</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>

                                    <?php 

                                        $today = date("Y-m-d");
                                        include('db_connection.php'); 

                                        $query = "SELECT * FROM machines WHERE dateCreated='$today'";
                                        
                                    
                                        if($result = mysqli_query($MySQLDb,$query)){
                                            while($row = $result->fetch_assoc() ){
                                                echo" <tr>
                                                     <td>".$row["equipment"]."</td>
                                                     <td>".$row["no"]."</td>
                                                     <td>".$row["item"]."</td>
                                                     <td>".$row["qnty"]."</td>
                                                  
                                                 </tr>";
                                                 }
                                        }


                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <a name="submit" style="color:white"  data-toggle="modal" data-target="#myModal" class="btn btn-primary"><i class="fas fa-plus"></i>Add</a>
                            <hr>


                            <h5 class="text-gray-800" style="text: size 15px;font-weight:bold; text-align:left; margin-left:2%;">2. Work done incl (use of plant)</h5>
                                    
                                    <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" style="text: size 15px;font-weight:bold;" width="100% !important" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="width:10%;">Number</th>
                                            <th style="width:90%;">Work</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>

                                    <?php 

                                        $query1 = "SELECT * FROM `work` WHERE datecreated='$today'";                                       
                                  
                                        if($result = mysqli_query($MySQLDb,$query1)){
                                            while($row = $result->fetch_assoc() ){
                                                echo" <tr>
                                                     <td>".$row["numb"]."</td>
                                                     <td>".$row["workDone"]."</td> 
                                                 </tr>";
                                                 }
                                        }


                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <a name="submit" style="color:white"  data-toggle="modal" data-target="#myModal2" class="btn btn-primary"><i class="fas fa-plus"></i>Add</a>
                            
                            <hr>
                            <fieldset>
                            
                            <textarea type="textarea" name="remarksa" placeholder="AISDRG & Other information recieved on site" ></textarea>

                                </div>
                                <button name="next" style="color:white"  class="btn btn-primary"><i class="fas fa-plus"></i>&#160 Next Step</button>
                                
                            </fieldset>
                            <hr>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add new Equipment</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
   <form  method="POST" >
        <div class="form-outline">
        <input type="text" id="myform" class="form-control" name="equip"  placeholder="Equipment" required/>
        </div>
        <hr>
        <div class="form-outline">
        <input type="number" id="formControlDefault" name="no" class="form-control"  placeholder="No." required/>
        </div>
        <hr>
        <div class="form-outline">
        <input type="number" id="formControlDefault" name="inuse" class="form-control"  placeholder="In Use" required/>
        </div>
        <hr>
        <div class="form-outline">
        <input type="number" id="formControlDefault" name="idle"class="form-control"  placeholder="Idle" required/>
        </div>
        
        <hr>
        <div class="form-outline">
        <input type="number" id="myform" class="form-control" name="repair"  placeholder="Under repair" required/>
        </div>

        <hr>
        <div class="form-outline">
        <input type="text" id="formControlDefault" name="hrs" class="form-control"  placeholder="HRS" required/>
        </div>

        <hr>
        <div class="form-outline">
        <input type="text" id="formControlDefault" name="material" class="form-control"  placeholder="Material delivered to site"/>
        </div>

        <hr>
        <div class="form-outline">
        <input type="number" id="formControlDefault" name="qnty"class="form-control"  placeholder="Material quantity"/>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" style="background: #eb927c" data-dismiss="modal">Cancel</button>
        <button type="Reset" class="btn btn-secondary" >Reset</button>
        <button  name="submitform" class="btn btn-primary" return false><i class="fas fa-plus"></i>Add</button>
      </div>
    </div>
</form>
  </div>
</div>

<div class="modal" tabindex="-1" id="myModal2">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add new Work</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
   <form  method="POST" >
        <div class="form-outline">
        <input type="text area" id="formControlDefault" name="wnumber"class="form-control"  placeholder="Work number"/>
        </div> 
        <hr>                                 
        <div class="form-outline">
        <textarea type="text" id="work" class="form-control" name="Workdone"  placeholder="Work done"></textarea>
        </div>
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" style="background: #eb927c" data-dismiss="modal">Cancel</button>
        <button type="Reset" class="btn btn-secondary" >Reset</button>
        <button  name="submitwork" class="btn btn-primary" return false><i class="fas fa-plus"></i>Add</button>
      </div>
    </div>
</form>
  </div>
</div>


 </div>



</body>
</html>