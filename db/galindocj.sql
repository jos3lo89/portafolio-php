-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-12-2023 a las 04:14:49
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `galindocj`
--
CREATE DATABASE IF NOT EXISTS `galindocj` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `galindocj`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL,
  `usuario_usuario` varchar(15) NOT NULL,
  `usuario_nombre` varchar(70) NOT NULL,
  `usuario_apellido` varchar(100) NOT NULL,
  `usuario_correo` varchar(30) NOT NULL,
  `usuario_clave` varchar(255) NOT NULL,
  `usuario_foto` varchar(255) NOT NULL,
  `usuario_fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_fecha_modificacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `usuario_rol` varchar(15) NOT NULL,
  `usuario_pregunta1` varchar(50) NOT NULL,
  `usuario_pregunta2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `usuario_usuario`, `usuario_nombre`, `usuario_apellido`, `usuario_correo`, `usuario_clave`, `usuario_foto`, `usuario_fecha_registro`, `usuario_fecha_modificacion`, `usuario_rol`, `usuario_pregunta1`, `usuario_pregunta2`) VALUES
(1, 'galindocj', 'jose luis', 'galindo cardenas', 'jos3luis558@gmail.com', '$2y$10$VWOWL1RFQvt.1f8rqG0CeOKuEr1D3POE/n9gZdDmkw0qRk5PMfc1a', 'views/fotoUsuario/waifu1.jpg', '2023-12-24 16:52:29', '2023-12-23 19:33:42', 'administrador', 'feliz', 'navidad'),
(30, 'revisor', 'sapo', 'crocro', 'revisor@gmail.com', '$2y$10$sZAS3HrlSCbJVva6JmIFp.bu3lwT8d0VbCqtPOITWLl5oMGzCd/pC', 'vista/fotoPerfil/imhg22.jpg', '2023-12-25 20:33:53', '2023-12-25 20:33:53', 'revisor', 'agua', 'vida'),
(31, 'rfqwfqwf', 'qwefqwe', 'fqwfqwef', 'qwefqw@qwefadwf', '$2y$10$.XUhaKP157ezZFnz.nAGYOvC/bDyfLJJ6vfl5LMJZPFyiPmsJFW9S', 'vista/fotoPerfil/imhg22.jpg', '2023-12-26 01:04:07', '2023-12-26 01:04:07', 'revisor', 'qwefqwef', 'qwfqw');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
