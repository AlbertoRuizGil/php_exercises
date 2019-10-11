<?php

    function createForm(){

        echo <<<EOD



            
    EOD;
    }

?>

<form action="index.php?count=$count&right=$right&wrong=$wrong">

    <input type="text" name="infinitive" placeholder="Infinitive">
    <input type="text" name="simple" placeholder="Past simple">
    <input type="text" name="participle" placeholder="Past participle">

    <input type="submit" value="Siguiente" name="enviar">

</form>