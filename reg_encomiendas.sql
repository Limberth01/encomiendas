-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-10-2024 a las 17:29:08
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reg_encomiendas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encomiendas`
--

CREATE TABLE `encomiendas` (
  `id` int(11) NOT NULL,
  `nombre_remitente` varchar(100) DEFAULT NULL,
  `nombre_destinatario` varchar(100) DEFAULT NULL,
  `descripcion_paquete` text DEFAULT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `encomiendas`
--

INSERT INTO `encomiendas` (`id`, `nombre_remitente`, `nombre_destinatario`, `descripcion_paquete`, `fecha_entrega`, `created_at`) VALUES
(1, 'alberth martinez copa', 'brayan cordova gomez', 'sobre/documentos', '2024-10-05', '2024-10-06 03:17:22'),
(2, 'fernando gomez', 'maria lopez', 'caja pequeña/ropa', '2024-10-06', '2024-10-06 04:08:58'),
(3, 'fernando gomez', 'maria lopez', 'caja pequeña/ropa', '2024-10-06', '2024-10-06 04:22:01'),
(4, 'luis mamani', 'limberth lopez', 'ropa en bolsa negra', '2024-10-07', '2024-10-07 14:35:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(50) DEFAULT NULL,
  `contraseña` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_usuario`, `contraseña`, `created_at`) VALUES
(1, 'admin ', '$2y$10$zHsiF10XZdLkuT/bVfy1x.nYSlcx2ZwKJWvyxcjmfwvrkD6n9rTeC', '2024-10-06 00:54:53'),
(2, 'rosario123', '$2y$10$XnGzmrhWOSgRhzc1vz9caeu6K/IthKXKp/jsszJnv4QtJUpZsNH5a', '2024-10-06 04:07:30'),
(3, 'marina321', '$2y$10$xwLqGId0tklo9ss1ei0Tn.YR4mQWh/xmya4cIdYjBWa3BrVcF7EYS', '2024-10-07 14:52:45'),
(4, 'jhaneth456', '$2y$10$App.pXfdbndYDA9MHznQnO9Jk5zYc5Lbc0kj9N3hwHTDXCsC32zOi', '2024-10-07 14:54:47');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `encomiendas`
--
ALTER TABLE `encomiendas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `encomiendas`
--
ALTER TABLE `encomiendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
