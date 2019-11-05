CREATE TABLE `auditoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tabla` varchar(200) NOT NULL,
  `idtabla` int  NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `fecha` datetime NOT NULL,
   primary key(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- -----------------------------------------------------
-- Triggers Tabla usuarios
-- -----------------------------------------------------
DELIMITER //
CREATE TRIGGER usuarios_AU AFTER UPDATE ON usuarios
   FOR EACH ROW
BEGIN
     INSERT INTO auditoria(tabla,idtabla,tipo,usuario,fecha) 
     VALUES('usuarios',OLD.id,'Update',USER(),NOW());
END
DELIMITER //
CREATE TRIGGER usuarios_AI AFTER INSERT ON usuarios
   FOR EACH ROW
BEGIN
     INSERT INTO auditoria(tabla,idtabla,tipo,usuario,fecha) 
     VALUES('usuarios',NEW.id,'Insert', USER(),NOW());
END //
DELIMITER //
CREATE TRIGGER usuarios_AD AFTER DELETE ON usuarios
   FOR EACH ROW
BEGIN
     INSERT INTO auditoria(tabla,idtabla,tipo,usuario,fecha) 
     VALUES('usuarios',OLD.id,'Delete', USER(),NOW());
END //

-- -----------------------------------------------------
-- Triggers Tabla categorias
-- -----------------------------------------------------
DELIMITER //
CREATE TRIGGER categorias_AU AFTER UPDATE ON categorias
   FOR EACH ROW
BEGIN
     INSERT INTO auditoria(tabla,idtabla,tipo,usuario,fecha) 
     VALUES('categorias',OLD.id,'Update', USER(),NOW());
END //

DELIMITER //
CREATE TRIGGER categorias_AI AFTER INSERT ON categorias
   FOR EACH ROW
BEGIN
     INSERT INTO auditoria(tabla,idtabla,tipo,usuario,fecha) 
     VALUES('categorias',NEW.id,'Insert', USER(),NOW());
END //

DELIMITER //
CREATE TRIGGER categorias_AD AFTER DELETE ON categorias
   FOR EACH ROW
BEGIN
     INSERT INTO auditoria(tabla,idtabla,tipo,usuario,fecha) 
     VALUES('categorias',OLD.id,'Delete', USER(),NOW());
END //

-- -----------------------------------------------------
-- Triggers Tabla clientes
-- -----------------------------------------------------

DELIMITER //
CREATE TRIGGER clientes_AU AFTER UPDATE ON clientes
   FOR EACH ROW
BEGIN
     INSERT INTO auditoria(tabla,idtabla,tipo,usuario,fecha) 
     VALUES('clientes',OLD.id,'Update', USER(),NOW());
END //

DELIMITER //

CREATE TRIGGER clientes_AI AFTER INSERT ON clientes
   FOR EACH ROW
BEGIN
     INSERT INTO auditoria(tabla,idtabla,tipo,usuario,fecha) 
     VALUES('clientes',NEW.id,'Insert', USER(),NOW());
END //

DELIMITER //
CREATE TRIGGER clientes_AD AFTER DELETE ON clientes
   FOR EACH ROW
BEGIN
     INSERT INTO auditoria(tabla,idtabla,tipo,usuario,fecha) 
     VALUES('clientes',OLD.id,'Delete', USER(),NOW());
END //

-- -----------------------------------------------------
-- Triggers Tabla divisas
-- -----------------------------------------------------
DELIMITER //
CREATE TRIGGER divisas_AU AFTER UPDATE ON divisas
   FOR EACH ROW
BEGIN
     INSERT INTO auditoria(tabla,idtabla,tipo,usuario,fecha) 
     VALUES('divisas',OLD.id,'Update', USER(),NOW());
END //

DELIMITER //
CREATE TRIGGER divisas_AI AFTER INSERT ON divisas
   FOR EACH ROW
BEGIN
     INSERT INTO auditoria(tabla,idtabla,tipo,usuario,fecha) 
     VALUES('divisas',NEW.id,'Insert', USER(),NOW());
END //

DELIMITER //
CREATE TRIGGER divisas_AD AFTER DELETE ON divisas
   FOR EACH ROW
BEGIN
     INSERT INTO auditoria(tabla,idtabla,tipo,usuario,fecha) 
     VALUES('divisas',OLD.id,'Delete',USER(),NOW());
END //

-- -----------------------------------------------------
-- Triggers Tabla productos
-- -----------------------------------------------------
DELIMITER //
CREATE TRIGGER productos_AU AFTER UPDATE ON productos
   FOR EACH ROW
BEGIN
     INSERT INTO auditoria(tabla,idtabla,tipo,usuario,fecha) 
     VALUES('productos',OLD.id,'Update', USER(),NOW());
END //
DELIMITER //
CREATE TRIGGER productos_AI AFTER INSERT ON productos
   FOR EACH ROW
BEGIN
     INSERT INTO auditoria(tabla,idtabla,tipo,usuario,fecha) 
     VALUES('productos',NEW.id,'Insert', USER(),NOW());
END //
DELIMITER //
CREATE TRIGGER productos_AD AFTER DELETE ON productos
   FOR EACH ROW
BEGIN
     INSERT INTO auditoria(tabla,idtabla,tipo,usuario,fecha) 
     VALUES('productos',OLD.id,'Delete', USER(),NOW());
END //

-- -----------------------------------------------------
-- Triggers Tabla ventas
-- -----------------------------------------------------
DELIMITER //
CREATE TRIGGER ventas_AU AFTER UPDATE ON ventas
   FOR EACH ROW
BEGIN
     INSERT INTO auditoria(tabla,idtabla,tipo,usuario,fecha) 
     VALUES('ventas',OLD.id,'Update', USER(),NOW());
END //
DELIMITER //
CREATE TRIGGER ventas_AI AFTER INSERT ON ventas
   FOR EACH ROW
BEGIN
     INSERT INTO auditoria(tabla,idtabla,tipo,usuario,fecha) 
     VALUES('ventas',NEW.id,'Insert', USER(),NOW());
END //
DELIMITER //
CREATE TRIGGER ventas_AD AFTER DELETE ON ventas
   FOR EACH ROW
BEGIN
     INSERT INTO auditoria(tabla,idtabla,tipo,usuario,fecha) 
     VALUES('ventas',OLD.id,'Delete', USER(),NOW());
END //