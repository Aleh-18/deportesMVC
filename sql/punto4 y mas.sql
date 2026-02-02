ALTER TABLE Deportes ADD imagen VARCHAR(255) NULL;


/*Mas consultas de prueba opcionales*/

/*Hacer al final: 
añadir precio a los deportes por ejemplo
añadir un chech al precio add constrint*/

ALTER TABLE Deportes ADD precio DECIMAL(10,2) NULL;

ALTER TABLE Deportes ADD CONSTRAINT chk_precio CHECK (precio >= 0);

