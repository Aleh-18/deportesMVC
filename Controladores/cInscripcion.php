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

    public function registrarUsuario(){
        if($_POST['username']=='' || $_POST['nombre_completo']=='' || $_POST['password']=='' || $_POST['email']==''){
            $this->mensaje="Error: Los campos obligatorios no pueden estar vacíos.";
            $this->vista='Vistas/mensaje.php';
        }else{
            if (!isset($_POST['deportes']) || empty($_POST['deportes'])) {
                $this->mensaje = "Debes seleccionar al menos un deporte.";
                $this->vista = 'Vistas/mensaje.php';
                return;
            }
            if(!isset($_POST['condiciones'])){
                $this->mensaje="Error: Debes aceptar las condiciones.";
                $this->vista='Vistas/mensaje.php';
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
            }
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
