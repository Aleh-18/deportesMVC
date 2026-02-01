<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modificar Deporte</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body id="modificarDeporteBody">
    <h1>Modificar Deporte</h1>
    <form id="modificarDeporteBody" action="index.php?c=Deportes&m=modificarDeporte" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="idDeporte" value="<?php echo $datos['idDeporte']; ?>">
        
        <label>Nombre:</label>
        <input type="text" name="nombreDep" value="<?php echo $datos['nombreDep']; ?>">
        <br><br>
        
        <label>Imagen (Dejar vacío para mantener la actual):</label>
        <input type="file" name="imagen">
        <br><br>
        
        <button type="submit">Modificar</button>
    </form>
</body>
</html>
