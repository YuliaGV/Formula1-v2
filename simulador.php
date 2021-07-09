<?php

session_start();

if (isset($_POST['comenzar'])) {

    $nombrejugador = strip_tags($_POST['nombreJugador']);
    $premio = $_POST['selectPremio'];
    $_SESSION['jugador'] = $nombrejugador;
    $_SESSION['premio'] = $premio;
    
}


if(!array_key_exists('jugador',$_SESSION) && empty($_SESSION['jugador'])) {

	$nombrejugador = "No registra";

}else {
	$nombrejugador=$_SESSION['jugador'];
}


if(!array_key_exists('premio',$_SESSION) && empty($_SESSION['premio'])) {

	$premio = "GP Mónaco";

}else {
	$premio=$_SESSION['premio'];
}




if (isset($_POST['borrarJugador'])) {

	unset($_SESSION['jugador']);
	header("Location: ./index.php");

}


include "piloto.php";

//Creando los objetos piloto, usamos los métodos de la especie de árbol de herencias que creamos

$piloto1 = new Piloto();
$piloto1->setNombrePiloto($nombrejugador);
$piloto1->setPosicion(0);
$piloto1->setModelo('SF1000');
$piloto1->setFabricante('Ferrari');
$piloto1->setCarril(1);
$piloto1->nombrePista = "GP Monaco";
$piloto1->distanciaPista = 100;

$piloto2 = new Piloto();
$piloto2->setNombrePiloto('Lewis Hamilton');
$piloto2->setPosicion(0);
$piloto2->setModelo('W11');
$piloto2->setFabricante('Mercedes');
$piloto2->setCarril(2);
$piloto2->nombrePista = "GP Monaco";
$piloto2->distanciaPista = 100;

$piloto3 = new Piloto();
$piloto3->setNombrePiloto('Max Verstappen');
$piloto3->setPosicion(0);
$piloto3->setModelo('RB16');
$piloto3->setFabricante('Red Bull Racing');
$piloto3->setCarril(3);
$piloto3->nombrePista = "GP Monaco";
$piloto3->distanciaPista = 100;

$piloto4 = new Piloto();
$piloto4->setNombrePiloto('Lando Norris');
$piloto4->setPosicion(0);
$piloto4->setModelo('MCL35');
$piloto4->setFabricante('McLaren');
$piloto4->setCarril(4);
$piloto4->nombrePista = "GP Monaco";
$piloto4->distanciaPista = 100;

$piloto5 = new Piloto();
$piloto5->setNombrePiloto('Valtteri Bottas');
$piloto5->setPosicion(0);
$piloto5->setModelo('W11');
$piloto5->setFabricante('Mercedes');
$piloto5->setCarril(5);
$piloto5->nombrePista = "GP Monaco";
$piloto5->distanciaPista = 100;

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="build/css/app.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">

    <title>Simulador F1</title>

</head>

<body>

    <header class="header">

        <div class="contenedor contenido-header">

            <a class="logo" href="index.php">
                <h1>F1 Simulador</h1>
            </a>

            <nav class="navegacion-principal">
                <a href="index.php">Inicio</a>
                <a href="simulador.php">Simulador</a>
                <a href="historial.php">Historial</a>
            </nav>

        </div>

    </header>

        <!-- Page content-->
        <div class="contenedor">

            <h2 class="mt-5">En sus marcas...</h2>
           
        <form class="datos-jugador" method="post" action="simulador.php">

            <div class="form-group">
                <label for="jugador">Jugador:</label>
                <input style="font-size: 1.8rem;" autofocus class="form-control" name="jugador" required type="text" id="jugador" value="<?php echo $nombrejugador ?>" disabled>
            </div>

            <div class="form-group">
                <label for="premio">Premio:</label>
                <input style="font-size: 1.8rem;" autofocus class="form-control" name="premio" required type="text" id="premio" value="<?php echo $premio ?>" disabled>
            </div>


            <button type="submit" name="borrarJugador" class="btn btn-success">Borrar jugador</button> 

        </form> 


        <div class="text-center">

                <table class="display" id="tablajugadores">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Fabricante</th>
                            <th>Modelo</th>
                            <th>Carril</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $piloto1->nombrePiloto;?></td>
                            <td><?php echo $piloto1->fabricante;?></td>
                            <td><?php echo $piloto1->modelo;?></td>
                            <td><?php echo $piloto1->numeroCarril;?></td>
                        </tr>
                        <tr>
                            <td><?php echo $piloto2->nombrePiloto;?></td>
                            <td><?php echo $piloto2->fabricante;?></td>
                            <td><?php echo $piloto2->modelo;?></td>
                            <td><?php echo $piloto2->numeroCarril;?></td>
                        </tr>
                        <tr>
                            <td><?php echo $piloto3->nombrePiloto;?></td>
                            <td><?php echo $piloto3->fabricante;?></td>
                            <td><?php echo $piloto3->modelo;?></td>
                            <td><?php echo $piloto3->numeroCarril;?></td>
                        </tr>
                        <tr>
                            <td><?php echo $piloto4->nombrePiloto;?></td>
                            <td><?php echo $piloto4->fabricante;?></td>
                            <td><?php echo $piloto4->modelo;?></td>
                            <td><?php echo $piloto4->numeroCarril;?></td>
                        </tr>
                        <tr>
                            <td><?php echo $piloto5->nombrePiloto;?></td>
                            <td><?php echo $piloto5->fabricante;?></td>
                            <td><?php echo $piloto5->modelo;?></td>
                            <td><?php echo $piloto5->numeroCarril;?></td>
                        </tr>
                    </tbody>
                </table>


        </div>

        
        <form class="inicio-carrera" method="post" action="carrera.php" style="max-width: 20rem;">
        
        <button style="font-size:1.4rem;" type="submit" class="btn btn-primary mb-2">Iniciar carrera</button>

        </form>

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