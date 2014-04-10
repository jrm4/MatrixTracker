
    <head>
        <meta charset="UTF-8">
        <title>This is the title</title>
    </head>
    <body>

<?php

$root = $_SERVER["DOCUMENT_ROOT"] . "/MatrixTracker";
echo "root doc is $root";
require_once "$root/allrequires.php";


                
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

            foreach ($larray as $this_loc){
                echo "<option value=\"" . $this_loc->getId_location() . "\"> " . $this_loc->getName() . "</option>";
            }
        echo "<option value=''> None Assigned </option>";
echo " </select>";





/*

echo "<option value=''> None Assigned </option>"; 
          



     
    echo "        </select>";
   echo "        <br>";
  echo "         <input type='submit' />";
 /*       </form>
        
          form -- end.
    </body></html>

*/
   
        
 ?>       
        