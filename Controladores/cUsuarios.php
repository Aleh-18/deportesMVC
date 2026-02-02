<?php
require_once 'Modelos/mUsuarios.php';

class cUsuarios {
    private $modeloUsuarios;
    public $vista;
    public $mensaje;
    
    public function __construct() {
        $this->modeloUsuarios=new mUsuarios();
        $this->vista='';
        $this->mensaje=null;
    }

    public function pantallaInicio(){
        $this->vista='Vistas/menu.html';
    }
    
    public function pantallaRegistro(){
        $this->vista='Vistas/acceso.php';
    }

    public function volverPanelAdmin(){
        if(isset($_SESSION['nombreUsuario'])){
            $this->vista='Vistas/perfilAdmin.php';
        } else {
             $this->mensaje="Error: Debes iniciar sesión para acceder a esta sección.";
             $this->vista='Vistas/mensaje.php';
        }
    }
    
    public function iniciarSesion(){
        $datos=$this->modeloUsuarios->validarUsuario();
        if($datos===true){
            $this->vista='Vistas/perfilAdmin.php';
        }else{
            $this->mensaje="Error: no tienes acceso de administrador.";
            $this->vista='Vistas/mensaje.php';
            return;
        }
    }

    public function cerrarSesion(){
        session_unset();
        session_destroy();
        $this->vista='Vistas/menu.html';
    }

}
?>
