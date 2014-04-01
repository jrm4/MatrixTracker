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
require("./models/hovercraft.php");
require("./db/dbconn.php");
require("./db/HumanMapper.php");

//Create human IN MEMORY
$neo = new Human("Neo");

$neo->fullhumanreport();



$db = new Dbconn('localhost','Matrix','root','p|||p');

$mapper = new HumanMapper($db);

//add neo to db
$cresult = $mapper->createHuman($neo);


// there are NO humans in memory.
$neo = NULL;

// Find the person(s) named Neo
$conn = $db->getConnection();
$sql = 'SELECT * from human WHERE name = "Neo"';
$result = $conn->query($sql);

 $result->setFetchMode(PDO::FETCH_CLASS, 'human');
     $humans = $result->fetchAll();
     
     // you should do an if statement for multples here. I'm lazy.
    //$humans[0]->fullhumanreport();
    
     //empty human shell
     $newneo = new Human();
     
     //Drop neo into new object
     $newneo = $humans[0];
     
     //NEO GOT A PROMOTION AND IS JACKED IN
     $newneo->setRank(7);
     $newneo->setIs_jackedin(TRUE);
     
     $newneo->fullhumanreport();
     
     //update entry in db
     $mapper->updateHuman($newneo);

// lets kill NEO, gasp
     $mapper->deleteHuman($newneo->getId());
     
     $switch = new Human("Switch");
     
     $mapper->createHuman($switch);
     
     echo "<br> switch created";
     





     ?>
    </body>
</html>
