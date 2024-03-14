DROP DATABASE IF EXISTS hadesdb;
CREATE DATABASE hadesdb;
USE hadesdb;

CREATE TABLE Registros (
    idRegistro INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255),
    apellidos VARCHAR(255),
    fecha_nacimiento VARCHAR(255),
    nacionalidad VARCHAR(255),
    ciudad VARCHAR(255),
    direccion VARCHAR(255),
    direccion2 VARCHAR(255),
    correo VARCHAR(255),
    telefono VARCHAR(16),
    estado VARCHAR(255),
    patologias VARCHAR(255)
);

CREATE TABLE Usuarios (
    idUsuario INT PRIMARY KEY AUTO_INCREMENT,
    nickname VARCHAR(255),
    password VARCHAR(255),
    rol VARCHAR(50)
);

