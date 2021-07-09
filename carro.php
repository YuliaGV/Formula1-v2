<?php

include "carril.php";

class Carro extends Carril{

//Variables o atributos
var $modelo;
var $fabricante;


//Métodos o funciones 
public function getModelo()
{
    return $this->modelo;
}

public function setModelo($modelo)
{
    $this->modelo = $modelo;
}

public function setFabricante($fabricante)
{
    $this->fabricante = $fabricante;
}


public function getFabricante()
{
    return $this->fabricante;
}

}


?>