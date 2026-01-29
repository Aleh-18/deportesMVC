<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aviso</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div id="loginForm" style="text-align:center;">
        <h2>Aviso</h2>
        <p style="color:red;font-weight:bold;">
            <?php 
                echo isset($controlador->mensaje) ? $controlador->mensaje : ''; 
            ?>
        </p>
        <a href="index.php" style="display:inline-block;margin-top:20px;">Volver al Inicio</a>
        <br>
        <a href="javascript:history.back()" style="display:inline-block;margin-top:10px;background:#666;">Volver Atrás</a>
    </div>
</body>
</html>
