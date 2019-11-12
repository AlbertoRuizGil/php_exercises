 <?php

    function getJSON($language){
        $str = file_get_contents('./languages.json');
        $languages = json_decode($str, true);
        return $languages[$language];
    }

    function paintForm($language){

        $selectedlanguage = getJSON($language);
        setcookie("language", $language, time()+60);
        
        //Pîntamos el formulario de configuración
        echo <<<EOD

        <div class="language">
            <form action="" method="post">

                <select name="language">
                    <option disabled selected>{$selectedlanguage['select']['label']}</option>
                    <option value="es">{$selectedlanguage['select']['options']['es']}</option>
                    <option value="en">{$selectedlanguage['select']['options']['en']}</option>
                </select>

                <select label="font">
                    <option disabled selected>{$selectedlanguage['font']['label']}</option>
                    <option value="yellow">{$selectedlanguage['colors']['yellow']}</option>
                    <option value="blue">{$selectedlanguage['colors']['blue']}</option>
                </select>

                <select label="background">
                    <option disabled selected>{$selectedlanguage['background']['label']}</option>
                    <option value="red">{$selectedlanguage['colors']['red']}</option>
                    <option value="green">{$selectedlanguage['colors']['green']}</option>
                </select>

                <input type="submit" value="{$selectedlanguage['submit']['label']}">

            </form>
        </div>
EOD;


        echo <<<EOD

        <div class="login">

            <form action="" method="post">

                <p>Login</p>
                <input type="text" name="name" placeholder="{$selectedlanguage['login']['user']}"><br>
                <input type="password" name="passwd" placeholder="{$selectedlanguage['login']['passwd']}"><br>
                <input type="submit" name="submit" value="{$selectedlanguage['login']['submit']}">


            </form>

        </div>
EOD;
    }

?>

