<?php
    require_once 'config/configRutas.php';

    if(isset($_GET['c'])){
        $c = $_GET['c'];
    }else{
        $c = CONTROLADOR_DEFECTO;
    }
    
    if(isset($_GET['m'])){
        $m = $_GET['m'];
    }else{
        $m = METODO_DEFECTO;
    }

    $nombreControlador = 'c'.$c;
    $rutaControlador = 'Controladores/'.$nombreControlador.'.php';

    if(file_exists($rutaControlador)){

        require_once $rutaControlador;
        $controlador = new $nombreControlador();
        
        $datos = $controlador->$m();
        
        require_once $controlador->vista;
    }else{
        echo "El controlador no existe.";
    }
?>