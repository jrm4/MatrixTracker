
    <head>
        <meta charset="UTF-8">
        <title>Add Hovercraft to Database/title>
    </head>
    <body>

<?php

echo "huh";
$root = $_SERVER["DOCUMENT_ROOT"] . "/MatrixTracker";
require_once "$root/allrequires.php";

$_POST = null;


                
                $lmapper = new LocationMapper($db);
                
                $larray = $lmapper->retrieveAllLocations();




echo "        <h4> Add new Hovercraft </h4>";
echo "        <form action='hovercraftadded.php' method='post'>";
echo "        Please enter a name: <input name='name' type='text' />";
echo "           <br>";
echo "            Is the craft currently functional?<br>"; 
echo "            <input type='radio' name='is_functional' value='TRUE'> Yes <br>";
echo "            <input type='radio' name='is_functional' value='FALSE'> No <br>";
            
 echo "           Note: If jacked in, you must set this elsewhere<br>";
 echo "            Where is the ship?";                
echo "            <select name='id_location'>";

// this KILLED me forever. As much as i'd like to pass the Hovercraft OBJECT here, I can't, because the 
// form itself lives inside of HTML; specifically the option tag. So I can only deal with plain text here.
// also -- please note how you MUST use escaped quotemarks to correctly pass the variables.


            foreach ($larray as $this_loc){
                echo "<option value=\"" . $this_loc->getId_location() . "\"> " . $this_loc->getName() . "</option>";
            }
        echo "<option value=''> None Assigned </option>";
echo " </select>";
echo "    <input type='submit' value='add new location'>";



        
 ?>       
        