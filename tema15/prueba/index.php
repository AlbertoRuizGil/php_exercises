<?php


// Esta es una función de envoltura alrededor de echo
function hacerecho($cadena)
{
    echo $cadena;
}

$hacerecho = 'hacerecho';


function bar($arg = '')
{
    $hacerecho('Buenos dias');
    echo "En bar(); el argumento era '$arg'.<br />\n";
}

$bar = 'bar';

$bar('prueba', $hacerecho);  // Esto llama a bar()

?>