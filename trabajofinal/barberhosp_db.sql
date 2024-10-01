CREATE DATABASE barbershop_db;
USE barbershop_db;
CREATE TABLE Servicio (
    id_servicio INT PRIMARY KEY AUTO_INCREMENT,
    nombre_servicio VARCHAR(100) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL
);

CREATE TABLE Barbero (
    id_barbero INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    experiencia VARCHAR(100) NOT NULL
);

CREATE TABLE Cliente (
    id_cliente INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
   admin varchar(50);
    usuario VARCHAR(50) NOT NULL, -- Nuevo campo para el nombre de usuario
    contrasena VARCHAR(100) NOT NULL -- Nuevo campo para la contraseña
);

CREATE TABLE Cita (
    id_cita INT PRIMARY KEY AUTO_INCREMENT,
    id_barbero INT NOT NULL,
    id_cliente INT NOT NULL,
    id_servicio INT NOT NULL,
    fecha_hora DATETIME NOT NULL,
    FOREIGN KEY (id_barbero) REFERENCES Barbero(id_barbero),
    FOREIGN KEY (id_cliente) REFERENCES Cliente(id_cliente),
    FOREIGN KEY (id_servicio) REFERENCES Servicio(id_servicio)
);

CREATE TABLE Pago (
    id_pago INT PRIMARY KEY AUTO_INCREMENT,
    id_cliente INT NOT NULL,
    monto DECIMAL(10, 2) NOT NULL,
    fecha DATE NOT NULL,
    FOREIGN KEY (id_cliente) REFERENCES Cliente(id_cliente)
);

CREATE TABLE Consulta (
    id_consulta INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL,
    consulta TEXT NOT NULL
);

INSERT INTO Barbero (nombre, experiencia) VALUES ('Angel', '1 años');
INSERT INTO Barbero (nombre, experiencia) VALUES ('azael', '5 años');
INSERT INTO Barbero (nombre, experiencia) VALUES ('joel', '3 años');
