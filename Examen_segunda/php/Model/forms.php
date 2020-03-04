<?php

  function pintaPaso1($db){

    $arr = Tipos::todoTipos($db);
    
    echo <<<EOD
    <h1>Paso 1</h1>
    <form action="./php/Controler/paso1.php" method="post">

      <select name="tipo">
EOD;
    for($i=0; $i<count($arr); $i++){
      echo "<option value='{$arr[$i]['tipo']}'>{$arr[$i]['tipo']}</option>";
    }

    echo <<<EOD
      </select><br>
      <input type="submit" name="next" value="Siguiente>">
    </form>

EOD;
  }

  function pintaPaso2($db){
    $arr = Localidades::todoLocalidades($db);
    
    echo <<<EOD
    <h1>Paso 2</h1>
    <form action="../Controler/paso2.php" method="post">

      <select name="localidad">
EOD;
    for($i=0; $i<count($arr); $i++){
      echo "<option value='{$arr[$i]['lugar']}'>{$arr[$i]['lugar']}</option>";
    }

    echo <<<EOD
      </select><br>
      <input type="submit" name="back" value="<Anterior">
      <input type="submit" name="next" value="Siguiente>">
    </form>

EOD;
  }

  function pintaPaso3(){
    echo <<<EOD
    <h1>Paso 3</h1>
    <form action="../Controler/paso3.php" method="post">
      <label for="dormitorios">Dormitorios</label>
      <input type="radio" name="dormitorios" value="1" checked>1
      <input type="radio" name="dormitorios" value="2">2
      <input type="radio" name="dormitorios" value="3">3
      <input type="radio" name="dormitorios" value="4">4
      <input type="radio" name="dormitorios" value="5">5<br>

      <label for="precio">Precio</label>
      <input type="radio" name="precio" value="0" checked><100000
      <input type="radio" name="precio" value="100000">100000-200000
      <input type="radio" name="precio" value="200000">200000-300000
      <input type="radio" name="precio" value="300000">>300000<br>

      <input type="submit" name="back" value="<Anterior">
      <input type="submit" name="next" value="Siguiente>">
    </form>

EOD;
  }

  function pintaPaso4(){
    echo <<<EOD
    <h1>Paso 4</h1>
    <form action="../Controler/paso4.php" method="post">
      <input type="checkbox" name="garaje" value="si">Garaje
      <input type="checkbox" name="zonascomunes" value="si">Zonas Comunes
      <input type="checkbox" name="padel" value="si">Padel
      <input type="checkbox" name="piscina" value="si">Piscina
      <input type="checkbox" name="jardin" value="si">Jardín<br>

      <input type="submit" name="back" value="<Anterior">
      <input type="submit" name="next" value="Siguiente>">
    </form>
EOD;
    
  }

  function pintaCasas($arr){
    echo <<<EOD
    <table>
      <tr>
        <th>tipo</th>
        <th>zona</th>
        <th>precio</th>
        <th>dormitorios</th>
        <th>garaje</th>
        <th>jardin</th>
        <th>padel</th>
        <th>piscina</th>
        <th>zonas comunes</th>
        <th>imagen</th>
        <th>comprar</th>
      </tr>
EOD;
    for($i=0; $i<count($arr); $i++){
      echo "<tr>";
      echo "<td>{$arr[$i]['tipo']}</td>";
      echo "<td>{$arr[$i]['zona']}</td>";
      echo "<td>{$arr[$i]['precio']}</td>";
      echo "<td>{$arr[$i]['dormitorios']}</td>";
      echo "<td>{$arr[$i]['garaje']}</td>";
      echo "<td>{$arr[$i]['jardin']}</td>";
      echo "<td>{$arr[$i]['padel']}</td>";
      echo "<td>{$arr[$i]['piscina']}</td>";
      echo "<td>{$arr[$i]['zonascomunes']}</td>";
      echo "<td><img src='../.{$arr[$i]['imagen']}'></td>";
      echo <<<EOD
      <td>
        <form action='../Controler/compra.php' method='post'>
          <input type='hidden' name='id_casa' value='{$arr[$i]['id']}'>
          <label for='comprar'>Si</label>
          <input type='radio' name='comprar' value='si' checked>
          <label for='comprar'>No</label>
          <input type='radio' name='comprar' value='no'>
          <input type='submit' value='Elegir selección'>
        </form></td>
EOD;
      echo "</tr>";
    }
    echo "</table>";
  }

  function pintaLogin(){
    echo <<<EOD
    <div class="login">
      <h2 class="login-title">Login</h2>
      <form action="../Controler/login.php" method="post">
        <input type='text' name='email' placeholder='Email'>
        <input type="text" name="user" placeholder="Usuario">
        <input type="password" name="passwd" placeholder="Contraseña">
        <input type="submit" name="submit">
      </form>
    </div>
EOD;
  }

  
  


?>



