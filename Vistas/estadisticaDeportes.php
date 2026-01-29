<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Deportes</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="card" style="margin:20px auto;">
    <h2>Total de deportes inscritos</h2>
    <p style="font-size:2em; font-weight:bold;"><?php echo isset($datos['TotalDeporte']) ? $datos['TotalDeporte'] : 0; ?></p>
    <a href="index.php?c=Usuarios&m=volverPanelAdmin">Volver al inicio</a>
    </div>
</body>
</html>
