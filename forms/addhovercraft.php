
    <head>
        <meta charset="UTF-8">
        <title>This is the title</title>
    </head>
    <body>

<?php

$root = $_SERVER["DOCUMENT_ROOT"] . "/MatrixTracker";
echo "root doc is $root";
require_once "$root/allrequires.php";



echo "        <h4> Add new Hovercraft </h4>";
echo "        <form action='hovercraftadded.php' method='post'>";
echo "        Please enter a name: <input name='name' type='text' />";
echo "           <br>";
echo "            Is the craft currently functional?<br>"; 
echo "            <input type='radio' name='is_functional' value='TRUE'> Yes <br>";
echo "            <input type='radio' name='is_functional' value='FALSE'> No <br>";
            
 echo "           Note: If jacked in, you must set this elsewhere<br>";
            
echo "            <select>";
echo "            Where is the ship?";


        

echo "<option value=''> None Assigned </option>"; 
echo "<option value=''> Mystery </option>";             

                
                $lmapper = new LocationMapper($db);
                var_dump($db);
                
                
                $larray = $lmapper->retrieveAllLocations();
                var_dump($larray);
                foreach ($larray as $this_loc){
                    print_r($this_loc);
                    echo "<option value=$this_loc > $this_loc->getName() </option>";
                }
            

     
    echo "        </select>";
   echo "        <br>";
  echo "         <input type='submit' />";
 /*       </form>
        
          form -- end.
    </body></html>

*/
   
        
 ?>       
        