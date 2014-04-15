


    <head>
        <meta charset="UTF-8">
        <title>Add human to Database</title>
    </head>
    <body>

<?php
session_start();

    if ($_SESSION['is_logged_in'] != "yes"){
     header("Location: unauth.php");
     exit();
}


require_once("../allrequires.php");

  
 $humanformstart =<<<EOD
        
<h4> Add new human </h4>
        <form action="humanadded.php" method="post">
            Please enter a name: <input name="name" type="text" />
            <br>
            Birthtype:<br> 
            <input type="radio" name="is_redpill" value="TRUE"> Redpill <br>
            <input type="radio" name="is_redpill" value="FALSE"> Natural-Born <br>
            <br>
EOD;
echo $humanformstart;
echo            "Rank: ";
echo '<select name="rank">';
                for ($rank = 0; $rank <= 10; $rank++){
                         echo "<option value=\"" . $rank . "\"> " . $rank . "</option>";
                }
echo '</select>';
echo            "Health: ";
echo '<select name="health">';
                for ($health = 10; $health >= 0; $health--){
                         echo "<option value=\"" . $health . "\"> " . $health . "</option>";
                }
echo '</select>';

echo               '<br>Hovercraft assignment?';
echo      '<select name = "id_hovercraft">';



        echo "<option value=''> None Assigned </option>";
               //this should be easy:
                              
               $allhovercrafts = $hovercraftmapper->retrieveAllHovercrafts();
 

             
               foreach($allhovercrafts as $hovercraft){
                              echo "<option value=\"" . $hovercraft->getId_hovercraft() . "\"> " . $hovercraft->getName() . "</option>";
               }
            ?>
            </select>
          
            <br>
            <input type="submit" value='Add Human' />
        </form>
    </body></html>