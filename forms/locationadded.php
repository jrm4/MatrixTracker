<?php



//include('formfunctions.php');


// maybe include this in a thing
/*
 
require_once("../models/human.php");
require_once("../models/location.php");
require_once("../models/hovercraft.php");

echo "models modelled<br>";
//DB MAPPING
require_once("../db/dbconn.php");
require_once("../db/HovercraftMapper.php");
require_once("../db/HumanMapper.php");
require_once("../db/LocationMapper.php");


// making mappers
$db = new Dbconn('localhost','MatrixNew','root','p|||p');
$locationmapper = new LocationMapper($db);
$hovercraftmapper = new HovercraftMapper($db);
$humanmapper = new HumanMapper($db);

//VIEW
require_once("../view/fullreports.php"); 
*/
var_dump($_POST);

if (count($_POST) > 0){
    //error checkin
    
    $validationErrors = 0;


    if (count($validationErrors == 0)) {
        $name = $_POST['name'];
    }

    $curr_loc = new Location($name);
    
    echo "location created in memory";
    
    $locationmapper->createLocation($curr_loc);
    
    echo "and on db";
    $_POST = null;
    session_destroy();
    
   echo '<a href="addnew.php"> Back to add menu </a>';
    exit();
    
    
    
}  
?>


