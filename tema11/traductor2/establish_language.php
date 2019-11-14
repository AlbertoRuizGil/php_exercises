<?php

    setcookie("language", $_POST["language"], time()+60);

    header("Location: index.php");

?>