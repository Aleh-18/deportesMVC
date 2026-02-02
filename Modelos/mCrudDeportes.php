<?php
    
    require_once 'Modelos/Conexion.php';

    Class mCrudDeportes extends Conexion{

        
        //listar los deportes para el crud
        public function listarDeportes(){
            try{
                $sql= "SELECT * FROM Deportes";
                $stmt = $this->conexion->query($sql);
                $deportes = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $deportes;
            }catch (PDOException $e){
                if($e->getCode() == 2002){
                    return "Error de conexión con el servidor.";
                }else{
                    return "Error";
                }
            }
        }

        //encontrar deporte
        public function verDeporte($id){
            try{
                $sql="SELECT * FROM Deportes WHERE idDeporte=:id";
                $stmt=$this->conexion->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                $deporte=$stmt->fetch(PDO::FETCH_ASSOC);
                return $deporte;
            }catch (PDOException $e){
                if($e->getCode() == 2002){
                    return "Error de conexión con el servidor.";
                }else{
                    return "Error";
                }
            }
        }



        // Modificar deporte
        public function modificarDeporte($id, $nombre, $imagen = null){
            try{
                if($imagen['name'] != ""){
                    $nombreImagen = $imagen['name'];
                    move_uploaded_file($imagen['tmp_name'], "imagenes/" . $nombreImagen);

                    $sql="UPDATE Deportes SET nombreDep = :nombre, imagen = :imagen WHERE idDeporte = :id";
                    $stmt=$this->conexion->prepare($sql);
                    $stmt->bindParam(':imagen', $nombreImagen);
                } else {
                    $sql="UPDATE Deportes SET nombreDep = :nombre WHERE idDeporte = :id";
                    $stmt=$this->conexion->prepare($sql);
                }
                
                $stmt->bindParam(':nombre', $nombre);
                $stmt->bindParam(':id', $id);
                return $stmt->execute();

            }catch (PDOException $e){
                if($e->getCode() == 1062){
                    return "Error: Ya existe un deporte con este nombre.";
                }else if($e->getCode() == 2002){
                    return "Error de conexión con el servidor.";
                }else{
                    return "Error";
                }
            }
        }

        //Agregar deporte
        public function agregarDeporte($nombre, $imagen = null){
            try{
                $nombreImagen = null;
                if($imagen['name'] != ""){
                    $nombreImagen = $imagen['name'];
                    move_uploaded_file($imagen['tmp_name'], "imagenes/" . $nombreImagen);
                }

                $sql="INSERT INTO Deportes (nombreDep, imagen) VALUES (:nombre, :imagen)";
                $stmt=$this->conexion->prepare($sql);
                $stmt->bindParam(':nombre', $nombre);
                $stmt->bindParam(':imagen', $nombreImagen);
                return $stmt->execute();
            }catch (PDOException $e){
                if($e->getCode() == 1062){
                    return "Error: Ya existe un deporte con este nombre.";
                }else if($e->getCode() == 2002){
                    return "Error de conexión con el servidor.";
                }else{
                    return "Error";
                }
            }
        }

        //eliminar deporte
        public function eliminarDeporte($idDeporte){
            try{
                $sql="DELETE FROM Deportes WHERE idDeporte = :id";
                $stmt=$this->conexion->prepare($sql);
                $stmt->bindParam(':id', $idDeporte);
                return $stmt->execute();
            }catch (PDOException $e){
                if($e->getCode() == 1451){
                    return "Error: No se puede eliminar el deporte porque hay usuarios inscritos en él.";
                }else if($e->getCode() == 2002){
                    return "Error de conexión con el servidor.";
                }else{
                    return "Error";
                }
            }
        }

    }
?>