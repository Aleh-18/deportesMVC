<?php
require_once 'Modelos/mInscripcion.php';

class cInscripcion {
    private $modeloInscripcion;
    public $vista;
    public $mensaje;
    
    public function __construct() {
        $this->modeloInscripcion=new mInscripcion();
        $this->vista='';
        $this->mensaje=null;
    }

    public function pantallaInscri(){
        $datos=$this->modeloInscripcion->obtenerDeportes();
        if(is_array($datos)){
            $this->vista='Vistas/registroDeportes.php';
            return $datos;
        }else{
            $this->mensaje=$datos; // Si no es array, es un mensaje de error
            $this->vista='Vistas/mensaje.php';
        }
    }

    private function validarUsuario(){
        if(!isset($_POST['username']) || $_POST['username']==''){
            return "El nombre de usuario es obligatorio.";
        }
        if(!isset($_POST['nombre_completo']) || $_POST['nombre_completo']==''){
            return "El nombre completo es obligatorio.";
        }
        if(!isset($_POST['password']) || $_POST['password']==''){
             return "La contraseña es obligatoria.";
        }
        if(!isset($_POST['email']) || $_POST['email']==''){
             return "El email es obligatorio.";
        }
        if (!isset($_POST['deportes']) || empty($_POST['deportes'])) {
             return "Debes seleccionar al menos un deporte.";
        }
         if(!isset($_POST['condiciones'])){
             return "Error: Debes aceptar las condiciones.";
         }
         return true;
    }

    public function registrarUsuario(){
        $validacion = $this->validarUsuario();
        if($validacion !== true){
            $this->mensaje = $validacion;
            $this->vista = 'Vistas/mensaje.php';
            return;
        }

        if(empty($_POST['telefono'])){
            $_POST['telefono']=null;
        }
        $datos=$this->modeloInscripcion->registrarUsuario();
        
        if($datos===true){
            $this->mensaje="Usuario registrado correctamente.";
            $this->vista='Vistas/mensaje.php';
            
        }else{
            $this->mensaje=$datos;
            $this->vista='Vistas/mensaje.php';
            return;
        }
    }


    public function obtenerInscripciones(){
        $datos = $this->modeloInscripcion->obtenerInscripciones();
        if(is_array($datos)){
            $this->vista='Vistas/misDeportes.php';
            return $datos;
        }else{
            $this->mensaje=$datos;
            $this->vista='Vistas/mensaje.php';
        }
    }

    public function totalDeportesInscritos(){
        $datos = $this->modeloInscripcion->totalDeportesInscritos();
        if(is_array($datos)){
            $this->vista='Vistas/estadisticaDeportes.php';
            return $datos;
        }else{
            $this->mensaje=$datos;
            $this->vista='Vistas/mensaje.php';
        }
    }

    public function totalInscripcionesPorDeporte(){
        $datos = $this->modeloInscripcion->totalDeportesUsuarios();
        if(is_array($datos)){
            $this->vista='Vistas/estadisticaUsuarios.php';
            return $datos;
        }else{
            $this->mensaje=$datos;
            $this->vista='Vistas/mensaje.php';
        }
    }
}
?>
