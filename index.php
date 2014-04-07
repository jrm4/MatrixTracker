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


//Making new zion
$zion = new Location();
$zion->setName("Zion");

echo "<i> Behold the birth of " . $zion->getName();
echo "</i><br>";

//DDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD
//writing zion to database
echo "Now, writing it to the holy scrolls";

$locationmapper = new LocationMapper($db);
$lresult = $locationmapper->createLocation($zion);
$zion = NULL;

echo "zion in scrolls, memory purged<br>";

$locarray =  $locationmapper->retrieveLocationByName("Zion");


//print_r($locarray);

$newzion = new Location();

$newzion = $locarray[0];

echo "o lord please <br>";
echo $newzion->getName();













//-------------------------------------------------------  making new hovercraft

   
/*
echo "<i> making neo <br></i>";

$neo = new Human("Neo");


fullhumanreport($neo);

echo "<i> add neo to ship <br> </i>";

$neo->setHovercraft($neb);

echo "hovercraft set?";


fullhumanreport($neo);
*/












     ?>
    </body>
</html>
