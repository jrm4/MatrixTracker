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
        
        
require("./models/human.php");
require("./models/location.php");
require("./models/hovercraft.php");
require("./db/dbconn.php");
require("./db/HumanMapper.php");
require("./view/HumanReport.php");
require("./db/LocationMapper.php");


$zion = new Location();

$zion->setName("Zion");

echo "Behold the birth of " . $zion->getName();

echo "Now, writing it to the holy scrolls";

$db = new Dbconn('localhost','Matrix','root','p|||p');

$lmapper = new LocationMapper($db);

$cresult = $lmapper->createLocation($zion);

echo "zion has been added to the scrolls";









     ?>
    </body>
</html>
