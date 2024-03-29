-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-12-2019 a las 17:24:13
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
  `descuento` int(11) NOT NULL DEFAULT 0,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `obras_sociales`
--

INSERT INTO `obras_sociales` (`id_obrasociales`, `nombre`, `cuit`, `correo`, `telefono`, `habilitado`, `direccion`, `provincia`, `descuento`, `fecha`) VALUES
(0, 'Sin Obra Social', '', '', NULL, 1, NULL, 6, 0, '2019-12-13 03:28:22'),
(1, 'IPS', '20333333333', 'ips@ips.com', '4223344', 1, 'belgrano 990', 1, 40, '2019-12-13 03:12:07'),
(3, 'ospe', '308776547', 'admin@ospe.com', '4567788', 1, 'alvarado 7777', 1, 70, '2019-11-28 03:14:29'),
(4, 'boreal', '308789998', 'contacto@boreal.com', '4332222', 1, 'españa 220', 1, 40, '2019-11-28 03:14:31'),
(10, 'javi', '2334', 'algo@algo', '34', 1, 'cor', 10, 34, '2019-12-13 02:14:13'),
(11, 'javi', '2334', 'algo@algo', '34', 0, 'corij', 1, 34, '2019-12-13 02:21:08'),
(12, 'javi', '2334', 'algo@algo', '34', 0, 'corij', 1, 3443, '2019-12-13 02:21:05'),
(13, 'boreal', '308789998', 'contacto@boreal.com', '4332222', 1, 'españa 222', 1, 40, '2019-12-13 02:14:55'),
(14, 'javi', '2334', 'algo@algo', '34', 0, 'corij', 1, 343, '2019-12-13 05:22:49'),
(15, 'ospe', '308776547', 'admin@ospe.com', '4567788', 1, 'alvarado 7777', 1, 70, '2019-12-13 02:18:27'),
(16, 'ospe', '3087765474', 'admin@ospe.com', '4567788', 1, 'alvarado 7777', 1, 70, '2019-12-13 03:11:27'),
(17, 'IPS', '20333333777', 'ips@ips.com', '4223344', 1, 'belgrano 990', 1, 40, '2019-12-13 03:11:34'),
(18, 'osunsa', '2744444777743', 'unsa@unsa.comasdfasdf', '38744444', 1, 'av bolivia 1111', 1, 30, '2019-12-13 04:36:48'),
(19, 'hola', '3e3', 'algo@algo', '34', 1, 'co', 10, 34, '2019-12-13 04:37:45'),
(20, '3434sdf', '2334', 'algo@algo', '34', 1, 'asdf', 10, 43, '2019-12-13 05:22:00'),
(21, 'Maxi se la come doblada', '123123', 'yella@ella.com', '32154', 1, 'asdasd', 1, 50, '2019-12-13 12:30:22'),
(22, 'OSDN', '2744447777111', 'OSDN@OSDN', '321654987', 1, 'Alberto Fernandez 32', 15, 10, '2019-12-13 05:26:29');

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
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_fin` timestamp NOT NULL DEFAULT current_timestamp(),
  `alta` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `ordenes_atencion`
--

INSERT INTO `ordenes_atencion` (`id_orden_atencion`, `id_medico`, `id_pacientexobrasocial`, `medicamento`, `id_servicio`, `descripcion`, `precio`, `fecha`, `fecha_fin`, `alta`) VALUES
(9, 2, 1, NULL, 1, 'consulta para ver si esta mal o no', NULL, '2019-09-27 03:00:00', '2019-12-07 23:16:27', 1),
(10, 1, 2, '1000', 2, '10\'', 1000, '2019-09-27 03:00:00', '2019-12-07 23:16:27', 1),
(11, 2, 1, 'hola', 1, 'hola', NULL, '2019-11-29 03:00:00', '2019-12-08 00:17:12', 0),
(12, 2, 37, 'asd', 1, 'asdasd', NULL, '2019-11-29 03:00:00', '2019-12-07 23:16:27', 1),
(14, 2, 35, 'lala', 1, 'lala', NULL, '2019-11-29 03:00:00', '2019-12-07 23:16:27', 1),
(15, 2, 2, 'y ella ', 1, 'y ella', NULL, '2019-11-30 03:00:00', '2019-12-07 23:55:22', 0),
(16, 1, 37, 'hola', 2, 'hola', 2500, '2019-11-30 03:00:00', '2019-12-07 23:16:27', 1),
(17, 2, 2, '200', 1, '123', 500, '2019-11-30 03:00:00', '2019-12-07 23:54:58', 0),
(18, 2, 36, 'hola', 1, 'hola', 2500, '2019-11-30 03:00:00', '2019-12-07 23:16:27', 1),
(19, 1, 2, 'hola', 1, 'Hola', 1000, '2019-11-30 03:00:00', '2019-12-07 23:53:23', 0),
(20, 1, 1, 'hola', 2, 'hola', 500, '2019-11-30 03:00:00', '2019-12-07 23:16:27', 1),
(21, 4, 1, '', 1, '', 500, '2019-12-07 03:00:00', '2019-12-07 23:53:12', 0),
(22, 4, 1, 'lol', 1, 'Dolor de cabeza', 1000, '2019-12-07 03:00:00', '2019-12-08 00:03:53', 0),
(23, 4, 1, 'asd', 1, 'asd', 500, '2019-12-08 00:14:36', '2019-12-08 00:17:10', 0),
(24, 4, 3, 'nose', 1, 'nose', 5000, '2019-12-08 00:15:05', '2019-12-08 00:16:31', 0),
(26, 4, 1, 'chau', 1, 'chau', 5000, '2019-12-08 00:24:15', '2019-12-08 00:24:15', 1),
(27, 4, 1, 'hola', 1, 'hola', 800, '2019-12-08 14:48:21', '2019-12-08 14:48:21', 1),
(28, 4, 1, 'asda', 1, 'asd', 5000, '2019-12-13 02:43:42', '2019-12-13 02:43:42', 1),
(32, 4, 1, '', 1, '', 1111, '2019-12-13 05:54:43', '2019-12-13 05:54:43', 1),
(34, 4, 39, '', 2, '', 500, '2019-12-13 06:40:42', '2019-12-13 06:40:42', 0),
(35, 4, 38, '', 2, '', 3333, '2019-12-13 06:41:03', '2019-12-13 06:41:03', 0),
(36, 2, 3, 'sdgf', 2, 'asdf', 1000, '2019-12-13 06:41:42', '2019-12-13 06:41:42', 0),
(37, 2, 39, '', 2, '', 1000, '2019-12-13 06:43:32', '2019-12-13 06:43:32', 0),
(38, 4, 39, 'asdfsadf', 2, 'sadfasdfsdaf', 500, '2019-12-13 06:43:58', '2019-12-13 06:43:58', 0),
(39, 4, 39, 'asdasd', 1, 'asdasd', 500, '2019-12-13 06:44:20', '2019-12-13 06:44:20', 1),
(40, 4, 35, 'asdasd', 1, 'asdasd', 1000, '2019-12-13 06:44:42', '2019-12-13 06:44:42', 1),
(42, 4, 1, '12311', 1, '123123', 111111000, '2019-12-13 06:45:21', '2019-12-13 06:45:21', 1),
(43, 2, 34, '', 2, '', 500, '2019-12-13 06:45:45', '2019-12-13 06:45:45', 0),
(44, 4, 39, '', 1, '', 2000, '2019-12-13 14:24:09', '2019-12-13 14:24:09', 1),
(45, 4, 38, '12', 1, '13', 999, '2019-12-13 14:25:04', '2019-12-13 14:25:04', 1),
(46, 4, 1, 'hola', 1, 'hola', 1000, '2019-12-13 14:41:59', '2019-12-13 14:41:59', 1),
(47, 4, 1, 'qw', 1, 'qw', 5000, '2019-12-13 14:58:36', '2019-12-13 14:58:36', 1),
(48, 4, 3, '1231', 2, '123', 5000, '2019-12-13 14:59:10', '2019-12-13 14:59:10', 0),
(49, 4, 34, 'sadas', 2, 'asdasd', 5000, '2019-12-13 14:59:52', '2019-12-13 14:59:52', 0),
(50, 4, 1, '', 2, '', 1234, '2019-12-13 15:00:13', '2019-12-13 15:00:13', 0),
(51, 4, 38, 'dasd', 1, 'asdas', 5000, '2019-12-13 15:00:49', '2019-12-13 15:00:49', 1),
(52, 2, 32, 'asda', 1, 'asda', 1000, '2019-12-13 15:01:22', '2019-12-13 15:01:22', 1),
(53, 4, 32, '', 2, '', 12312, '2019-12-13 15:01:56', '2019-12-13 15:01:56', 0),
(54, 4, 41, 'asdasd', 2, 'asdasd', 5000, '2019-12-13 15:02:44', '2019-12-13 15:02:44', 0),
(55, 4, 37, '', 2, '', 5555, '2019-12-13 15:02:59', '2019-12-13 15:02:59', 0),
(56, 4, 39, 'qweq', 1, 'asda', 1000, '2019-12-13 15:03:07', '2019-12-13 15:03:07', 1),
(57, 4, 32, '', 1, '', 2500, '2019-12-13 15:16:04', '2019-12-13 15:16:04', 1),
(58, 4, 1, '', 1, '', 12345, '2019-12-13 16:22:03', '2019-12-13 16:22:03', 1),
(59, 4, 39, '', 1, '', 11111, '2019-12-13 16:22:51', '2019-12-13 16:22:51', 1),
(60, 4, 3, '', 1, '', 12345, '2019-12-13 16:23:18', '2019-12-13 16:23:18', 1);

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
(1, 'damian el que se la come', 'canonica', '1234545645', 4, 'Masculino', '4556677', '25 de mayo', 1, NULL, 0, '1989-10-08', 1),
(2, 'susana', 'gimenez', '2084533457', 0, 'Femenino', '4557788', 'buenos aires 20', 2, NULL, 0, '1989-09-08', 1),
(3, 'juan carlos se la come', 'maga se la da', '20304545457', 4, 'Masculino', '4556677', 'la concha de la lora 666', 1, NULL, 0, '1989-10-09', 1),
(7, 'juan', 'cabrera', '666123123', 1, 'Masculino', '466677788', 'alvarado 888', 19, NULL, 0, '1990-01-01', 1),
(8, 'sdaf', '334', '12345678', 7, 'Masculino', '344', 'sdf', 1, NULL, 0, '1989-04-01', 1),
(9, 'sdfasdf', 'sasdf', '334', 0, 'Masculino', '33', 'dfadf', 1, NULL, 0, '2019-10-01', 1),
(10, '123', '5345345', '345345', 0, 'Masculino', '3453', 'fgfg', 19, NULL, 0, '2007-07-11', 1),
(11, 'Paciente paciente', 'P1', '1234578', 2, 'Masculino', '388', 'Coronel Arenas 124', 20, NULL, 0, '1989-11-23', 1),
(12, 'Andrés', 'Haitit', '41530626', 3, 'Masculino', '03875002942', '25 De Mayo, Vicente Lopez 96', 17, NULL, 0, '1999-10-03', 1),
(13, 'Yo', 'Y ella', '123456789', 7, 'Masculino', '387', 'EL Carmen', 10, NULL, 0, '1989-12-29', 1),
(14, 'fda', 'jkalk', '123456', 3, 'Masculino', '3434', 'dsfa', 1, NULL, 0, '1989-05-23', 1),
(15, 'Ella Nose', 'Tambien', '4122313', 2, 'Masculino', '03875002942', '25 De Mayo, Vicente Lopez 96', 1, NULL, 0, '1654-02-04', 1);

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
(38, 12, 3, 112),
(39, 13, 3, 233332233),
(40, 14, 0, 0),
(41, 15, 22, 23465465);

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
(14, 1, 20, '5000', '2019-12-06 17:36:37'),
(15, 1, 26, '5000', '2019-12-08 14:45:49'),
(16, 2, 27, '6500', '2019-12-08 19:10:32'),
(17, 2, 20, '1950', '2019-12-08 23:05:00'),
(18, 2, 28, '1950', '2019-12-13 04:46:12'),
(19, 2, 28, '1950', '2019-12-13 04:50:24'),
(20, 2, 28, '2218', '2019-12-13 04:50:44'),
(21, 2, 28, '1950', '2019-12-13 04:53:13'),
(22, 2, 28, '390', '2019-12-13 05:32:17'),
(23, 2, 28, '3900', '2019-12-13 05:32:51'),
(24, 2, 28, '1560', '2019-12-13 05:33:32'),
(25, 1, 28, '1500', '2019-12-13 05:34:48'),
(26, 2, 28, '1950', '2019-12-13 05:35:22'),
(27, 2, 28, '1339', '2019-12-13 05:35:27'),
(28, 1, 28, '1000', '2019-12-13 05:35:39'),
(29, 2, 28, '1950', '2019-12-13 05:36:54'),
(30, 2, 28, '1950', '2019-12-13 05:37:10'),
(31, 1, 28, '300', '2019-12-13 05:37:33'),
(32, 2, 28, '390', '2019-12-13 05:39:39'),
(33, 1, 28, '1500', '2019-12-13 05:40:22'),
(34, 1, 28, '1500', '2019-12-13 05:42:02'),
(35, 1, 28, '570', '2019-12-13 05:42:04');

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
-- AUTO_INCREMENT de la tabla `historias_clinicas`
--
ALTER TABLE `historias_clinicas`
  MODIFY `id_historia_clinica` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `medicos`
--
ALTER TABLE `medicos`
  MODIFY `id_medico` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `metodos_pago`
--
ALTER TABLE `metodos_pago`
  MODIFY `id_metodo_pago` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `obras_sociales`
--
ALTER TABLE `obras_sociales`
  MODIFY `id_obrasociales` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `ordenes_atencion`
--
ALTER TABLE `ordenes_atencion`
  MODIFY `id_orden_atencion` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id_paciente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `pacientesxobrasociales`
--
ALTER TABLE `pacientesxobrasociales`
  MODIFY `id_pacientexobrasocial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `id_provincia` tinyint(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `recibos`
--
ALTER TABLE `recibos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id_servicio` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `debehaber`
--
ALTER TABLE `debehaber`
  ADD CONSTRAINT `debehaber_ibfk_1` FOREIGN KEY (`id_orden_atencion`) REFERENCES `ordenes_atencion` (`id_orden_atencion`);

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
