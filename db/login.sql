-- Base de datos para el proyecto Nexcore
CREATE DATABASE IF NOT EXISTS `nexcoreprotect` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `nexcoreprotect`;

-- Tabla de usuarios
CREATE TABLE `usuarios` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL UNIQUE,
  `clave` VARCHAR(255) NOT NULL,
  `cargo` INT NOT NULL COMMENT '1 = admin, 2 = usuario',
  `codigo_recuperacion` VARCHAR(10) NULL,
  `codigo_expiracion` DATETIME NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Usuario admin
-- Clave: LeoStark47! (hascode)
INSERT INTO `usuarios` (`nombre`, `email`, `clave`, `cargo`,  `codigo_recuperacion`, `codigo_expiracion`)
VALUES ('admin', 'lacosta2712@gmail.com', '$2y$10$pUUexEeH/PIm56Yp7gD9EuDHx0t6W/LwrQ2U3heA9lnZLbZOrnfHi', 1);