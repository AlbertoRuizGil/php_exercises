<?php

    function getJSON(){
        $str = file_get_contents('./languages.json');
        $languages = json_decode($str, true);
        return $languages[$_POST['language']];
    }

    function paintForm($language = ""){



    }

?>

<form action="" method="post">

    <select label="/* idioma */">
        <option value="es">/* texto */</option>
        <option value="en">/* texto */</option>
    </select>

    <select label="/* color fuente */">
        <option value="" label="/* texto */">/* texto */</option>
        <option value="en" label="/* texto */">/* texto */</option>
    </select>

    <select label="/* fondo */">
        <option value="" label="/* texto */">/* texto */</option>
        <option value="" label="/* texto */">/* texto */</option>
    </select>

</form>