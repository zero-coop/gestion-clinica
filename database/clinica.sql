-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-12-2019 a las 20:30:29
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clinica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `debehaber`
--
CREATE DATABASE clinica;
USE clinica;

CREATE TABLE `debehaber` (
  `id_debehaber` int(11) NOT NULL,
  `id_orden_atencion` int(255) NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `debehaber`
--

INSERT INTO `debehaber` (`id_debehaber`, `id_orden_atencion`, `saldo`) VALUES
(1, 9, 0),
(2, 10, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_sanguineo`
--

CREATE TABLE `grupo_sanguineo` (
  `id_grupo` int(11) NOT NULL,
  `nombre` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupo_sanguineo`
--

INSERT INTO `grupo_sanguineo` (`id_grupo`, `nombre`) VALUES
(0, 'S/G'),
(1, 'A+'),
(2, 'A-'),
(3, 'B+'),
(4, 'B-'),
(5, 'AB+'),
(6, 'AB-'),
(7, '0+'),
(8, '0-');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hijos`
--

CREATE TABLE `hijos` (
  `id_hijo` int(10) NOT NULL,
  `id_paciente` int(10) NOT NULL,
  `apellido_paterno` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `dni` varchar(11) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `sexo` varchar(1) COLLATE utf8_spanish2_ci NOT NULL,
  `nonato` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `hijos`
--

INSERT INTO `hijos` (`id_hijo`, `id_paciente`, `apellido_paterno`, `dni`, `nombre`, `apellido`, `sexo`, `nonato`) VALUES
(1, 2, 'cacho', '34222111', 'juan de los palotes', 'gimenez cacho', 'M', 1),
(2, 2, 'cacho', '36878999', 'juana', 'gimenez cacho', 'F', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historias_clinicas`
--

CREATE TABLE `historias_clinicas` (
  `id_historia_clinica` int(11) UNSIGNED NOT NULL,
  `id_pacientexobrasocial` int(10) NOT NULL,
  `id_orden_atencion` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `historias_clinicas`
--

INSERT INTO `historias_clinicas` (`id_historia_clinica`, `id_pacientexobrasocial`, `id_orden_atencion`) VALUES
(3, 1, 9),
(4, 2, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `id_medico` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `dni` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `especialidad` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `matricula` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `domicilio` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `celular` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`id_medico`, `nombre`, `apellido`, `dni`, `especialidad`, `matricula`, `domicilio`, `telefono`, `celular`) VALUES
(1, 'pedro', 'robatodo', '23444555', 'ginecoloco', '564322', 'caseros 1767', '4889933', '3875777666'),
(2, 'andres', 'lopez', '21999888', 'cirujano', '876543', 'zuviria 43', '4887755', '3875212333'),
(4, 'Andrés', 'Haitit', '41530626', 'Cirujano', 'A4430', '25 De Mayo, Vicente Lopez 96', '3875002942', '3875002942');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodos_pago`
--

CREATE TABLE `metodos_pago` (
  `id_metodo_pago` int(10) NOT NULL,
  `metodo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `recargo` float DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `metodos_pago`
--

INSERT INTO `metodos_pago` (`id_metodo_pago`, `metodo`, `recargo`, `fecha`) VALUES
(1, 'Efectivo', 0, NULL),
(2, 'Credito', 30, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obras_sociales`
--

CREATE TABLE `obras_sociales` (
  `id_obrasociales` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `cuit` varchar(13) COLLATE utf8_spanish2_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `habilitado` tinyint(1) UNSIGNED DEFAULT 1,
  `direccion` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `provincia` tinyint(2) UNSIGNED NOT NULL,
  `descuento` tinyint(2) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `obras_sociales`
--

INSERT INTO `obras_sociales` (`id_obrasociales`, `nombre`, `cuit`, `correo`, `telefono`, `habilitado`, `direccion`, `provincia`, `descuento`, `fecha`) VALUES
(0, 'Sin Obra Social', '', '', NULL, 1, NULL, 6, 0, '2019-11-30 17:33:58'),
(1, 'IPS', '20333333333', 'ips@ips.com', '4223344', 1, 'belgrano 990', 1, 40, '2019-11-28 03:14:06'),
(3, 'ospe', '308776547', 'admin@ospe.com', '4567788', 1, 'alvarado 7777', 1, 70, '2019-11-28 03:14:29'),
(4, 'boreal', '308789998', 'contacto@boreal.com', '4332222', 1, 'españa 220', 1, 40, '2019-11-28 03:14:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes_atencion`
--

CREATE TABLE `ordenes_atencion` (
  `id_orden_atencion` int(255) NOT NULL,
  `id_medico` int(11) UNSIGNED NOT NULL,
  `id_pacientexobrasocial` int(11) NOT NULL,
  `medicamento` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `id_servicio` tinyint(10) NOT NULL,
  `descripcion` varchar(535) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `ordenes_atencion`
--

INSERT INTO `ordenes_atencion` (`id_orden_atencion`, `id_medico`, `id_pacientexobrasocial`, `medicamento`, `id_servicio`, `descripcion`, `precio`, `fecha`) VALUES
(9, 2, 1, NULL, 1, 'consulta para ver si esta mal o no', NULL, '2019-09-27'),
(10, 1, 2, NULL, 2, 'viene a verse la cola', 1000, '2019-09-27'),
(11, 2, 1, 'hola', 1, 'hola', NULL, '2019-11-29'),
(12, 2, 37, 'asd', 1, 'asdasd', NULL, '2019-11-29'),
(14, 2, 35, 'lala', 1, 'lala', NULL, '2019-11-29'),
(15, 2, 2, 'y ella ', 1, 'y ella', NULL, '2019-11-30'),
(16, 1, 37, 'hola', 2, 'hola', 2500, '2019-11-30'),
(17, 2, 2, '200', 1, '123', 500, '2019-11-30'),
(18, 2, 36, 'hola', 1, 'hola', 2500, '2019-11-30'),
(19, 1, 2, 'hola', 1, 'Hola', 1000, '2019-11-30'),
(20, 1, 1, 'NMOSE', 2, 'NOSE', 500, '2019-11-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id_paciente` int(10) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `dni` varchar(11) COLLATE utf8_spanish2_ci NOT NULL,
  `grupo_sanguineo` tinyint(1) NOT NULL,
  `sexo` varchar(19) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(14) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `provincia` tinyint(2) UNSIGNED NOT NULL,
  `hijos` tinyint(1) DEFAULT NULL,
  `historia_clinica` int(10) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `habilitado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id_paciente`, `nombre`, `apellido`, `dni`, `grupo_sanguineo`, `sexo`, `telefono`, `direccion`, `provincia`, `hijos`, `historia_clinica`, `fecha_nacimiento`, `habilitado`) VALUES
(1, 'damian', 'canonica', '1234', 2, 'Masculino', '4556677', '25 de mayo', 1, NULL, 0, '1989-10-08', 1),
(2, 'susana', 'gimenez', '2084533457', 0, 'Femenino', '4557788', 'buenos aires 20', 2, NULL, 0, '1989-09-08', 1),
(3, 'juan carlos', 'lopez', '20304545457', 4, 'Masculino', '4556677', 'la concha de la lora 666', 1, NULL, 0, '1989-10-09', 1),
(7, 'juan', 'cabrera', '666123123', 1, 'Masculino', '466677788', 'alvarado 888', 19, NULL, 0, '1990-01-01', 1),
(8, 'sdaf', '334', '12345678', 7, 'Masculino', '344', 'sdf', 1, NULL, 0, '1989-04-01', 1),
(9, 'sdfasdf', 'sasdf', '334', 0, 'Masculino', '33', 'dfadf', 1, NULL, 0, '2019-10-01', 1),
(10, '123', '5345345', '345345', 0, 'Masculino', '3453', 'fgfg', 19, NULL, 0, '2007-07-11', 1),
(11, 'Paciente paciente', 'P1', '1234578', 2, 'Masculino', '388', 'Coronel Arenas 124', 20, NULL, 0, '1989-11-23', 1),
(12, 'Andrés', 'Haitit', '41530626', 3, 'Masculino', '03875002942', '25 De Mayo, Vicente Lopez 96', 17, NULL, 0, '1999-10-03', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientesxobrasociales`
--

CREATE TABLE `pacientesxobrasociales` (
  `id_pacientexobrasocial` int(11) NOT NULL,
  `id_paciente` int(10) NOT NULL,
  `id_obra_social` int(11) UNSIGNED NOT NULL,
  `numero_socio` int(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pacientesxobrasociales`
--

INSERT INTO `pacientesxobrasociales` (`id_pacientexobrasocial`, `id_paciente`, `id_obra_social`, `numero_socio`) VALUES
(1, 1, 3, 24324),
(2, 3, 0, 45345),
(3, 2, 1, 7554),
(32, 7, 4, NULL),
(34, 8, 4, NULL),
(35, 9, 3, NULL),
(36, 10, 0, NULL),
(37, 11, 1, 0),
(38, 12, 3, 112);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `id_provincia` tinyint(2) UNSIGNED NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `codigo_postal` varchar(6) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`id_provincia`, `nombre`, `codigo_postal`) VALUES
(1, 'Buenos Aires', '4400'),
(2, 'Catamarca', '4600'),
(4, 'Chaco', '4455'),
(5, 'Chubut', ''),
(6, 'Córdoba', ''),
(7, 'Corrientes', ''),
(8, 'Entre Ríos', ''),
(9, 'Formosa', ''),
(10, 'Jujuy', ''),
(11, 'La Pampa', ''),
(12, 'La Rioja', ''),
(13, 'Mendoza', ''),
(14, 'Misiones', ''),
(15, 'Neuquén', ''),
(16, 'Río Negro', ''),
(17, 'Salta', ''),
(18, 'San Juan', ''),
(19, 'San Luis', ''),
(20, 'Santa Cruz', ''),
(21, 'Santa Fe', ''),
(22, 'Santiago del Estero', ''),
(23, 'Tierra del Fuego', ''),
(24, 'Tucumán', ''),
(25, 'Extranjero', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibos`
--

CREATE TABLE `recibos` (
  `id` int(11) NOT NULL,
  `id_metodos_pago` int(11) NOT NULL,
  `id_orden_atencion` int(11) NOT NULL,
  `monto` decimal(10,0) NOT NULL DEFAULT 0,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `recibos`
--

INSERT INTO `recibos` (`id`, `id_metodos_pago`, `id_orden_atencion`, `monto`, `fecha`) VALUES
(1, 1, 20, '1000', '2019-12-04 03:00:00'),
(2, 2, 20, '3250', '2019-12-04 03:00:00'),
(3, 1, 20, '2500', '2019-12-04 03:00:00'),
(4, 1, 20, '2500', '2019-12-04 03:00:00'),
(5, 1, 20, '2500', '2019-12-04 03:00:00'),
(6, 1, 20, '2500', '2019-12-04 03:00:00'),
(7, 2, 20, '6500', '2019-12-04 03:00:00'),
(8, 2, 20, '6500', '2019-12-06 03:00:00'),
(9, 2, 20, '6500', '2019-12-06 03:00:00'),
(10, 2, 20, '6500', '2019-12-06 03:00:00'),
(11, 2, 20, '6500', '2019-12-06 03:00:00'),
(12, 2, 20, '6500', '2019-12-06 03:00:00'),
(13, 2, 20, '6500', '2019-12-06 03:00:00'),
(14, 1, 20, '5000', '2019-12-06 17:36:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id_servicio` tinyint(10) NOT NULL,
  `descripcion` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `costo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id_servicio`, `descripcion`, `costo`) VALUES
(1, 'internacion', 1500),
(2, 'consulta', 500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `rol` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `imagen` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_usuario`, `nombre`, `apellido`, `email`, `password`, `rol`, `imagen`) VALUES
(1, 'admin', 'Nombre_Admin', 'Apellido_Admin', 'admin@admin.com', '$2y$10$IaHs0BIkMwRFOw/lLfWLae9NHFGID.DKEFpN86nE1tYywUKokWJ/e', 'admin', NULL),
(2, 'andreshaitit', 'Andrés', 'Haitit', 'andreshaitit99@gmail.com', '$2y$04$9YT6zXCS1BNl3DHYf9ByKerRXVbDShC1ouhFK1YtMOXWZBhSI3BnK', 'admin', NULL),
(3, 'dfsdf', 'dfdf', 'dfdf', 'demian.douyou@gmail.com', '$2y$04$wgLmtlmMrQ15fDlHCk4R1OHilafSTry5m0AToHYERtAn6bUKPrVAq', 'admin', NULL),
(4, 'juancjuan', 'juan', 'lopez', 'juancjuan@gmail.com', '$2y$04$G1NAqFp/Ys.mjw6qb8oo8.1l10RFOJ5eTz.Y3.mziuNipOBXr31eO', 'admin', NULL),
(5, 'damian', 'damian', 'damian', 'damian@gmail.com', '$2y$04$.NdD5OOol5SwVwuWnqq0ZOkTLamUZAkecR4EI8ixrxmYTBGWJ1Ily', 'user', NULL),
(6, 'javi', 'javi', 'lerma', 'javilerma89@gmail.com', '$2y$04$U//s6EmKy6zKbtmapSZ0ku0BoyNuYmbgyBZ98GLHIs9IlKHXzpAYu', 'user', NULL),
(7, 'user', 'user', 'user', 'user@user.com', '$2y$04$NKODCeTU1GOFwJ.ZmwmxVuAOeRenDQNMhGBcLzy5oHNG3sUYWnzCy', 'user', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `debehaber`
--
ALTER TABLE `debehaber`
  ADD PRIMARY KEY (`id_debehaber`),
  ADD KEY `id_orden_atencion` (`id_orden_atencion`);

--
-- Indices de la tabla `grupo_sanguineo`
--
ALTER TABLE `grupo_sanguineo`
  ADD PRIMARY KEY (`id_grupo`);

--
-- Indices de la tabla `hijos`
--
ALTER TABLE `hijos`
  ADD PRIMARY KEY (`id_hijo`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `historias_clinicas`
--
ALTER TABLE `historias_clinicas`
  ADD PRIMARY KEY (`id_historia_clinica`),
  ADD KEY `id_pacientexobrasocial` (`id_pacientexobrasocial`),
  ADD KEY `historias_clinicas_ibfk_2` (`id_orden_atencion`);

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`id_medico`);

--
-- Indices de la tabla `metodos_pago`
--
ALTER TABLE `metodos_pago`
  ADD PRIMARY KEY (`id_metodo_pago`);

--
-- Indices de la tabla `obras_sociales`
--
ALTER TABLE `obras_sociales`
  ADD PRIMARY KEY (`id_obrasociales`),
  ADD KEY `provincia` (`provincia`);

--
-- Indices de la tabla `ordenes_atencion`
--
ALTER TABLE `ordenes_atencion`
  ADD PRIMARY KEY (`id_orden_atencion`),
  ADD KEY `ordenes_atencion_ibfk_1` (`id_medico`),
  ADD KEY `ordenes_atencion_ibfk_3` (`id_pacientexobrasocial`),
  ADD KEY `ordenes_atencion_ibfk_4` (`id_servicio`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id_paciente`),
  ADD KEY `provincia` (`provincia`);

--
-- Indices de la tabla `pacientesxobrasociales`
--
ALTER TABLE `pacientesxobrasociales`
  ADD PRIMARY KEY (`id_pacientexobrasocial`),
  ADD KEY `id_paciente` (`id_paciente`),
  ADD KEY `id_obra_social` (`id_obra_social`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`id_provincia`);

--
-- Indices de la tabla `recibos`
--
ALTER TABLE `recibos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_metodos_pago` (`id_metodos_pago`),
  ADD KEY `id_orden_atencion` (`id_orden_atencion`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id_servicio`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `debehaber`
--
ALTER TABLE `debehaber`
  MODIFY `id_debehaber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `grupo_sanguineo`
--
ALTER TABLE `grupo_sanguineo`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `hijos`
--
ALTER TABLE `hijos`
  MODIFY `id_hijo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `historias_clinicas`
--
ALTER TABLE `historias_clinicas`
  MODIFY `id_historia_clinica` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `medicos`
--
ALTER TABLE `medicos`
  MODIFY `id_medico` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `metodos_pago`
--
ALTER TABLE `metodos_pago`
  MODIFY `id_metodo_pago` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `obras_sociales`
--
ALTER TABLE `obras_sociales`
  MODIFY `id_obrasociales` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `ordenes_atencion`
--
ALTER TABLE `ordenes_atencion`
  MODIFY `id_orden_atencion` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id_paciente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `pacientesxobrasociales`
--
ALTER TABLE `pacientesxobrasociales`
  MODIFY `id_pacientexobrasocial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `id_provincia` tinyint(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `recibos`
--
ALTER TABLE `recibos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id_servicio` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `debehaber`
--
ALTER TABLE `debehaber`
  ADD CONSTRAINT `debehaber_ibfk_1` FOREIGN KEY (`id_orden_atencion`) REFERENCES `ordenes_atencion` (`id_orden_atencion`);

--
-- Filtros para la tabla `hijos`
--
ALTER TABLE `hijos`
  ADD CONSTRAINT `hijos_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`);

--
-- Filtros para la tabla `historias_clinicas`
--
ALTER TABLE `historias_clinicas`
  ADD CONSTRAINT `historias_clinicas_ibfk_1` FOREIGN KEY (`id_pacientexobrasocial`) REFERENCES `pacientesxobrasociales` (`id_pacientexobrasocial`) ON DELETE CASCADE,
  ADD CONSTRAINT `historias_clinicas_ibfk_2` FOREIGN KEY (`id_orden_atencion`) REFERENCES `ordenes_atencion` (`id_orden_atencion`) ON DELETE CASCADE;

--
-- Filtros para la tabla `obras_sociales`
--
ALTER TABLE `obras_sociales`
  ADD CONSTRAINT `obras_sociales_ibfk_1` FOREIGN KEY (`provincia`) REFERENCES `provincias` (`id_provincia`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `pacientes_ibfk_1` FOREIGN KEY (`provincia`) REFERENCES `provincias` (`id_provincia`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pacientesxobrasociales`
--
ALTER TABLE `pacientesxobrasociales`
  ADD CONSTRAINT `pacientesxobrasociales_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`) ON DELETE CASCADE,
  ADD CONSTRAINT `pacientesxobrasociales_ibfk_2` FOREIGN KEY (`id_obra_social`) REFERENCES `obras_sociales` (`id_obrasociales`) ON DELETE CASCADE;

--
-- Filtros para la tabla `recibos`
--
ALTER TABLE `recibos`
  ADD CONSTRAINT `recibos_ibfk_1` FOREIGN KEY (`id_metodos_pago`) REFERENCES `metodos_pago` (`id_metodo_pago`),
  ADD CONSTRAINT `recibos_ibfk_2` FOREIGN KEY (`id_orden_atencion`) REFERENCES `ordenes_atencion` (`id_orden_atencion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
