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

    <form action="formulario.php" method="post">

        Nombre <br>
        <input type="text" name="nombre" placeholder="Nombre"><br>

        Sexo <br>
        <input type="radio" name="sexo" value="hombre" checked> Hombre<br>
        <input type="radio" name="sexo" value="mujer"> Mujer<br>

        Idioma <br>
        <select name="idioma">

            <option value="ingles">Inglés</option>
            <option value="frances">Francés</option>
            <option value="espanol">Español</option>
            <option value="portugues">Portugues</option>
            <option value="italiano">Italiano</option>

        </select> <br>

        Nacionalidad <br>
        <select name="nacionalidad">

            <option value="ingles">Inglés</option>
            <option value="frances">Francés</option>
            <option value="espanol">Español</option>
            <option value="portugues">Portugues</option>
            <option value="italiano">Italiano</option>

        </select><br>

        Aficiones <br>
        <select name="aficiones">

            <option value="deportes">Deportes</option>
            <option value="musica">Música</option>
            <option value="coches">Coches</option>
            <option value="naturaleza">Naturaleza</option>
            <option value="informatica">Informática</option>

        </select><br>

        <input type="submit" value="Enviar">
       
    
    </form>
    
</body>
</html>