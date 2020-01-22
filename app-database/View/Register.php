<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../CSS/style.css">
  <title>Document</title>
</head>
<body>
  <div class="Register-mainbox">
    <h2 class="Register-mainbox-title"> Registrate</h2>
    <div class="Register-mainbox-register">
      <form action="../Controler/Register.php" method="post">
        <label for="firstname" class="Register-mainbox-register-label">Nombre</label><br>
        <input type="text" name="firstname" class="Register-mainbox-register-input" required><br>
        <label for="surname" class="Register-mainbox-register-label">Apellido</label><br>
        <input type="text" name="surname" class="Register-mainbox-register-input" required><br>
        <label for="email" class="Register-mainbox-register-label">Email</label><br>
        <input type="email" name="email" class="Register-mainbox-register-input" required><br>
        <label for="type" class="Register-mainbox-register-label">Tipo de usuario</label><br>
        <select name="type" class="Register-mainbox-register-input" required>
          <option value="" disabled selected>Elige una</option>
          <option value="basic">Basic</option>
          <option value="premium">Premium</option>
        </select><br>
        <label for="user" class="Register-mainbox-register-label">Nombre de Usuario</label><br>
        <input type="text" name="user" class="Register-mainbox-register-input" required><br>
        <label for="password" class="Register-mainbox-register-label">Contraseña</label><br>
        <input type="password" name="password" class="Register-mainbox-register-input" required>
        <input type="submit" class="Register-mainbox-register-submit" value="Enviar">
      </form>
    </div>
  </div>
  
</body>
</html>

