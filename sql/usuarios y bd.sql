-- Cuenta estándar: puede consultar y modificar datos normales
CREATE USER 'usuario_basico'@'localhost' IDENTIFIED BY 'clave_basica';
GRANT SELECT, INSERT, UPDATE, DELETE 
ON deportes.* 
TO 'usuario_basico'@'localhost';

-- Cuenta con control total de la base de datos (administración)
CREATE USER 'usuario_root'@'localhost' IDENTIFIED BY 'clave_admin';
GRANT ALL PRIVILEGES 
ON deportes.* 
TO 'usuario_root'@'localhost';

-- Cuenta solo de lectura: no puede inscribir ni tocar nada
CREATE USER 'usuario_lectura'@'localhost' IDENTIFIED BY 'solo_consulta';
GRANT SELECT 
ON deportes.* 
TO 'usuario_lectura'@'localhost';


SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: 'deportes'
--
CREATE DATABASE deportes;
USE  deportes;
-- --------------------------------------------------------




CREATE TABLE Deportes (
  idDeporte 	tinyint unsigned AUTO_INCREMENT PRIMARY KEY,
  nombreDep   	varchar(15) NOT NULL
  ) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
  


CREATE TABLE Usuarios (
  idUsuario 	smallint unsigned AUTO_INCREMENT PRIMARY KEY,
  nombreUsuario varchar(30) NOT NULL UNIQUE,
  apeNombre 	varchar(60) NOT NULL,
  password 		varchar(100) NOT NULL,
  correo 		varchar(60) NOT NULL,
  telefono		char(9)		 NULL,
  perfil 		ENUM('c', 'u') 	NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Usuarios_deportes (
	idDeporte 	tinyint unsigned	NOT NULL,
	idUsuario 	smallint unsigned	NOT NULL,
	PRIMARY KEY (idDeporte, idUsuario)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO Deportes(nombreDep) VALUES
			('fútbol'),
			('baloncesto'),
			('padel'),
			('tenis de mesa');
	
		
INSERT INTO usuarios (nombreUsuario, apeNombre, password, correo, telefono, perfil) VALUES
('coordinador', 'Coordinador Escuelas Deportivas', '123456', 'CoordED@evg.es',  '654321123','c'),
('usuario1', 'usuario 1 Escuelas Deportivas', '1234', 'usuario1@evg.es',  '667788991','u'),
('usuario2', 'usuario 2 Escuelas Deportivas', '1234', 'usuario2@evg.es',  NULL,'u'),
('usuario3', 'usuario 3 Escuelas Deportivas', '1234', 'usuario3@evg.es',  NULL,'u'),
('usuario4', 'usuario 4 Escuelas Deportivas', '1234', 'usuario4@evg.es',  NULL,'u');


INSERT INTO Usuarios_deportes (idDeporte,idUsuario) VALUES
(1,2),
(3,2),
(3,4),
(1,5),
(2,5),
(3,5);