<?php
    include('db_connection.php'); 

    $proj = "SELECT * FROM `project` WHERE status=1";
    $projects = mysqli_query($MySQLDb,$proj);

    $dn = "";
    $today = date("Y-m-d");

    if(isset($_POST["submit"])){
        $pmanager = $MySQLDb -> real_escape_string($_POST["pmanager"]);
        $engineer = $MySQLDb -> real_escape_string($_POST["engineer"]);
        $forman = $MySQLDb -> real_escape_string($_POST["forman"]);
        $store = $MySQLDb -> real_escape_string($_POST["store"]);
        $surveyor = $MySQLDb -> real_escape_string($_POST["surveyor"]);
        $safety = $MySQLDb -> real_escape_string($_POST["safety"]);
        $os = $MySQLDb -> real_escape_string($_POST["os"]);
        $cleck = $MySQLDb -> real_escape_string($_POST["cleck"]);
        $reception = $MySQLDb -> real_escape_string($_POST["reception"]);
        $brick = $MySQLDb -> real_escape_string($_POST["brick"]);
        $capenters = $MySQLDb -> real_escape_string($_POST["capenters"]); 
        $Steel = $MySQLDb -> real_escape_string($_POST["Steel"]);
        $scafolers = $MySQLDb -> real_escape_string($_POST["scafolers"]);
        $painters = $MySQLDb -> real_escape_string($_POST["painters"]);
        $labors = $MySQLDb -> real_escape_string($_POST["labors"]);
        $security = $MySQLDb -> real_escape_string($_POST["security"]);
        $operators = $MySQLDb -> real_escape_string($_POST["operators"]);
        $plumbers = $MySQLDb -> real_escape_string($_POST["plumbers"]);
        $total = $MySQLDb -> real_escape_string($_POST["total"]); 
        $remarks = $MySQLDb -> real_escape_string($_POST["remarks"]); 

        $pmanager1 = $MySQLDb -> real_escape_string($_POST["pmanager1"]);
        $engineer1 = $MySQLDb -> real_escape_string($_POST["engineer1"]);
        $forman1 = $MySQLDb -> real_escape_string($_POST["forman1"]);
        $store1 = $MySQLDb -> real_escape_string($_POST["store1"]);
        $surveyor1 = $MySQLDb -> real_escape_string($_POST["surveyor1"]);
        $safety1 = $MySQLDb -> real_escape_string($_POST["safety1"]);
        $os1 = $MySQLDb -> real_escape_string($_POST["os1"]);
        $cleck1 = $MySQLDb -> real_escape_string($_POST["cleck1"]);
        $reception1 = $MySQLDb -> real_escape_string($_POST["reception1"]);
        $brick1 = $MySQLDb -> real_escape_string($_POST["brick1"]);
        $capenters1 = $MySQLDb -> real_escape_string($_POST["capenters1"]); 
        $Steel1 = $MySQLDb -> real_escape_string($_POST["Steel1"]);
        $scafolers1 = $MySQLDb -> real_escape_string($_POST["scafolers1"]);
        $painters1 = $MySQLDb -> real_escape_string($_POST["painters1"]);
        $labors1 = $MySQLDb -> real_escape_string($_POST["labors1"]);
        $security1 = $MySQLDb -> real_escape_string($_POST["security1"]);
        $operators1 = $MySQLDb -> real_escape_string($_POST["operators1"]);
        $plumbers1 = $MySQLDb -> real_escape_string($_POST["plumbers1"]);
        $total1 = $MySQLDb -> real_escape_string($_POST["total1"]);
        $subremarks1 = $MySQLDb -> real_escape_string($_POST["subremarks1"]);

        $pmanager11 = $MySQLDb -> real_escape_string($_POST["pmanager11"]);
        $engineer11 = $MySQLDb -> real_escape_string($_POST["engineer11"]);
        $forman11 = $MySQLDb -> real_escape_string($_POST["forman11"]);
        $store11 = $MySQLDb -> real_escape_string($_POST["store11"]);
        $surveyor11 = $MySQLDb -> real_escape_string($_POST["surveyor11"]);
        $safety11 = $MySQLDb -> real_escape_string($_POST["safety11"]);
        $os11 = $MySQLDb -> real_escape_string($_POST["os11"]);
        $cleck11 = $MySQLDb -> real_escape_string($_POST["cleck11"]);
        $reception11 = $MySQLDb -> real_escape_string($_POST["reception11"]);
        $brick11 = $MySQLDb -> real_escape_string($_POST["brick11"]);
        $capenters11 = $MySQLDb -> real_escape_string($_POST["capenters11"]); 
        $Steel11 = $MySQLDb -> real_escape_string($_POST["Steel11"]);
        $scafolers11 = $MySQLDb -> real_escape_string($_POST["scafolers11"]);
        $painters11 = $MySQLDb -> real_escape_string($_POST["painters11"]);
        $labors11 = $MySQLDb -> real_escape_string($_POST["labors11"]);
        $security11 = $MySQLDb -> real_escape_string($_POST["security11"]);
        $operators11 = $MySQLDb -> real_escape_string($_POST["operators11"]);
        $plumbers11 = $MySQLDb -> real_escape_string($_POST["plumbers11"]);
        $total11 = $MySQLDb -> real_escape_string($_POST["total11"]);
        $subremarks11 = $MySQLDb -> real_escape_string($_POST["subremarks11"]);

        $tota_total = $MySQLDb -> real_escape_string($_POST["totaltotal"]);

        if(!empty($pmanager) && !empty($pmanager1) && !empty($pmanager11) && !empty($engineer) && !empty($forman11)){
            $query = "UPDATE `report` SET mainContractor_projectManager='$pmanager',mainContractor_projectEngeneer='$engineer',mainContractor_foremen='$forman',mainContractor_storeIncharge='$store',mainContractor_savayor='$surveyor',mainContractor_safetyIncharge='$safety',mainContractor_OS='$os',mainContractor_clerk='$cleck11',mainContractor_receptionists='$reception',mainContractor_brickLayers='$brick',mainContractor_capenters='$capenters',mainContractor_steelFixers='$Steel',mainContractor_scafolder='$scafolers',mainContractor_panters='$painters',mainContractor_generalLabor='$labors',mainContractor_securityGuards='$security',mainContractor_operators='$operators',mainContractor_plumbers='$plumbers',mainContractor_remarks='$remarks',subContractor_projectManage='$pmanager1',subContractor_projectEngineer='$engineer1',subContractor_foremen='$forman1',subContractor_storeIncharge='$store1',subContractor_survayor='$surveyor1',subContractor_safetyIncharge='$safety1',subContractor_OS='$os1',subContractor_clerk='$cleck1',subContractor_receptionist='$reception1',subContractor_brickLayers='$brick1',subContractor_capenters='$capenters1',subContractor_steelFixers='$Steel1',subContractor_scafolders='$scafolers1',subContractor_painters='$painters1',subContractor_generalLabours='$labors1',subContractor_securityGuards='$security1',subContractor_operators='$operators1',subContractor_plumbers='$plumbers1',subContractor_total='$total1',subContractor_remarks='$subremarks1',mainContractor_total='$total',total_projectManager='$pmanager11',total_projectEngeneers='$engineer11',total_foremen='$forman11',total_storeIncharge='$store11',total_surveyor='$surveyor11',total_safetyIncharge='$safety11',total_os='$store11',total_clerk='$cleck11',total_receptionist='$reception11',total_brickLayers='$brick11',total_capenters='$total11',total_steelFixers='$Steel11',total_scafolders='$scafolers11',total_painters='$painters11',total_generalLabours='$labors11',total_securityGuards='$security11',total_operators='$operators11',total_plumbers='$plumbers11',total_total='$tota_total',total_Remarks='$subremarks11' WHERE date=$today";
            
            //`plant_&_machinery_on_site_equipment_name`='[value-74]',`plant_&_machinery_on_site_job_number`='[value-75]',`work_done_work_done_today`='[value-76]',`work_done_date`='[value-77]',`images_id`='[value-78]',`Signatures_other_info_onsite`='[value-79]'
            $run = $MySQLDb -> query($query);

            if($run){
                header("Location: Report3.php"); die();
            }else{
                echo $MySQLDb -> error;
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
                            
                                        <div class="progress-bar" role="progressbar" style="width: 40%; height: 25px; font-weight:bold;"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"> Stage 2/5</div>
                                    </div>
                            </ul>
                            <!-- fieldsets -->
       
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title" style="text-align:center;">Personal on site</h2>
                                    <h5 class="text-gray-800" style="text: size 15px;font-weight:bold;">1. MAIN CONTRACTOR</h5>
                                    <input type="number" name="pmanager" placeholder="Project Manager" required/>
                                    <input type="number" name="engineer" placeholder="Project Engineer" required/>
                                    <input type="number" name="forman" placeholder="Foreman" required/>
                                    <input type="number" name="store" placeholder="Stores incharge" required/>
                                    <input type="number" name="surveyor" placeholder="Surveyor" required/>
                                    <input type="number" name="safety" placeholder="Safety incharge" required/>
                                    <input type="number" name="os" placeholder="OS" required/>
                                    <input type="number" name="cleck" placeholder="Cleck" required/>
                                    <input type="number" name="reception" placeholder="Receptionists" required/>
                                    <input type="number" name="brick" placeholder="Brick layors" required/>
                                    <input type="number" name="capenters" placeholder="Capenters" required/>
                                    <input type="number" name="Steel" placeholder="Steel fixers" required/>
                                    <input type="number" name="scafolers" placeholder="Scafolders" required/>
                                    <input type="number" name="painters" placeholder="Painters" required/>
                                    <input type="number" name="labors" placeholder="General labours" required/>
                                    <input type="number" name="security" placeholder="Security guards" required/>
                                    <input type="number" name="operators" placeholder="Operators" required/>
                                    <input type="number" name="plumbers" placeholder="Plumbers" required/>
                                    <input type="number" name="total" placeholder="Total" required/> 
                                    <input type="text" name="remarks" placeholder="Remarks" />

                                    <h5 class="text-gray-800" style="text: size 15px; font-weight:bold;">2. SUB-CONTRACTOR</h5>
                                    <input type="number" name="pmanager1" placeholder="Project Manager" required/>
                                    <input type="number" name="engineer1" placeholder="Project Engineer" required/>
                                    <input type="number" name="forman1" placeholder="Foreman" required/>
                                    <input type="number" name="store1" placeholder="Stores incharge" required/>
                                    <input type="number" name="surveyor1" placeholder="Surveyor" required/>
                                    <input type="number" name="safety1" placeholder="Safety incharge" required/>
                                    <input type="number" name="os1" placeholder="OS" required/>
                                    <input type="number" name="cleck1" placeholder="Cleck" required/>
                                    <input type="number" name="reception1" placeholder="Receptionists" required/>
                                    <input type="number" name="brick1" placeholder="Brick layors" required/>
                                    <input type="number" name="capenters1" placeholder="Capenters" required/>
                                    <input type="number" name="Steel1" placeholder="Steel fixers" required/>
                                    <input type="number" name="scafolers1" placeholder="Scafolders" required/>
                                    <input type="number" name="painters1" placeholder="Painters" required/>
                                    <input type="number" name="labors1" placeholder="General labours" required/>
                                    <input type="number" name="security1" placeholder="Security guards" required/>
                                    <input type="number" name="operators1" placeholder="Operators" required/>
                                    <input type="number" name="plumbers1" placeholder="Plumbers" required/>
                                    <input type="number" name="total1" placeholder="Total" required/>
                                    <input type="text" name="subremarks1" placeholder="Remarks" />
                                    

                                    <h5 class="text-gray-800" style="text: size 15px; font-weight:bold;">3. Total Workers</h5>
                                    <input type="number" name="pmanager11" placeholder="Project Manager" required/>
                                    <input type="number" name="engineer11" placeholder="Project Engineer" required/>
                                    <input type="number" name="forman11" placeholder="Foreman" required/>
                                    <input type="number" name="store11" placeholder="Stores incharge" required/>
                                    <input type="number" name="surveyor11" placeholder="Surveyor" required/>
                                    <input type="number" name="safety11" placeholder="Safety incharge" required/>
                                    <input type="number" name="os11" placeholder="OS" required/>
                                    <input type="number" name="cleck11" placeholder="Cleck" required/>
                                    <input type="number" name="reception11" placeholder="Receptionists" required/>
                                    <input type="number" name="brick11" placeholder="Brick layors" required/>
                                    <input type="number" name="capenters11" placeholder="Capenters" required/>
                                    <input type="number" name="Steel11" placeholder="Steel fixers" required/>
                                    <input type="number" name="scafolers11" placeholder="Scafolders" required/>
                                    <input type="number" name="painters11" placeholder="Painters" required/>
                                    <input type="number" name="labors11" placeholder="General labours" required/>
                                    <input type="number" name="security11" placeholder="Security guards" required/>
                                    <input type="number" name="operators11" placeholder="Operators" required/>
                                    <input type="number" name="plumbers11" placeholder="Plumbers" required/>
                                    <input type="number" name="total11" placeholder="Total" required/>
                                    <textarea type="textarea" name="subremarks11" placeholder="Remarks" ></textarea>
                                    <hr>
                                    <input type="number" name="totaltotal" placeholder="Sub total of all the workers" required/>
                                    
                                </div>
                                <button name="submit"  data-toggle="modal" data-target="#myModal" class="btn btn-primary"><i class="fas fa-plus"></i>&#160 Next Step</button>
                                
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