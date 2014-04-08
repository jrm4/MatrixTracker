<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>


        <?php
        
//MODELS        
require("./models/human.php");
require("./models/location.php");
require("./models/hovercraft.php");

echo "models modelled<br>";
//DB MAPPING
require("./db/dbconn.php");

require("./db/HovercraftMapper.php");
require("./db/HumanMapper.php");
require("./db/LocationMapper.php");


// making mappers
$db = new Dbconn('localhost','MatrixNew','root','p|||p');
$locationmapper = new LocationMapper($db);
$hovercraftmapper = new HovercraftMapper($db);
$humanmapper = new HumanMapper($db);

//VIEW
require("./view/fullreports.php");

// NOW,
$newplace = new Location();
$newplace->setName("Zion");

echo "<i> BEHOLD " . $newplace->getName();

echo "<br> writing to database</i>";

$locerror = $locationmapper->createLocation($newplace);

echo "done";

echo "<br> ATTRIBUTES OF variable newplace:";
echo "<br> Name is " . $newplace->getName();
echo "<br> id_location is " . $newplace->getId_location();

$newplace = NULL;

// Retrieve all locations and let user pick 

$locarray = $locationmapper->retrieveLocationByName("Zion");

$newzion = new Location();

$newzion = $locarray[0];

echo "<br> ATTRIBUTES OF variable newzion -- pulled from mysql:";
echo "<br> Name is " . $newzion->getName();
echo "<br> id_location is " . $newzion->getId_location();

$newship = new Hovercraft("Nebuchadnezzar");

echo "<br>";
    
//print_r($newship);
fullhovercraftreport($newship);

$hovresult = $hovercraftmapper->createHovercraft($newship);

$hovarray = $hovercraftmapper->retrieveHovercraftsByColumn("name", "Nebuchadnezzar");

$newneb = new Hovercraft();

$newneb = $hovarray[0];
echo "<br>";
//print_r($newneb);

fullhovercraftreport($newneb);


     ?>
    </body>
</html>
