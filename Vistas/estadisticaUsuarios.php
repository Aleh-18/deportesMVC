<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="card card-centered">
    <h2>Total de inscripciones por deporte</h2>
    <ul>
        <?php
            if(isset($datos) && is_array($datos)){
                foreach($datos as $total){
                    echo "<li>Deporte: ".$total['nombreDep']." - Total de inscritos: ".$total['Total_Gente_Inscrita']."</li>";
                }
            } else {
                 echo "<li>No hay datos disponibles.</li>";
            }
        ?>
    </ul>
    <a href="index.php?c=Usuarios&m=volverPanelAdmin">Volver al inicio</a>
    </div>
</body>
</html>
