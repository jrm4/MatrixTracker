<?php

$form1 = <<<EOD

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
EOD;

echo $form1;


?>