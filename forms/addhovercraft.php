
    <head>
        <meta charset="UTF-8">
        <title>Add Hovercraft to Database</title>
    </head>
    <body>

<?php

//session_start();

//if ($_SESSION['is_logged_in'] != "yes"){
//     header("Location: unauth.php");
//}echo "huh";  

require_once('../allrequires.php');

    
    
                $lmapper = new LocationMapper($db);
                
                $larray = $lmapper->retrieveAllLocations();




echo "        <h4> Add new Hovercraft </h4>";
echo "        <form action='hovercraftadded.php' method='post'>";
echo "        Please enter a name: <input name='name' type='text' />";
echo "           <br>";
echo "            Is the craft currently functional?<br>"; 
echo "            <input type='radio' name='is_functional' value='TRUE' CHECKED > Yes <br>";
echo "            <input type='radio' name='is_functional' value='FALSE'> No <br>";
echo " <br><i>NOTE: JACKED-IN status must be modified via update</i><br>";       

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
echo "    <input type='submit' value='add new hovercraft'>";



        
 ?>       
        