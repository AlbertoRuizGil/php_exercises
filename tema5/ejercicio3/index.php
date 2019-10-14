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

    <form action="procesing.php" method="post">
        Nombre <br>
        <input type="text" name="firstname"><br>
        Apellidos <br>
        <input type="text" name="surname"><br>
        Calle <br>
        <input type="text" name="streeet"><br>
        Código postal <br>
        <input type="text" name="cp"><br>
        Foto <br>
        <input type="file" name="photo"><br>
        <br>
        <input type="submit" value="Enviar" name="send">

    </form>
</body>
</html>