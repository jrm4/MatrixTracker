

    <head>
        <meta charset="UTF-8">
        <title>Add human to Database</title>
    </head>
    <body>

<?php

$root = $_SERVER["DOCUMENT_ROOT"] . "/MatrixTracker";
require_once "../allrequires.php";

$_POST = null;


                
                $humanmapper = new HumanMapper($db);
                
                $humanarray = $humanmapper->retrieveAllHumans();
                
//var_dump($humanarray);

        
echo "<h4> update human </h4>";
echo "        <form action='humanupdated.php' method='post'>";

echo "<select name='id_human'>";


            foreach ($humanarray as $this_human){
                echo "<option value=\"" . $this_human->getId_human() . "\"> " . $this_human->getName() . "</option>";
            }
echo "<select>";
        
echo " Is their craft jacked into the Matrix?<br>";
echo "            <input type='radio' name='is_jackedin' value='TRUE'  > Yes <br>";
echo "            <input type='radio' name='is_jackedin' value='FALSE' CHECKED> No <br>";      
        
echo            "Rank: ";
echo '<select name="rank">';
                echo "<option selected value='' > unchanged </option>";
                for ($rank = 0; $rank <= 10; $rank++){
                         echo "<option value=\"" . $rank . "\"> " . $rank; //with javascript or something smarter you could populate this.
                echo "</option>";
                }
echo '</select>';
echo            "Health: ";
echo '<select name="health">';
                echo "<option selected value='' > unchanged </option>";
                for ($health = 10; $health >= 0; $health--){
                         echo "<option value=\"" . $health . "\"> " . $health . "</option>";
                }
echo '</select>';

echo               '<br>Hovercraft assignment?';
echo      '<select name = "id_hovercraft">';



        echo "<option selected value=''> unchanged </option>";
               //this should be easy:
                              
               $allhovercrafts = $hovercraftmapper->retrieveAllHovercrafts();
 

             
               foreach($allhovercrafts as $hovercraft){
                              echo "<option value=\"" . $hovercraft->getId_hovercraft() . "\"> " . $hovercraft->getName() . "</option>";
               }
            ?>
            </select>
          
            <br>
            <input type="submit" value='update human' />
        </form>
    </body></html>