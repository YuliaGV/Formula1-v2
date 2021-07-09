<?php

include "carro.php";

class Piloto extends Carro{

//Variables o atributos
var $nombrePiloto;
var $posicion;


//Métodos o funciones 
public function getNombrePiloto()
{
    return $this->nombrePiloto;
}

public function setNombrePiloto($nombrePiloto){

    $this->nombrePiloto = $nombrePiloto;

}

public function getPosicion()
{
    return $this->posicion;
}

public function setPosicion($posicion)
    {
        if(!is_numeric($posicion)){
            throw new Exception('La posición debe ser numérica: '. $posicion);
        }
        else{
        $this->posicion = $posicion;
        }
    }
}





?>
