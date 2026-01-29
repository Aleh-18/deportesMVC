<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripcion</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="card" style="margin:20px auto;">
    <h2>Inscripciones realizadas</h2>
    <ul><?php
        if(isset($datos) && is_array($datos)){
            foreach($datos as $inscripcion){
                echo "<li>Usuario: ".$inscripcion['nombreUsuario']." - Deporte: ".$inscripcion['nombreDep']."</li>";
            }
        } else {
            echo "<li>No hay inscripciones.</li>";
        }
    ?></ul>
    <a href="index.php?c=Usuarios&m=volverPanelAdmin">Volver al inicio</a>
    </div>
</body>
</html>
