
<?php

    function paintinitialform(){
        echo <<<EOD
        <form action="./php/processing.php" method="get">

        <h1>procesador de texto</h1>
    
        <textarea name="textbox" id="textbox" cols="30" rows="10" placeholder="Escribe tu texto"></textarea>
        <input type="text" name="searchword" id="searchword">
        <input type="submit" value="buscar" id="searchbtn">
    
        </form>
EOD;
    }

    function paintinitialform($text){
        echo <<<EOD
        <form action="./php/processing.php" method="get">

        <h1>procesador de texto</h1>
    
        <textarea name="textbox" id="textbox" cols="30" rows="10" placeholder="Escribe tu texto">$text</textarea>
        <input type="text" name="searchword" id="searchword">
        <input type="submit" value="buscar" id="searchbtn">
    
        </form>
EOD;
    }

    function search($needle, $haystack){
        $arrhaystack = explode(" ", $haystack);
        for($i=0; $i<count($arrhaystack); $i++){
            
        }
    }
?>