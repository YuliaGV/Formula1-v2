<?php

/*Variable de recurso*/
$link = mysqli_connect('localhost', 'root', 'Kenway74', 'bd_formula1'); //dicen que no es buena idea conectarse desde aquí, soy rebelde -.-

/*revisar conexión y mostrar error*/

if($link ===false){
    die('Error de conexión: ' . mysqli_connect_error());
}
?>