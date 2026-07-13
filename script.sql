-- Crear la base de datos si no existe
CREATE DATABASE IF NOT EXISTS labuenamesa_db CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;
USE labuenamesa_db;

-- Crear la tabla para almacenar las reservas del restaurante
CREATE TABLE IF NOT EXISTS reservas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    email VARCHAR(100) NOT NULL,
    fecha DATE NOT NULL,
    hora TIME NOT NULL,
    personas INT NOT NULL,
    zona VARCHAR(50) NOT NULL,
    ocasion VARCHAR(50) NOT NULL,
    comentarios TEXT,
    creado_el TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);