<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

<?php


include('formfunctions.php');


// maybe include this in a thing

 
require("../models/human.php");
require("../models/location.php");
require("../models/hovercraft.php");

echo "models modelled<br>";
//DB MAPPING
require("../db/dbconn.php");
require("../db/HovercraftMapper.php");
require("../db/HumanMapper.php");
require("../db/LocationMapper.php");


// making mappers
$db = new Dbconn('localhost','MatrixNew','root','p|||p');
$locationmapper = new LocationMapper($db);
$hovercraftmapper = new HovercraftMapper($db);
$humanmapper = new HumanMapper($db);

//VIEW
require("../view/fullreports.php"); 

//-------------------------------------------------------------------------------------------
 


echo "CREATIN PEOPLE";
var_dump($_POST);


if (count($_POST) > 0){
    //error checkin
    
    $validationErrors = 0;


    if (count($validationErrors == 0)) {
        $name = $_POST['name'];
    }

    $curr_loc = new Location($name);
    
    echo "location created in memory";
    
    $locationmapper->createLocation($curr_loc);
    
    echo "and on db";
    
    exit();
    
}  


?>


<h4> Add Location </h4>

<form action="addlocation.php" method="post">
    Please identify new location: <input name="name" type="text" />
    <input type="submit" value="add new location"
    
</form>


?>

    </body>
</html>