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

    <h1>Elige el número de la tabla de multiplicar</h1>

    <form action="" method="post">
    
        <input type="text" name="num" id="num">

        <input type="submit" name="enviar" value="Enviar" id="enviar">
    
    
    </form>

    <?php

        include("multiply.php");

        if(isset($_POST["enviar"])){
            $num=$_POST["num"];

            multiply_table($num);

        }

    ?>
    
</body>
</html>