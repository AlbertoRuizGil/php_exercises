<?php

  function getJSON($language){
    $str = file_get_contents('./languages.json');
    $languages = json_decode($str, true);
    return $languages[$language];
  }

  function paintLanguageForm(){
      echo <<<EOD
      <div class="options">
        <form action="establish_language.php" method="post">
          <select name="language">
              <option disabled selected>Select language</option>
              <option value="es">Spanish</option>
              <option value="en">English</option>
          </select>
          <input type="submit" name="submit" value="Send">
        </form>
      </div>
EOD;
  }


  function paintColorForm(){


    $selectedlanguage = getJSON($_COOKIE["language"]);

    echo <<<EOD
      <div class="options">
        <form action="establish_color.php" method="post">
          <select name="font">
            <option disabled selected>{$selectedlanguage['font']['label']}</option>
            <option value="yellow">{$selectedlanguage['colors']['yellow']}</option>
            <option value="blue">{$selectedlanguage['colors']['blue']}</option>
          </select>

          <select name="background">
            <option disabled selected>{$selectedlanguage['background']['label']}</option>
            <option value="red">{$selectedlanguage['colors']['red']}</option>
            <option value="green">{$selectedlanguage['colors']['green']}</option>
          </select>
          <input type="submit" name="submit" value="{$selectedlanguage['submit']['label']}">
        </form>
      </div>
EOD;
  }

  function paintForm($font, $background){

    $selectedlanguage = getJSON($_COOKIE["language"]);
    echo <<<EOD

      <div class="login" style="color:$font;background-color:$background">
        <form action="" method="post">
          <p>Login</p>
          <input type="text" name="name" placeholder="{$selectedlanguage['login']['user']}"><br>
          <input type="password" name="passwd" placeholder="{$selectedlanguage['login']['passwd']}"><br>
          <input type="submit" name="submit" value="{$selectedlanguage['login']['submit']}">
        </form>
      </div>
      <div class="confg">
        <form action="reestablish.php">

          <input type="submit" name="submit" value="{$selectedlanguage['back']['submit']}">

        </form>
      </div>
EOD;
  }



?>

