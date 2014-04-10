
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

<?php
/*
include('formfunctions.php');


// maybe include this in a thing

 
require_once("../models/human.php");
require_once("../models/location.php");
require_once("../models/hovercraft.php");

echo "models modelled<br>";
//DB MAPPING
require_once("../db/dbconn.php");
require_once("../db/HovercraftMapper.php");
require_once("../db/HumanMapper.php");
require_once("../db/LocationMapper.php");


// making mappers
$db = new Dbconn('localhost','MatrixNew','root','p|||p');
$locationmapper = new LocationMapper($db);
$hovercraftmapper = new HovercraftMapper($db);
$humanmapper = new HumanMapper($db);

//VIEW
require_once("../view/fullreports.php"); 
*/





?>

        
<h4> Add new Hovercraft </h4>
        <form action="hovercraftadded.php" method="post">
            Please enter a name: <input name="name" type="text" />
            <br>
            Is the craft currently functional?<br> 
            <input type="radio" name="is_functional" value="TRUE"> Yes <br>
            <input type="radio" name="is_functional" value="FALSE"> No <br>
            
            Note: If jacked in, you must set this elsewhere<br>
            
            <select>
            Where is the ship?
            echo "<option value=''> None Assigned </option>"
            <?php
            $locationsarray = $locationmapper->retrieveAllLocations();
                print_r($locationsarray);
            
                foreach ($locationsarray as $this_loc){
                    print_r($this_loc);
                    echo "<option value=$this_loc > $this_loc->getName() </option>";
                }
            
            ?>
          
            </select>
            <br>
            <input type="submit" />
        </form>
    </body></html> 