<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./style/style.css">
    <title>Document</title>
</head>
<body>

    <section>
        <div class="curriculum">
            <form action="./php/procesing.php" method="post" enctype="multipart/form-data">
                <p>Nombre</p>
                <input type="text" name="firstname"><br>
                <p>Apellidos</p>
                <input type="text" name="surname"><br>
                <p>Calle</p>
                <input type="text" name="street"><br>
                <p>Código postal</p>
                <input type="text" name="cp"><br>
                <p>Foto</p>
                <input type="file" name="photo"><br>
                <br>
                <input type="submit" value="Enviar" name="send">
            </form>
        </div>
    </section>
</body>
</html>