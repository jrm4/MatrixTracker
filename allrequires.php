<?php


$root = $_SERVER["DOCUMENT_ROOT"] . "/MatrixTracker";

        
//MODELS        
require_once("$root/models/human.php");
require_once("$root/models/location.php");
require_once("$root/models/hovercraft.php");


//DB MAPPING
require_once("$root/db/dbconn.php");
require_once("$root/db/HovercraftMapper.php");
require_once("$root/db/HumanMapper.php");
require_once("$root/db/LocationMapper.php");


// making mappers

//Mysql login
require_once("$root/db/dblogin.php");

$locationmapper = new LocationMapper($db);
$hovercraftmapper = new HovercraftMapper($db);
$humanmapper = new HumanMapper($db);

//VIEW
require_once("$root/view/fullreports.php");  
//forms

//duh.




//echo "<h3><i>all requires required</i></h3>";
?>

