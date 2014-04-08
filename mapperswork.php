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

echo"<i> making ship <br></i>";
$neb = new Hovercraft("Nebuchadnezzar");
fullhovercraftreport($neb);

$hresutl = $hovercraftmapper->createHovercraft($neb);
$neb = NULL;

$hovarray = $hovercraftmapper->retrieveHovercraftsByColumn('name', 'Nebuchadnezzar');

$newneb = new Hovercraft();

$newneb = $hovarray[0];

fullhovercraftreport($newneb);

echo "<i><br>HERES THE MAGIC, SON";
echo "<br>MOVING HOVERCRAFT</i>";


$newneb->setId_location($newzion);
//$hovercraftmapper->updateHovercraft($newneb);
fullhovercraftreport($newneb);


///--------------------------------------------------------   



echo "<i> KEEP THIS TRAIN GOIN making neo <br></i>";
$neo = new Human("Neo");
//fullhumanreport($neo);

$huresult = $humanmapper->createHuman($neo);
$neo = NULL;

$humanarray = $humanmapper->retrieveHumansByColumn("name", "Neo");
$newneo = new Human();
$newneo = $humanarray[0];
fullhumanreport($newneo);

echo "<i><br> ADDING NEO TO CRAFT</i>";

$newneo->setHovercraft($newneb);


fullhumanreport($newneo);

echo "change stuff";

$newneo->setRank(7);
//$humanmapper->updateHuman($newneo);
$newneo = NULL;


$humanarray = $humanmapper->retrieveHumansByColumn("name", "Neo");
$newnewneo = new Human();
$newnewneo = $humanarray[0];
fullhumanreport($newnewneo);










     ?>
    </body>
</html>
