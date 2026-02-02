<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aviso</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div id="loginForm" class="text-center">
        <h2>Aviso</h2>
        <p class="error-text">
            <?php 
                echo isset($controlador->mensaje) ? $controlador->mensaje : ''; 
            ?>
        </p>
        <a href="index.php" class="link-button-margin">Volver al Inicio</a>
        <br>
        <a href="javascript:history.back()" class="link-button-back">Volver Atrás</a>
    </div>
</body>
</html>
