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
//require(".db/dblogin.php"); // ha HA, git will ignore the file. My password is safe.




$db = new Dbconn('localhost','Matrix','root','p|||p');

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

$neo = new Human("Neo");

$neo->setRank(4);

$cresult = $mapper->createHuman($neo);

echo "<br> $cresult is cresult";

$allhumans = $mapper->retrieveHumans();

echo "<ol>";
foreach ($allhumans as $human){
    echo "<li>Human: " . $human->getName() ;
    echo "<br>rank is " . $human->getRank();
    echo "</li>";
}
echo "</ol>";





$neo->fullhumanreport();


$cresult = $mapper->updateHuman($neo);

echo "<br> $cresult is cresult";

$allhumans = $mapper->retrieveHumans();
        
echo "<ol>";
foreach ($allhumans as $human){
    echo "<li>Human: " . $human->getName() ;
    echo "<br>rank is " . $human->getRank();
    echo "</li>";

    echo "</ol>";
}    
        ?>
    </body>
</html>
