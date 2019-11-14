<?php

    setcookie("language", "", time()-1);
    setcookie("font", "", time()-1);
    setcookie("background", "", time()-1);

    header("Location: index.php");

?>