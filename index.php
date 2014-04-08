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

// NOW,
// 
 






     ?>
    </body>
</html>
