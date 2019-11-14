<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

    <?php

        require("functions.php");

        if(!isset($_COOKIE["language"])){
            paintLanguageForm();
        } else if(!isset($_COOKIE["font"]) && !isset($_COOKIE["background"])){
            paintColorForm();
        } else {
            paintForm($_COOKIE["font"], $_COOKIE["background"]);
        }

    ?>



</body>
</html>