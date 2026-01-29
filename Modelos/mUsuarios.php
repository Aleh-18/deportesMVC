<?php
require_once 'Modelos/Conexion.php';

class mUsuarios extends Conexion{
    
    //metodo para comprobar que sea administrador
    public function validarUsuario(){
        $nombreUsuario=$_POST['nombre'];
        $password=$_POST['password'];
        try{
            $sql="SELECT * FROM Usuarios WHERE nombreUsuario=:nombreUsuario AND password=:password AND perfil='c'";
            $stmt=$this->conexion->prepare($sql);
            $stmt->bindParam(':nombreUsuario', $nombreUsuario);
            $stmt->bindParam(':password',$password);
            $stmt->execute();
            
            $SacarId = $stmt->fetch(PDO::FETCH_ASSOC);
            if($SacarId){
                session_start();
                $_SESSION['nombreUsuario']=$nombreUsuario;
                $_SESSION['id'] =$SacarId['idUsuario'];
                return true;
            }else{
                return false;
            }
    }catch (PDOException $e){
            return "Error : ".$e->getMessage();
        }
    }
}
?>
