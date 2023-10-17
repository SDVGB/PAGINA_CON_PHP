-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-07-2021 a las 07:44:32
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdinventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idCategorias` int(11) NOT NULL,
  `nombreCategoria` varchar(20) NOT NULL,
  `estadoCategoria` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategorias`, `nombreCategoria`, `estadoCategoria`) VALUES
(1, 'Lácteos', 1),
(2, 'Abarrotes', 1),
(3, 'Confites', 1),
(4, 'Frutas y verduras', 1),
(5, 'Aseo y Limpieza', 1),
(6, 'Bebestibles', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProductos` int(11) NOT NULL,
  `nombreProducto` varchar(45) NOT NULL,
  `precioProducto` int(11) NOT NULL,
  `stockProducto` int(11) NOT NULL,
  `imgProducto` varchar(80) NOT NULL,
  `estadoProducto` tinyint(1) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idCategorias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProductos`, `nombreProducto`, `precioProducto`, `stockProducto`, `imgProducto`, `estadoProducto`, `idUsuario`, `idCategorias`) VALUES
(1, 'Coca cola 1.5lt Original', 1500, 10, '../views/imagenesProductos/3a6ec8b50c77c3cec3d7e65c1d35d6fb.jpg', 1, 1, 6),
(2, 'Yogurt Colun 125grs de frutilla', 250, 20, '../views/imagenesProductos/fc3c7e1ae97d7f64b4637b33ef244e9f.jpg', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nombreUsuario` varchar(20) NOT NULL,
  `Apellidousuario` varchar(20) NOT NULL,
  `correoUsuario` varchar(40) NOT NULL,
  `passwordUsuario` varchar(35) NOT NULL,
  `imgUsuario` varchar(80) NOT NULL,
  `rolUsuario` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombreUsuario`, `Apellidousuario`, `correoUsuario`, `passwordUsuario`, `imgUsuario`, `rolUsuario`) VALUES
(1, 'Diego', 'Ramirez', 'diegoramirez@gmail.com', '202cb962ac59075b964b07152d234b70', 'https://randomuser.me/api/portraits/men/75.jpg', 1),
(2, 'Stefania', 'Guzmán', 'Stefania@gmail.com', '250cf8b51c773f3f8dc8b4be867a9a02', 'https://randomuser.me/api/portraits/women/2.jpg', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategorias`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProductos`),
  ADD KEY `fk_productos_usuarios` (`idUsuario`),
  ADD KEY `fk_productos_categorias1` (`idCategorias`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategorias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProductos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_productos_categorias1` FOREIGN KEY (`idCategorias`) REFERENCES `categorias` (`idCategorias`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_productos_usuarios` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
