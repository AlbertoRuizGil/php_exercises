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

    if(isset($_COOKIE["user"])){
      echo "<h1 class='logged--maintitle'>Welcome " . $_COOKIE["user"] . "</h1>";
      echo <<<EOD
      <form method="post">
        <input type="submit" class="logout-btn" value="Logout" name="logout">
      </form>
EOD;
    }else{
      header("Location: error.php");
    }

    if(isset($_POST["logout"])){
      setcookie("user", "", time()-0);
      header("Location: index.php");
    }


  ?>

  
  
</body>
</html>