<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripcion</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="card">
    <h3>Aqui puedes añadir un deporte</h3>
    <form action="index.php?c=Deportes&m=funcionagregarDeporte" method="POST" enctype="multipart/form-data">  
            <label>Nombre:
            <input type="text" name="nombreDep" placeholder="Introduzca el nombre del deporte a agregar"/> 
            <label>Imagen:
            <input type="file" name="imagen" value="null" placeholder="Introduzca una imagen para el deporte a agregar"/>
            <br><br>
            <button type="submit">Agregar Deporte</button>

    </form>
    <br><br>
    <h2>Lista de Deportes</h2>
    <ul>
        <?php
            if(isset($datos) && is_array($datos)){
                foreach($datos as $deporte){
                    echo "<li>".$deporte['nombreDep'];
                    if(isset($deporte['imagen']) && $deporte['imagen'] != ""){
                        echo " - <img src=".RUTA_IMAGENES.$deporte['imagen']." >";
                    }
                    echo " <a href='index.php?c=Deportes&m=vistaModificarDeporte&id=".$deporte['idDeporte']."'>Modificar</a> - <a href='index.php?c=Deportes&m=borrarDeporte&id=".$deporte['idDeporte']."'>Eliminar</a></li>";
                }
            } else {
                echo "<li>No hay deportes.</li>";
            }
        ?>
    </ul>
    <br>
    <a href="index.php?c=Usuarios&m=volverPanelAdmin" class="link-button-back">Volver</a>
    </div>
</body>
</html>
