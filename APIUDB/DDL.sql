CREATE DATABASE apiudb;

CREATE TABLE `apiudb`.`producto` ( 
`codigo` INT NOT NULL, 
`descripcion` VARCHAR(250) NOT NULL , 
`precio` DECIMAL(10,2) NOT NULL , 
PRIMARY KEY (`codigo`)) ENGINE = InnoDB;