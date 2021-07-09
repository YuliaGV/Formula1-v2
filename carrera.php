<?php 


include_once "simulador.php";  //Aquí tenemos los objetos creados

$nombreOro = "";
$nombrePlata = "";
$nombreBronce = "";

$carrilOro = "";
$carrilPlata = "";
$carrilBronce = "";

$msgpodium = "";


//Asignación de avance en la pista 

$piloto1->setPosicion(100*rand(1,6)); //Usamos el método setter que declaramos por allá en la clase piloto
$piloto2->setPosicion(100*rand(1,6));
$piloto3->setPosicion(100*rand(1,6));
$piloto4->setPosicion(100*rand(1,6));
$piloto5->setPosicion(100*rand(1,6));


$pilotos = array($piloto1, $piloto2, $piloto3, $piloto4, $piloto5); //Organizamos los objetos en un arreglo

usort($pilotos, function($primero,$segundo){   //Ordenando el arreglo
    return $primero->posicion < $segundo->posicion;
});

//Ahora sí, el podium 

$nombreOro = $pilotos[0]->getNombrePiloto();
$nombrePlata = $pilotos[1]->getNombrePiloto();
$nombreBronce = $pilotos[2]->getNombrePiloto();


$carrilOro = $pilotos[0]->getNumeroCarril();
$carrilPlata = $pilotos[1]->getNumeroCarril();
$carrilBronce = $pilotos[2]->getNumeroCarril();


if(($nombreOro != $nombrejugador) && ($nombrePlata != $nombrejugador) && ($nombreBronce != $nombrejugador)){
    $msgpodium = "<p>&#128542 No alcanzaste ningún lugar en el podium, ".$nombrejugador."</p>";

} else {
    $msgpodium = "<p>&#128512 ¡Wow! alcanzaste un lugar en el podium, ".$nombrejugador."</p>";
}


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <link href="build/css/app.css" rel="stylesheet">

    <title>Carrera</title>

</head>

<body>


<div class="contenedor contenido-podium">

    <div class="podium">

        <div class="podium-cabecera">
            <img src="src/img/award-fill.svg" style="height:5rem; width: 5rem;" alt="Award">
            <h2 class="mt-5">El podium</h1>
        </div>

        <table class=tabla-podium>
            <thead>
                <tr>
                    <th>Posición</th>
                    <th>Piloto</th>
                    <th>Carril</th>
                    
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Primero</td>
                    <td><?php echo $nombreOro;?></td>
                    <td><?php echo $carrilOro;?></td>
                </tr>
                <tr>
                    <td>Segundo</td>
                    <td><?php echo $nombrePlata;?></td>
                    <td><?php echo $carrilPlata;?></td>
                </tr>
                <tr>
                    <td>Tercero</td>
                    <td><?php echo $nombreBronce;?></td>
                    <td><?php echo $carrilBronce;?></td>
                </tr>
            
            </tbody>
        </table>

    </div>


    <div class="podium-descrip" >
        <?php echo $msgpodium; ?>


    <form method="post" action="historial.php" style="max-width: 60rem;">

        <input type="text" style="display:none" name="jugador" value="<?php echo $nombrejugador;?>">
        <input type="text" style="display:none" name="premio" value="<?php echo $premio;?>">
        <input type="text" style="display:none" name="oro" value="<?php echo $nombreOro;?>">
        <input type="text" style="display:none" name="plata" value="<?php echo $nombrePlata;?>">
        <input type="text" style="display:none" name="bronce" value="<?php echo $nombreBronce;?>">

        <button type="submit" name="guardarResultado" class="btn btn-success">Guardar mi resultado</button> 
        <a href="historial.php">Ver el historial de resultados</a>
        
    </form>

    </div>

 </div>

    
</body>

<script language="javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

    <script type="text/javascript">
	$(document).ready(function() {
		$('#tablajugadores').DataTable();
	} );
    </script>


</html>

