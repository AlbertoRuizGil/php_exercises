<?php

  function paintForm($okname="ok", $oksurname="ok", $okpasswd="ok", $okemail="ok", $name="", $surname="", $passwd="", $email=""){
    echo <<<EOD
    <div class="form">
      <h1 class="form--title">Formulario</h1>
      <form action="" method="post">
        <label for="name">Nombre</label></br>
        <input type="text" class="form--text form--text--$okname" name="name" value="$name"></br>
        <label for="surname">Apellidos</label></br>
        <input type="text" class="form--text form--text--$oksurname" name="surname" value="$surname"></br>
        <label for="passwd">Contraseña</label></br>
        <input type="password" class="form--text form--text--$okpasswd" name="passwd" value="$passwd"></br>
        <label for="email">Email</label></br>
        <input type="text" class="form--text form--text--$okemail" name="email" value="$email"></br>
        <label for="genre">Género</label></br>
        <input type="radio" name="genre"><label for="genre">Hombre</label></br>
        <input type="radio" name="genre"><label for="genre">Mujer</label></br></br>
        <label for="hobbies">Aficiones</label></br>
        <input type="checkbox" name="hobbies"><label for="sport">Deportes</label>
        <input type="checkbox" name="hobbies"><label for="read">Leer</label>
        <input type="checkbox" name="hobbies"><label for="cinema">Cine</label></br>
        <input type="submit" value="Enviar" name="submit"></br>
      </form>
    </div>
EOD;
  }

  function generalControl(){
    $name="";
    $surname="";
    $passwd="";
    $email="";
    $okname="ok";
    $oksurname="ok";
    $okpasswd="ok";
    $okemail="ok";

    $namearr=control("name","controlName");
    $surnamearr=control("surname","controlName");
    $passwdarr=control("passwd", "controlPasswd");
    $emailarr=control("email","controlEmail");

    paintForm($namearr[0], $surnamearr[0], $passwdarr[0], $emailarr[0], $namearr[1], $surnamearr[1], $passwdarr[1], $emailarr[1]);
    
  }

  function control($field, $function){
    $fieldarr = array();
    if(isset($_POST[$field])){
      $fieldarr[0]=$function($_POST[$field]);
      if($fieldarr[0]=="ok"){
        $fieldarr[1]=$_POST[$field];
      }else{
        $fieldarr[1]="";
      }
    }else{
      $fieldarr = array("invalid","");
    }
    return $fieldarr;
  }

  function controlName($name){
    require("data.php");
    $name=trim($name);
    $name=str_split($name);
    for($i=0; $i<count($name); $i++){
      if(!in_array($name[$i], $allowedchar)){
        return "invalid";
      }
    }
    return "ok";
  };

  function controlPasswd($passwd){
    if(strlen($passwd)<6){
      return "invalid";
    }else{
      return "ok";
    }
  }

  function controlEmail($email){
    require("data.php");
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
      return "ok";
    }else{
      return "invalid";
    }
  }

  
  function controlGenre(){

  }




?>