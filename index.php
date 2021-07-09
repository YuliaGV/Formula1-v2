<?php

session_start();

if(!array_key_exists('jugador',$_SESSION) && empty($_SESSION['jugador'])) {

	$nombrejugador = "";

}else {
	$nombrejugador=$_SESSION['jugador'];
}


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="build/css/app.css" rel="stylesheet">

    <title>F1 Simulador</title>

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

        <div class="video">

        <div class="overlay">
            <div class="contenedor contenido-video">
                <div class="formulario">
                    <h3>
                        Compite contra los mejores
                    </h3>

                    <form class="inicio" method="post" action="simulador.php" style="max-width: 20rem">

                        <div class="form-group">
                            <label for="nombreJugador">Tu nombre:</label>
                            <input style="font-size:1.8rem; "type="text" class="form-control" id="nombreJugador" name="nombreJugador" value="<?php echo $nombrejugador ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="selectPremio">Selecciona un premio:</label>
                            <select name="selectPremio" id="selectPremio" required>
                            <option value="">Seleccionar</option>
                            <option value="GP Monaco">GP Mónaco</option>
                            <option value="GP Bahrein">GP Bahrein</option>
                            <option value="GP Francia">GP Francia</option>
                            <option value="GP Italia">GP Italia</option>
                            <option value="GP Austria">GP Austria</option>
                            </select>
                        </div>

                        <button class="boton" name="comenzar" type="submit" class="btn btn-primary mb-2">Comenzar</button>
        
                    </form>
                </div>
            </div>
        </div>

        <video controls autoplay muted loop>
            <source src="src/video/carrera.mp4" type="video/mp4">
            <source src="src/video/carrera.ogg" type="video/ogg">
            <source src="src/video/carrera.webm" type="video/webm">
        </video>


        </div>
                <!-- Page content-->
        <div class="contenedor">
                <h1>¿De qué se trata?</h1>

                <p>Es un pequeño simulador en el cual vas a correr una carrera contra los cuatro primeros del ranking:</p>
                <ol>
                <li>Lewis Hamilton</li>
                <li>Max Verstappen</li>
                <li>Lando Norris</li>
                <li>Valtteri Bottas</li>
                </ol>
            
        </div>
    
    </body>

    


</html>