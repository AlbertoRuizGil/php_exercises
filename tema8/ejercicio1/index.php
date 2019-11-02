<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>
<body>
    
    <?php

        require("./php/functions.php");

        echo "<table class='tabla'>
                <tr>
                    <td>Fecha de hoy</td>
                    <td>" . getdatenew() . "</td>
                </tr>";

        echo "<tr>
                <td>Fecha de mañana</td>
                <td>" . getdatenew("d+1") . "</td>
            </tr>";

        echo "<tr>
                <td>Fecha del lunes siguiente</td>
                <td>" . getdatenew("next monday") . "</td>
            </tr>
            </table>";

    ?>

</body>
</html>