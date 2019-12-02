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

  <h1 class="error--maintitle">
    La sesión ha caducado, será redirigido al inicio en 5 segundos.
  </h1>

  <?php
    header("Refresh:5; url=index.php");
  ?>
  
</body>
</html>