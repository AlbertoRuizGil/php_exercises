<?php
    require("functions.php");

    if(is_uploaded_file($_FILES["photo"]["tmp_name"])){

        $firstname = cleanstring($_POST["firstname"]);
        $surname = cleanstring($_POST["surname"]);
        $street =  cleanstring($_POST["street"]);

        $extension =  getextension($_FILES["photo"]["type"]);

        if(isformatvalid($extension)){

            $newfilename= createnewfilename($firstname, $surname, $extension);
            $route= createroute($newfilename);


            move_uploaded_file($_FILES["photo"]["tmp_name"], $route);

            echo <<<EOD
                <section>
                    <div class="curriculum">
                        <img src="$route" alt="photo">
                        <p>$firstname</p>
                        <p>$surname</p>
                        <p>$street</p>
                        <p>$_POST[cp]</p>
                    </div>
                </section>
EOD;

        }else{

            echo $extension . " No es una extensión válida";
        }
        

    }else{
        echo "El archivo no fue enviado correctamente";
    }

?>