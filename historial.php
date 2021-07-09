<?php  

//Organizamos consulta para mandar datos a MySQL

include "config.php";

$fecha = date("Y-m-d H:i:s");
$jugador = "";
$premio = "";
$oro = "";
$plata ="";
$bronce ="";


if(isset($_POST['jugador']) && isset($_POST['oro']) && isset($_POST['plata']) && isset($_POST['bronce'])){

    if(($_POST['jugador'] =="") || ($_POST['oro'] =="")|| ($_POST['plata'] =="") || ($_POST['bronce'] =="")){

        header("Location: index.php");
    }else {


        $jugador = $_POST['jugador'];
        $premio = $_POST['premio'];
        $oro = $_POST['oro'];
        $plata = $_POST['plata'];
        $bronce = $_POST['bronce'];

        $link->query("INSERT INTO `historial` (`historial_jugador`,`historial_premio`, `historial_fecha`, `historial_oro`, `historial_plata`, `historial_bronce`) VALUES ('".$jugador."','".$premio."', '".$fecha."', '".$oro."', '".$plata."', '".$bronce."');");
        header("Location: historial.php");

    }

    }


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

        <div class="contenedor contenido-historial">

        <?php

        // Incluir archivo de conexión
       include "config.php";
        // Attempt select query execution
        $sql = "SELECT * FROM historial";

        //funcion para validar el resultado, recibe el link de la conexión y la consulta
        if($result = mysqli_query($link, $sql)){

            if(mysqli_num_rows($result) > 0){
      
            ?>

            <table class="tablahistorial" id="tablahistorial">
                  <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Premio</th>
                            <th>Fecha</th>
                            <th>Oro</th>
                            <th>Plata</th>
                            <th>Bronce</th>
                            
                    </thead>
                    <tbody>
                        
                    <?php 

                  while($row = mysqli_fetch_row($result)){

                  ?>

                  <tr >
                      <td><?php echo $row[1] ?></td>
                      <td><?php echo $row[2] ?></td>
                      <td><?php echo $row[3] ?></td>
                      <td><?php echo $row[4] ?></td>
                      <td><?php echo $row[5] ?></td>
                      <td><?php echo $row[6] ?></td>
                 </tr>

                    <?php 
                            }
                    } else{
                        echo "<p class='lead'><em>Ninguna partida en la base de datos.</em></p>";
                    }
                    } else{
                        echo "Error en la base de datos $sql. " . mysqli_error($link);
                    }

                        ?>

                </tbody >
            </table>


        </div>



        </div>
        
    
    </body>

    <script language="javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

    <script type="text/javascript">
	$(document).ready(function() {
		$('#tablahistorial').DataTable();
	} );
    </script>


</html>