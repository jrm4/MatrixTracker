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
        
require("human.php");
require("hovercraft.php");
require("./db/dbconn.php");
require("./db/HumanMapper.php");
$db = new Dbconn('localhost', 'Matrix', 'root', 'p|||p');


//require ("crew.php");
//require ("./forms/addhuman.php");
//require ("./forms/addhovercraft.php");

//$neb->fullcrewreport();
//echo "requires done";

// TESTING THE MAPPER:

//CREATE A HUMAN

//$biff = new Human("Biff");

//$biff->fullhumanreport();

// create humanmapper object

$mapper = new HumanMapper($db);



$test_human = new Human("Test1");


$cresult = $mapper->createHuman($test_human);






$allhumans = $mapper->retrieveHumans();



foreach ($allhumans as $human){
    echo "<br>Human 1 is " . $human->getName() ;
}
//


        
        ?>
    </body>
</html>
