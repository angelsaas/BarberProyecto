-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 16-08-2023 a las 07:21:36
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `barbershop_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_administrador` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contrasena` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_administrador`, `nombre`, `usuario`, `contrasena`) VALUES
(505, 'Angel', 'AngelGG', 'hachigg789');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `barbero`
--

CREATE TABLE `barbero` (
  `id_barbero` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `experiencia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `barbero`
--

INSERT INTO `barbero` (`id_barbero`, `nombre`, `experiencia`) VALUES
(33, 'angel', '2 años'),
(111, 'joel', '3 años'),
(222, 'azael', '5 años'),
(223, 'LUIS', '2 años'),
(224, 'SAUL', '6 AÑOS'),
(225, 'josue', '3 meses');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `id_cita` int(11) NOT NULL,
  `id_barbero` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `tipo_cita` varchar(255) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `id_administrador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`id_cita`, `id_barbero`, `id_cliente`, `id_servicio`, `fecha_hora`, `tipo_cita`, `total`, `id_administrador`) VALUES
(2, 33, 1, 41, '4444-04-04 04:04:00', '0', 100.00, NULL),
(3, 111, 1, 32, '2023-08-05 02:30:00', '0', 150.00, NULL),
(4, 111, 1, 32, '2023-08-05 02:30:00', '0', 150.00, NULL),
(6, 33, 1, 42, '0000-00-00 00:00:00', '55555', 120.00, NULL),
(7, 33, 1, 41, '2032-02-05 02:30:00', 'low fade', 100.00, NULL),
(8, 33, 9, 41, '2023-02-20 02:30:00', 'quiero un corte parecido al de tiktok', 100.00, NULL),
(9, 111, 1, 41, '2023-09-20 10:30:00', 'una perfilacion', 100.00, NULL),
(10, 111, 1, 32, '2023-07-01 10:30:00', 'un low fade', 150.00, NULL),
(11, 33, 1, 42, '2021-05-02 10:30:00', 'un mid fade', 120.00, NULL),
(12, 33, 1, 42, '2021-05-02 10:30:00', 'un mid fade', 120.00, NULL),
(13, 33, 1, 42, '2021-05-02 10:30:00', 'un mid fade', 120.00, NULL),
(14, 33, 1, 42, '2021-05-02 10:30:00', 'un mid fade', 120.00, NULL),
(15, 33, 6, 32, '0000-00-00 00:00:00', '55555', 150.00, NULL),
(16, 111, 1, 41, '0000-00-00 00:00:00', '5555', 100.00, NULL),
(17, 33, 1, 41, '0000-00-00 00:00:00', '4444444444444', 100.00, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contrasena` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `usuario`, `contrasena`) VALUES
(1, 'angel', 'angel', '1234'),
(2, 'brian', 'borrego', 'borre123'),
(4, 'juan', 'juan', '1234'),
(5, 'luis', 'luis', '1234'),
(6, 'alberto', 'alberto', '123'),
(7, 'jorge', 'jorge', '1234'),
(9, 'angelk', 'aneglin', '1234'),
(10, 'angel', '55', '55'),
(12, 'roberto', 'robert', '1234'),
(13, 'angeladmin', 'angeladmin', 'hachigg345'),
(14, 'ANGEL', 'AAA', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id_servicio` int(11) NOT NULL,
  `nombre_servicio` varchar(100) NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id_servicio`, `nombre_servicio`, `precio`) VALUES
(32, 'corte de pelo a maquina', 150.00),
(41, 'perfilacion', 100.00),
(42, 'corte de pelo a tijera', 120.00);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_administrador`);

--
-- Indices de la tabla `barbero`
--
ALTER TABLE `barbero`
  ADD PRIMARY KEY (`id_barbero`);

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`id_cita`),
  ADD KEY `id_barbero` (`id_barbero`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_servicio` (`id_servicio`),
  ADD KEY `cita_ibfk_4` (`id_administrador`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id_servicio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=506;

--
-- AUTO_INCREMENT de la tabla `barbero`
--
ALTER TABLE `barbero`
  MODIFY `id_barbero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `cita_ibfk_1` FOREIGN KEY (`id_barbero`) REFERENCES `barbero` (`id_barbero`),
  ADD CONSTRAINT `cita_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `cita_ibfk_3` FOREIGN KEY (`id_servicio`) REFERENCES `servicio` (`id_servicio`),
  ADD CONSTRAINT `cita_ibfk_4` FOREIGN KEY (`id_administrador`) REFERENCES `administrador` (`id_administrador`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
