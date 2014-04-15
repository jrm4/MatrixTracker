
    <head>
        <meta charset="UTF-8">
        <title>Update Hovercraft</title>
    </head>
    <body>

<?php


$root = $_SERVER["DOCUMENT_ROOT"] . "/MatrixTracker";
require_once "../allrequires.php";

$_POST = null;


                
                $lmapper = new LocationMapper($db);
                
                $larray = $lmapper->retrieveAllLocations();
                
                //var_dump($larray);

                $hmapper = new HovercraftMapper($db);
                
                $hovarray = $hmapper->retrieveAllHovercrafts();
                




echo "        <h4> update hovercraft </h4>";
echo "        <form action='hovercraftupdated.php' method='post'>";

echo "<br>which craft to update? Note: humans must be (re)assigned via the \"update human \" interface.<br><br>";
echo "<select name='id_hovercraft'>";


            foreach ($hovarray as $this_hov){
                echo "<option value=\"" . $this_hov->getId_hovercraft() . "\"> " . $this_hov->getName() . "</option>";
            }

echo "</select>";            
            
echo "            <br>Is the craft currently functional?<br>"; 
echo "            <input type='radio' name='is_functional' value='TRUE' CHECKED > Yes <br>";
echo "            <input type='radio' name='is_functional' value='FALSE'> No <br>";
echo " Is the craft jacked into the Matrix?<br>";
echo "            <input type='radio' name='is_jackedin' value='TRUE'  > Yes <br>";
echo "            <input type='radio' name='is_jackedin' value='FALSE' CHECKED> No <br>";      
            

echo "<br>";


 echo "            Where has the ship moved to?";                
echo "            <select name='id_location'>";

// this KILLED me forever. As much as i'd like to pass the Hovercraft OBJECT here, I can't, because the 
// form itself lives inside of HTML; specifically the option tag. So I can only deal with plain text here.
// also -- please note how you MUST use escaped quotemarks to correctly pass the variables.

echo "<option value='' SELECTED > Ship has not moved. </option>";
            foreach ($larray as $this_loc){
                echo "<option value=\"" . $this_loc->getId_location() . "\"> " . $this_loc->getName() . "</option>";
            }
        
echo " </select>";
echo "    <input type='submit' value='update hovercraft'>";



        
 ?>       
        