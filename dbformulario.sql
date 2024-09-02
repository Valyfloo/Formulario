-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-07-2024 a las 05:32:59
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
-- Base de datos: `dbformulario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_form`
--

CREATE TABLE `tabla_form` (
  `id` int(5) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `Tipo_de_registro` text NOT NULL,
  `hora_ingreso` varchar(12) NOT NULL,
  `foto` longblob NOT NULL,
  `novedad` text NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tabla_form`
--

INSERT INTO `tabla_form` (`id`, `nombre`, `cedula`, `Tipo_de_registro`, `hora_ingreso`, `foto`, `novedad`, `fecha_registro`) VALUES
(1, 'brayan', '1000', '', '09:40', '', '', '2024-07-21 03:07:22'),
(2, 'juan', 'jan12', '', '31321', '', '', '2024-07-21 03:07:22'),
(3, 'Brayan Val', '10001', '', '12:48', '', '', '2024-07-21 03:07:22'),
(4, 'Brayan Val', '10001', 'Baños', '09:47', '', '', '2024-07-21 03:07:22'),
(5, 'Brayan Val', '10001', 'Baños', '09:48', '', '', '2024-07-21 03:07:22'),
(6, 'Brayan Val', '10001', 'Cafeteria', '09:48', '', '', '2024-07-21 03:07:22'),
(7, 'Brayan Val', '10001', 'Cafeteria', '09:48', '', '', '2024-07-21 03:07:22'),
(8, 'andres', '55555', 'Sala de junt', '09:51', '', '', '2024-07-21 03:07:22'),
(9, 'prueba fot', '123', 'Cafeteria', '10:30', 0x75706c6f6164732f576861747341707020496d61676520323032342d30372d30392061742031312e35392e303720414d2e6a706567, '', '2024-07-21 03:07:22'),
(10, 'prueba fot', '123123', 'Cafeteria', '10:33', 0x75706c6f6164732f706e672d636c69706172742d67726170686963732d696c6c757374726174696f6e2d636f6d70616e792d6e6f7461726961742d73657276696365732d696e7465726e65742d636f6d6d756e69636174696f6e2d636f6d70616e792d7075626c69632d72656c6174696f6e732d72656d6f766562672d707265766965772e706e67, '', '2024-07-21 03:07:22'),
(11, 'Brayan Val', '10001', 'Baños', '21:22', 0x75706c6f6164732f576861747341707020496d61676520323032342d30372d30392061742031312e35392e303720414d2e6a706567, 'asa', '2024-07-21 03:07:22'),
(13, 'prueba fot', '10001', 'Cafeteria', '21:42', 0x75706c6f6164732f31332e6a706567, 'asda', '2024-07-21 03:07:22');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tabla_form`
--
ALTER TABLE `tabla_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tabla_form`
--
ALTER TABLE `tabla_form`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
