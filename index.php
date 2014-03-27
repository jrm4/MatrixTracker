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

$mapper = new HumanMapper($db);

//Create human IN MEMORY
$neo = new Human("Neo");

$neo->fullhumanreport();

//Create entry for new human Neo in the db
$cresult = $mapper->createHuman($neo);

//now neo is only in the DATABASE. ************************************************************8 
$neo = NULL;

//First, find neo
$conn = $db->getConnection();
$sql = 'SELECT * from human WHERE name = "Neo"';
$result = $conn->query($sql);


// Now pull him out (ha, this metaphor is AWESOME NOW) 
 $result->setFetchMode(PDO::FETCH_CLASS, 'human');
     $humans = $result->fetchAll();

// "Lets take a look at you, Neo"
 echo "<br> humans is: ";    
$humans[0]->fullhumanreport();

//the below is optional, but it helps confirm things for us and for NetBeans
$newneo = new Human(); 

//Again, we ought to test for multiple humans in the array, but not now.
$newneo = $humans[0];


// NEO GOT A PROMOTION. AND IS IN THE MATRIX!
$newneo->setRank(7);
$newneo->setIs_jackedin(TRUE);

// Verify his new status.
$newneo->fullhumanreport();

//Update his entry in mysql. 
$mapper->updateHuman($newneo);

//and now kill him:



$mapper->deleteHuman($newneo->getId());

//and add someone else

$switch = new Human("Switch");

$mapper->createHuman($switch);




     ?>
    </body>
</html>
