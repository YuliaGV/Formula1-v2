<?php

include "pista.php";

class Carril extends Pista{

//Variables o atributos
var $numeroCarril;


//Métodos o funciones 
public function getNumeroCarril()
{
    return $this->numeroCarril;
}

public function setCarril($carril)
{
    $this->numeroCarril= $carril;
}



}


?>
