<?php
    require("functions.php");

    if(is_uploaded_file($_FILES["photo"]["tmp_name"])){

        $firstname = cleanstring($_POST["firstname"]);
        $surname = cleanstring($_POST["surname"]);

        $extension =  getextension($_FILES["photo"]["type"]);

        if(isformatvalid($extension)){

            $newfilename= createnewfilename($firstname, $surname, $extension);
            $route= createroute($newfilename);


            move_uploaded_file($_FILES["photo"]["tmp_name"], $route);

            echo <<<EOD

                <div class="curriculum">
                    <img src="$route" alt="photo">
                    <p>$_POST[firstname]</p>
                    <p>$_POST[surname]</p>
                    <p>$_POST[street]</p>
                    <p>$_POST[cp]</p>
                </div>
EOD;

        }else{

            echo $extension . " No es una extensión válida";
        }
        

    }else{
        echo "El archivo no fue enviado correctamente";
    }

?>