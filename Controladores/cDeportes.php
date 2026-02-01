<?php

require_once 'Modelos/mCrudDeportes.php';

Class cDeportes{
    private $modeloCrudDeportes;
    public $mensaje;
    public $vista;

    public function __construct() {
        $this->modeloCrudDeportes = new mCrudDeportes();
        $this->vista='';
        $this->mensaje=null;
    }

    public function funcionListarDeportes(){
        $datos = $this->modeloCrudDeportes->listarDeportes();
        if(is_array($datos)){
            $this->vista = 'Vistas/listarDeportes.php';
            return $datos;
        }else{
            $this->mensaje = $datos;
            $this->vista = 'Vistas/mensaje.php';
            
        }
    }

    public function vistaModificarDeporte(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $datos = $this->modeloCrudDeportes->verDeporte($id);
            if(is_array($datos)){
                // Simulación de imágenes disponibles en el servidor (o leer de carpeta)
                $datos['listaImagenes'] = ['futbol.jpg', 'baloncesto.jpg', 'tenis.jpg', 'padel.jpg', 'natacion.jpg'];
                
                $this->vista = 'Vistas/modificarDeporte.php';
                return $datos;
            }else{
                $this->mensaje = $datos;
                $this->vista = 'Vistas/mensaje.php';
            }
        }
    }

    public function modificarDeporte(){
        $id = $_POST['idDeporte'];
        $nombre = $_POST['nombreDep'];
        $imagen = null;

        if(isset($_POST['imagen']) && !empty($_POST['imagen'])){
             $imagen = $_POST['imagen'];
        }

        $resultado = $this->modeloCrudDeportes->modificarDeporte($id, $nombre, $imagen);

        if($resultado === true){
            // Redirigir a listarDeportes
            return $this->funcionListarDeportes();
        } else {
            $this->mensaje = $resultado;
            $this->vista = 'Vistas/mensaje.php';
        }
    }

    public function funcionagregarDeporte(){
        $nombre = $_POST['nombreDep'];
        $imagen = null;

        if(isset($_POST['imagen']) && !empty($_POST['imagen'])){
             $imagen = $_POST['imagen'];
        }

        $this->modeloCrudDeportes->agregarDeporte($nombre,$imagen);
        $datos = $this->modeloCrudDeportes->listarDeportes();
        if(is_array($datos)){
            $this->vista = 'Vistas/listarDeportes.php';
            return $datos;
        }else{
            $this->mensaje = $datos;
            $this->vista = 'Vistas/mensaje.php';
            
        }
    }
}

?>