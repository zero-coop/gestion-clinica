CREATE DATABASE IF NOT EXISTS clinica;
USE clinica;
# DROP DATABASE clinica;

CREATE TABLE usuarios(
	id              int(11) auto_increment not null,
    nombre_usuario varchar(255) not null,
	nombre          varchar(100) not null,
	apellido      	varchar(255),
	email           varchar(255) not null,
	password        varchar(255) not null,
	rol             varchar(20),
	imagen          varchar(255),
	CONSTRAINT pk_usuarios PRIMARY KEY(id),
	CONSTRAINT uq_email UNIQUE(email)  #que hace UNIQUE?
)ENGINE=InnoDb;

INSERT INTO usuarios VALUES(NULL, 'admin','Admin', 'Admin', 'admin@admin.com', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 'admin', null);
#contraseña encriptada (admin)

CREATE TABLE IF NOT EXISTS medicos(
	id_medico 		INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    nombre 			VARCHAR(50) NOT NULL,
    dni 			VARCHAR(10) NOT NULL,
    especialidad	VARCHAR(50) NOT NULL,
    matricula 		VARCHAR(20) NOT NULL,
    domicilio 		VARCHAR(50),
    telefono 		VARCHAR(20),
    celular 		VARCHAR(20),
    PRIMARY KEY(id_medico)
)ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS obras_sociales(
	id_obrasociales INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    cuit VARCHAR(13) NOT NULL,
    correo VARCHAR(50) NOT NULL,
    telefono VARCHAR(20),
    porcentaje_fact VARCHAR(20),
    tipo_fact VARCHAR(20),
    domicilio VARCHAR(20),
    provincia VARCHAR(20),
    codigo_postal VARCHAR(20),
    PRIMARY KEY(id_obrasociales)
)ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS pacientes(
	id_paciente INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    dni VARCHAR(10) NOT NULL,
    sexo VARCHAR(19) NOT NULL,
    obra_social VARCHAR(50) NOT NULL,
    fecha_nacimiento DATE NOT NULL,

    PRIMARY KEY(id_paciente)
)ENGINE=INNODB;


CREATE TABLE IF NOT EXISTS medicamentos(
	id_mediamento INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    nombre VARCHAR (50) NOT NULL,
    valor VARCHAR(20) NOT NULL,
	graduacion VARCHAR(20),
    PRIMARY KEY(id_mediamento)
)ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS historia_clinica(
	id_hclinica INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    id_paciente VARCHAR (50) NOT NULL,
    descripcion VARCHAR(20) NOT NULL,
	graduacion VARCHAR(20),
    cronico VARCHAR(10),
    casual VARCHAR(10),
    PRIMARY KEY(id_hclinica)
)ENGINE=INNODB;