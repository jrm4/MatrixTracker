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
        
$root = $_SERVER["DOCUMENT_ROOT"] . "/MatrixTracker";
echo "root doc is $root";
require_once "$root/allrequires.php";

// NOW,

// CREATE ZION IN MEMORY
$newplace = new Location();
$newplace->setName("Zion");

echo "<i> BEHOLD " . $newplace->getName();
echo "<br> writing to database</i>";



// ADD ZION TO MYSQL DB
$locerror = $locationmapper->createLocation($newplace);

// REMOVE the ZION IN MEMORY SO THAT WE *KNOW* WE'RE only working from the DB
$newplace = NULL;


// RETRIEVE ZION FROM DB so that we have its ID
$locarray = $locationmapper->retrieveLocationByName("Zion");
$newzion = new Location();
$newzion = $locarray[0];



//CREATION OF NEW Ship In MEMORY
$newship = new Hovercraft("Nebuchadnezzar");


//MYSQL CREATE AND RETRIEVAL OF NEB
$hovresult = $hovercraftmapper->createHovercraft($newship);
$hovarray = $hovercraftmapper->retrieveHovercraftsByColumn("name", "Nebuchadnezzar");
$newneb = new Hovercraft();
$newneb = $hovarray[0];



// THIS MOVES THE SHIP. 
$newneb->setId_location($newzion->getId_location());
$newbresult = $hovercraftmapper->updateHovercraft($newneb);

//THIS GETS THE SHIPS LOCATION
$newnewlocation = New Location();
$newnewlocation = $locationmapper->retrieveLocation($newneb->getId_location());

echo "<br>Current Location for " . $newneb->getName();
echo " is " . $newnewlocation->getName();

//CREATION OF PEOPLE

$hum1 = new Human("Neo");
$hum2 = new Human("Trinity");

//echo "<br>people created";
$humerror = $humanmapper->createHuman($hum1);
$humerror = $humanmapper->createHuman($hum2);

$hum1 = NULL;
$hum2 = NULL;

$humanarray = $humanmapper->retrieveAllHumans();
//echo "people retrieved<br>";
//echo "newneb id is " . $newneb->getId_hovercraft();
//echo "<br>";


foreach ($humanarray as $human){
    // Assign to neb
    $human->setId_hovercraft(1);
//    print_r($human);
    $huresult = $humanmapper->updateHuman($human);
    //echo "<br>";
}

echo "db updated?";
//---------------------------------------------------------------------------------------------------

echo "<br><i>let's tell a story. The big ass update, if the sentinels get this info GOD HELP US ALL</i>";

echo "------------------------------------------------------------------";

//get all locations
$locationsarray = $locationmapper->retrieveAllLocations();

foreach ($locationsarray as $this_loc){
    echo "<h1> Location: ";
    echo $this_loc->getName();
    echo "</h1>";
    
    //get all hovercrafts at that location
    $hovercraftsarray = $hovercraftmapper->retrieveHovercraftsByColumn("id_location", $this_loc->getId_location());
    
    
    foreach ($hovercraftsarray as $hovercraft){
        echo "<h2> Hovercraft: ";
        echo $hovercraft->getName();
        echo "</h2>";
        
        //get all humans at that hovercraft
        $humansarray = $humanmapper->retrieveAllHumans();
        
        foreach ($humanarray as $human){
            echo "<h3> Crew member: ";
            echo $human->getName();
            echo "</h2>";
        }
       
    }
    
}

echo "hey, just testing something";






     ?>
    </body>
</html>
