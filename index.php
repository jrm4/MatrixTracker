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

//DB MAPPING
require("./db/dbconn.php");
require("./db/HumanMapper.php");
require("./db/LocationMapper.php");

//VIEW
require("./view/fullreports.php");



$zion = new Location();

$zion->setName("Zion");

echo "<i> Behold the birth of " . $zion->getName();
echo "</i><br>";

$zion = NULL;
/* write to db
echo "Now, writing it to the holy scrolls";
$db = new Dbconn('localhost','Matrix','root','p|||p');
$lmapper = new LocationMapper($db);
$cresult = $lmapper->createLocation($zion);
echo "zion has been added to the scrolls";
*/

$neb = new Hovercraft("Nebuchadnezzar");
echo "<i> making the neb <br> </i>";

fullhovercraftreport($neb);






/*
 *
$neb->setLocation($zion);

echo "<i> <br> MOOOOVING SHIP to zion</i>";


fullhovercraftreport($neb);

echo "<i> making neo <br></i>";

$neo = new Human("Neo");


fullhumanreport($neo);

echo "<i> add neo to ship <br> </i>";

$neo->setHovercraft($neb);

echo "hovercraft set?";


fullhumanreport($neo);













     ?>
    </body>
</html>
