<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
  <h1>Login</h1>
  <form action="../Controller/controlLer_login.php" method="post">
    <label for="usuario">Usuario</label>
    <input type="text" name="usuario">
    <label for="email">Email</label>
    <input type="password" name="email">
    <input type="submit" name="submit"value="Enviar">
  </form>

  <div class="error">
    <?php
      if(isset($_SESSION["error"])){
        echo "<p>" . $_SESSION["error"] . "</p>";
        $_SESSION["error"] = "";
      }
    ?>
    </p>
  </div>
</body>
</html>