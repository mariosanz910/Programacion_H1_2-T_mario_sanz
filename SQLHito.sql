DROP DATABASE IF EXISTS empresa;
CREATE DATABASE empresa;
Use empresa;

CREATE TABLE usuarios (
    id_usuario INT PRIMARY KEY, 
    nombre VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE,
    edad INT NOT NULL CHECK (edad >= 0) DEFAULT "18", 
    plan_base ENUM("Basico", "Estandar", "Premium") DEFAULT "Basico", 
    duracion_suscripcion ENUM("Mensual", "Anual") DEFAULT "Mensual"
);

CREATE TABLE paquetes_adicionales (
    id_paquete INT AUTO_INCREMENT PRIMARY KEY, 
    nombre_paquete ENUM("Deporte", "Cine", "Infantil", "Deporte y Cine", "Cine e Infantil", "Todos", "Deporte e Infantil") NOT NULL,
    id_usuario INT NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario) ON DELETE CASCADE
);

INSERT INTO usuarios (id_usuario, nombre, apellidos, correo, edad, plan_base, duracion_suscripcion) 
VALUES 
(12345678, 'Juan', 'Pérez', 'juan.perez@gmail.com', 25, 'Estándar', 'Anual'),
(23456781, 'Lucía', 'Gómez', 'lucia.gomez@hotmail.com', 17, 'Básico', 'Mensual');

INSERT INTO paquetes_adicionales (nombre_paquete, id_usuario) 
VALUES 
('Deporte', 12345678), -- Asociado a Juan Pérez
('Infantil', 23456781); -- Asociado a Lucía Gómez

SELECT u.id_usuario, u.nombre, u.apellidos, u.correo, u.edad, u.plan_base, u.duracion_suscripcion, p.nombre_paquete FROM usuarios u LEFT JOIN  paquetes_adicionales p ON u.id_usuario = p.id_usuario;

Select * From usuarios;