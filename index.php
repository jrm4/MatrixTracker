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

//now neo is only in memory
$neo = NULL;

//First, find neo

$conn = $db->getConnection();
$sql = 'SELECT * from human WHERE name = "Neo"';

$result = $conn->query($sql);

print_r($result);



 $result->setFetchMode(PDO::FETCH_CLASS, 'human');
     $humans = $result->fetchAll();
        
 echo "<br> humans is: ";    
$humans[0]->fullhumanreport();


    






     ?>
    </body>
</html>
