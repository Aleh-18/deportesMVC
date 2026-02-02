<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inscripción</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <form action="index.php?c=Inscripcion&m=registrarUsuario" method="POST" id="loginForm">
        <h2>Inscripción</h2>
        <label for="username">Nombre usuario: (no se puede repetir)</label>
        <input type="text" name="username"/>
        <br/><br/>
        <label for="nombre_completo">Apellidos y Nombre:</label>
        <input type="text" name="nombre_completo"/>
        <br/><br/>
        <label for="password">Contraseña:</label>
        <input type="password" name="password"/>
        <br/><br/>
        <label for="email">Correo:</label>
        <input type="email" name="email"/>
        <br/><br/>
        <label for="telefono">Teléfono: </label>
        <input type="tel" name="telefono" placeholder="Opcional"/>
        <br/><br/>
        <label >Deportes: (un alumno puede inscribirse en más de un deporte)</label>
        <br/><br/>
        <?php
            // Validamos que $datos exista si no es que no hay deportes en la bd
            if (isset($datos) && is_array($datos)) {
                foreach($datos as $deporte) {
                    echo '<label for="'.$deporte['idDeporte'].'" class="checkbox-label"><input type="checkbox" name="deportes[]" value="'.$deporte['idDeporte'].'"/> '.$deporte['nombreDep'].'<img src="'.RUTA_IMAGENES.$deporte['imagen'].'"/></label><br/>';
                }
            } else {
                echo "<p>No hay deportes disponibles en este momento.</p>";
            }
        ?>
        <br/><br/>
        <label>
            Acepto las condiciones <input type="checkbox" name="condiciones"/> **
        </label>
        <br/><br/>
        <button type="submit" class="btn-submit-green">ENVIAR</button>
        <a href="index.php?c=Usuarios&m=pantallaInicio" class="btn-cancel">Volver</a>
    </form>
</body>
</html>
