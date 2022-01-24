-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-01-2022 a las 01:20:14
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `casacarlina`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_admin` int(11) NOT NULL,
  `cedula` int(20) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `direccion` varchar(300) NOT NULL,
  `contrasenia` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_admin`, `cedula`, `nombre`, `correo`, `telefono`, `direccion`, `contrasenia`) VALUES
(1, 22188492, 'Gisbel', 'lore@gmail.com', '0424', 'Calle 9 santa isabel', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id_articulos` int(11) NOT NULL,
  `nombre_articulo` varchar(255) NOT NULL,
  `codigo_articulo` varchar(255) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `precio_venta` decimal(20,2) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `cantidad` int(100) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `descuento` varchar(255) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id_articulos`, `nombre_articulo`, `codigo_articulo`, `descripcion`, `precio_venta`, `imagen`, `cantidad`, `estado`, `descuento`, `id_categoria`, `categoria`) VALUES
(2, 'Perforadora de Papel', '02', 'Agujero de papel de color amarillo, perfecto para complementar tus manualidades.', '10.00', '1642555897_1641764742_casacarlina2.jpg', 100, 'Inactivo', 'No', 1, ''),
(3, 'Cinta Adhesiva', '03', 'Cinta Adhesiva de colors', '2.00', '1642556050_1641764753_casacarlina4.webp', 50, 'Inactivo', '10%', 3, ''),
(7, 'Tijeras de colores', '04', 'Tijeras de colores, afiladas, para todo tipo de manualidades.', '11.00', '1642716390_1641764992_casacarlina5.webp', 60, 'Inactivo', 'No', 1, ''),
(8, 'Escritorio + Silla', '05', 'Escritorio negro sencillo, con sillon / silla de oficina de estilo simple, estilo chino.', '220.00', '1642718138_escritorio.png', 6, 'activo', 'No', 3, ''),
(9, 'Silla de Oficina', '06', 'Silla de oficina negra, acolchada, ultra cómoda', '120.00', '1642718339_silla.png', 10, 'activo', '20%', 3, ''),
(10, 'Mueble Individual', '07', 'Mueble Individual color gris pastel, ultra cómodo. Incluye cojín', '40.00', '1642718474_mueble-individual.png', 20, 'activo', '20%', 1, ''),
(11, 'Sofá de rayas', '08', 'Sofá de desmayo, de rayas negras y blancas. Pata de madera, incluye cojín.', '150.00', '1642718597_sofa-desmayo.png', 5, 'Activo', '20%', 1, ''),
(15, 'Sofá Turquesa', '09', 'Sofá sillón turquesa, patas de madera, para habitación o sala de estar.', '200.00', '1642721813_mueble-azul.png', 20, 'activo', '20%', 1, ''),
(16, 'Sofá asiento', '10', 'Sofá asiento con tapicería de la mejor calidad, color gris oscuro, perfecto para la decoración de tu hogar.', '150.00', '1642722031_asiento.png', 6, 'Activo', 'No', 1, ''),
(17, 'Escritorio con pedestal', '12', 'Escritorio con pedestal de madera marrón, mesa de centro, escritorio de madera.', '140.00', '1642722121_escritorio-pedestal.png', 10, 'activo', 'No', 3, ''),
(18, 'Mesa escolar', '13', 'Mesa carteira escola, escritorio de dibujos, para tus hijos.', '30.00', '1642722227_mesa-escolar.png', 20, 'activo', 'No', 1, ''),
(19, 'Silla Gamer', '15', 'Silla gamer color verde', '190.00', '1642722814_silla-gamer.png', 5, 'activo', 'No', 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id_sesion` varchar(255) NOT NULL,
  `id_articulos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id_sesion`, `id_articulos`) VALUES
('gis@gmail.com', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `categoria`) VALUES
(1, 'Hogar'),
(2, 'Electronica'),
(3, 'Oficina'),
(4, 'Tecnologia'),
(5, 'Juguetes'),
(6, 'Deportes'),
(7, 'Mascotas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre_cliente` varchar(255) NOT NULL,
  `apellido_cliente` varchar(255) NOT NULL,
  `correo_cliente` varchar(255) NOT NULL,
  `id_tipo_documento` int(11) NOT NULL,
  `documento` varchar(20) NOT NULL,
  `direccion` varchar(300) NOT NULL,
  `id_codigo_telefono` int(11) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `contrasenia` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre_cliente`, `apellido_cliente`, `correo_cliente`, `id_tipo_documento`, `documento`, `direccion`, `id_codigo_telefono`, `telefono`, `contrasenia`) VALUES
(1, 'Gisbel', 'Torres', 'gis@gmail.com', 1, 'V', 'CAlle 9 santa isabel', 1, '424', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigo_telefono`
--

CREATE TABLE `codigo_telefono` (
  `id_codigo_telefono` int(11) NOT NULL,
  `codigo_telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `codigo_telefono`
--

INSERT INTO `codigo_telefono` (`id_codigo_telefono`, `codigo_telefono`) VALUES
(1, 424),
(2, 412),
(3, 416),
(4, 414),
(5, 426);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `id_tipo_documento` int(11) NOT NULL,
  `tipo_documento` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`id_tipo_documento`, `tipo_documento`) VALUES
(1, 'V'),
(2, 'E');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id_articulos`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD KEY `id_articulos` (`id_articulos`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `id_codigo_telefono` (`id_codigo_telefono`),
  ADD KEY `id_tipo_documento` (`id_tipo_documento`);

--
-- Indices de la tabla `codigo_telefono`
--
ALTER TABLE `codigo_telefono`
  ADD PRIMARY KEY (`id_codigo_telefono`);

--
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`id_tipo_documento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id_articulos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `codigo_telefono`
--
ALTER TABLE `codigo_telefono`
  MODIFY `id_codigo_telefono` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  MODIFY `id_tipo_documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `articulos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`id_articulos`) REFERENCES `articulos` (`id_articulos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`id_codigo_telefono`) REFERENCES `codigo_telefono` (`id_codigo_telefono`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clientes_ibfk_2` FOREIGN KEY (`id_tipo_documento`) REFERENCES `tipo_documento` (`id_tipo_documento`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
