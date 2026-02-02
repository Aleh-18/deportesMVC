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

    private function validarDeporte(){
        if(!isset($_POST['nombreDep']) || $_POST['nombreDep']==''){
            return "El nombre del deporte es obligatorio.";
        }
        return true;
    }

    private function verificarSesion(){
        if(!isset($_SESSION['nombreUsuario'])){
            $this->mensaje = "Error: Debes iniciar sesión para acceder a esta sección.";
            $this->vista = 'Vistas/mensaje.php';
            return false;
        }
        return true;
    }

    public function funcionListarDeportes(){
        if(!$this->verificarSesion()) return;

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
        if(!$this->verificarSesion()) return;

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $datos = $this->modeloCrudDeportes->verDeporte($id);
            if(is_array($datos)){
                $this->vista = 'Vistas/modificarDeporte.php';
                return $datos;
            }else{
                $this->mensaje = "Error al cargar el deporte o no existe.";
                $this->vista = 'Vistas/mensaje.php';
            }
        }
    }

    public function modificarDeporte(){
        if(!$this->verificarSesion()) return;

        $validacion = $this->validarDeporte();
        if($validacion !== true){
            $this->mensaje = $validacion;
            $this->vista = 'Vistas/mensaje.php';
            return;
        }

        $id = $_POST['idDeporte'];
        $nombre = $_POST['nombreDep'];
        $imagen = null;

        if(isset($_FILES['imagen'])){
             $imagen = $_FILES['imagen'];
        }

        $resultado = $this->modeloCrudDeportes->modificarDeporte($id, $nombre, $imagen);

        if($resultado === true){
            // Redirigir a listarDeportes
            return $this->funcionListarDeportes();
        } else {
            $this->mensaje = $resultado;
            $this->vista = 'Vistas/mensaje.php';
            return;
        }
    }

    public function funcionagregarDeporte(){
        if(!$this->verificarSesion()) return;

        $validacion = $this->validarDeporte();
        if($validacion !== true){
            $this->mensaje = $validacion;
            $this->vista = 'Vistas/mensaje.php';
            return;
        }

        $nombre = $_POST['nombreDep'];
        $imagen = null;

        if(isset($_FILES['imagen'])){
             $imagen = $_FILES['imagen'];
        }

        $resultado = $this->modeloCrudDeportes->agregarDeporte($nombre, $imagen);
        
        if($resultado === true){
             return $this->funcionListarDeportes();
        }else{
             $this->mensaje = $resultado;
             $this->vista = 'Vistas/mensaje.php';
             return;
        }
    }
    public function borrarDeporte(){
        if(!$this->verificarSesion()) return;
        
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $resultado = $this->modeloCrudDeportes->eliminarDeporte($id);
            if($resultado === true){
                // Redirigir a listarDeportes
                return $this->funcionListarDeportes();
            } else {
                $this->mensaje = $resultado;
                $this->vista = 'Vistas/mensaje.php';
                return;
            }
        }
    }
}

?>