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


// MAIN DB BEFORE EVERYTHING
require("./db/dbconn.php");
        
        
//MODELS        
require("./models/human.php");
require("./models/location.php");
require("./models/hovercraft.php");
    
//DB MAPPING
require("./db/HumanMapper.php");
require("./db/LocationMapper.php");
require("./db/HovercraftMapper.php");
$db = new Dbconn('localhost','MatrixNew','root','p|||p');

//VIEW
require("./view/fullreports.php");

echo "requires required";

//make Zion

$zion = new Location("Zion");

echo "behold and welcome to " . $zion->getName();
echo "with a pk of " . $zion->getId_location();


echo "writing zion to the magic scrolls";

$lmapper = new LocationMapper($db);
$lresult = $lmapper->createLocation($zion);


// FIRST, WE WILL MAKE A HUMAN

$morfinmemory = new Human("Morpheus");
$morfinmemory->setRank(9);

fullhumanreport($morfinmemory);


// writing him to db
echo "writing to the scrolls";

$mapper = new HumanMapper($db);


$cresult = $mapper->createHuman($morfinmemory);


print_r($cresult);

//remove from memory to be sure
$morfinmemory = NULL;

//lets pull him back

$name = "Morpheus";

$humans = $mapper->findbyname($name);

print_r($humans);













     ?>
    </body>
</html>
