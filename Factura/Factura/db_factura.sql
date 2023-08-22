-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-07-2023 a las 04:25:12
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_factura`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mae_articulo`
--

CREATE TABLE `mae_articulo` (
  `ID_Articulo` int(11) NOT NULL,
  `ID_Categoria` int(11) DEFAULT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Stock` int(11) DEFAULT NULL,
  `Precio` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mae_articulo`
--

INSERT INTO `mae_articulo` (`ID_Articulo`, `ID_Categoria`, `Nombre`, `Stock`, `Precio`) VALUES
(1, 1, 'Camiseta', 20, '29.99'),
(2, 1, 'Pantalón', 15, '39.99'),
(3, 1, 'Vestido', 10, '49.99'),
(4, 1, 'Blusa', 25, '24.99'),
(5, 1, 'Sudadera', 12, '34.99'),
(6, 2, 'Zapatos deportivos', 8, '59.99'),
(7, 2, 'Botas de invierno', 5, '79.99'),
(8, 2, 'Sandalias', 20, '39.99'),
(9, 2, 'Zapatillas casuales', 18, '49.99'),
(10, 3, 'Bolso de mano', 15, '39.99'),
(11, 3, 'Collar de plata', 10, '49.99'),
(12, 3, 'Pulsera de cuero', 20, '19.99'),
(13, 3, 'Cinturón de moda', 12, '24.99'),
(14, 4, 'Sombrero de paja', 8, '14.99'),
(15, 4, 'Gorra de béisbol', 10, '9.99'),
(16, 4, 'Sombrero de ala ancha', 5, '19.99'),
(17, 4, 'Gorro de invierno', 12, '12.99'),
(18, 5, 'Anillo de diamantes', 3, '199.99'),
(19, 5, 'Pendientes de oro', 6, '149.99'),
(20, 5, 'Collar de perlas', 4, '179.99'),
(21, 1, 'Jeans', 20, '39.99'),
(22, 1, 'Blazer', 8, '59.99'),
(23, 1, 'Falda', 12, '24.99'),
(24, 2, 'Botas de cuero', 10, '79.99'),
(25, 2, 'Zapatos formales', 15, '49.99'),
(26, 3, 'Bolso de viaje', 5, '59.99'),
(27, 3, 'Collar de perlas', 3, '99.99'),
(28, 4, 'Gorra de sol', 8, '14.99'),
(29, 4, 'Sombrero de invierno', 10, '19.99'),
(30, 5, 'Anillo de plata', 12, '79.99'),
(31, 1, 'Polera', 18, '19.99'),
(32, 1, 'Chaqueta de cuero', 5, '99.99'),
(33, 2, 'Zapatillas deportivas', 10, '69.99'),
(34, 3, 'Bolso de mano', 15, '49.99'),
(35, 4, 'Sombrero de ala estrecha', 8, '12.99'),
(36, 5, 'Pendientes de plata', 12, '29.99'),
(37, 1, 'Shorts', 10, '24.99'),
(38, 2, 'Sandalias de playa', 12, '29.99'),
(39, 3, 'Reloj de pulsera', 5, '149.99'),
(40, 4, 'Gorra de estilo urbano', 8, '9.99'),
(41, 5, 'Collar de acero inoxidable', 10, '19.99'),
(42, 1, 'Blusa de seda', 6, '49.99'),
(43, 1, 'Camisa a cuadros', 12, '29.99'),
(44, 2, 'Zapatos de vestir', 8, '79.99'),
(45, 3, 'Cartera de cuero', 10, '69.99'),
(46, 4, 'Sombrero fedora', 5, '24.99'),
(47, 5, 'Pulsera de acero inoxidable', 12, '14.99'),
(48, 1, 'Vestido de noche', 4, '89.99'),
(49, 1, 'Polo', 15, '19.99'),
(50, 2, 'Botas de montaña', 10, '80.99'),
(100, 1, 'Camisa', 20, '15.00'),
(101, 1, 'Pantalon de Tela', 10, '20.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mae_categoria`
--

CREATE TABLE `mae_categoria` (
  `ID_Categoria` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Estado` varchar(20) DEFAULT NULL,
  `Descripcion` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mae_categoria`
--

INSERT INTO `mae_categoria` (`ID_Categoria`, `Nombre`, `Estado`, `Descripcion`) VALUES
(1, 'Ropa', 'Activo', 'Categoría de ropa'),
(2, 'Calzado', 'Activo', 'Categoría de calzado'),
(3, 'Accesorios', 'Activo', 'Categoría de accesorios'),
(4, 'Sombreros', 'Activo', 'Categoría de sombreros'),
(5, 'Joyas', 'Inactivo', 'Categoría de joyas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mae_cliente`
--

CREATE TABLE `mae_cliente` (
  `T_Documento` varchar(100) DEFAULT NULL,
  `ID_Cliente` int(11) NOT NULL,
  `Nombres_Apellidos` varchar(200) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Mobile` int(9) DEFAULT NULL,
  `Direccion` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mae_cliente`
--

INSERT INTO `mae_cliente` (`T_Documento`, `ID_Cliente`, `Nombres_Apellidos`, `Email`, `Mobile`, `Direccion`) VALUES
('DNI', 12345679, 'Juan Perez', 'juan@gmail.com', 912345678, 'Lima'),
('DNI', 34567891, 'Mónica Ramos', 'monica@gmail.com', 923456789, 'Tumbes'),
('DNI', 55555555, 'Brayton Palomino', 'Brayton@gmail.com', 923537462, 'La Matarani'),
('DNI', 71636770, 'Johan Mamani', 'Johanjarata@gmail.com', 923537462, 'La Joya'),
('DNI', 87654322, 'María Torres', 'maria@gmail.com', 987654321, 'Cusco'),
('DNI', 90123457, 'Pedro López', 'pedro@gmail.com', 912345678, 'Juliaca'),
('RUC', 2147483647, 'Robert Dueñas', 'robert@gmail.com', 923537462, 'Arequipa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mae_modopago`
--

CREATE TABLE `mae_modopago` (
  `ID_ModoPago` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Descripcion` varchar(200) DEFAULT NULL,
  `Estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mae_modopago`
--

INSERT INTO `mae_modopago` (`ID_ModoPago`, `Nombre`, `Descripcion`, `Estado`) VALUES
(1, 'Efectivo', 'Pago en efectivo', 'Activo'),
(2, 'Tarjeta de crédito', 'Pago con tarjeta de crédito', 'Activo'),
(3, 'Transferencia bancaria', 'Pago por transferencia bancaria', 'Inactivo'),
(4, 'Cheque', 'Pago con cheque', 'Activo'),
(5, 'PayPal', 'Pago a través de PayPal', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mae_puntoventa`
--

CREATE TABLE `mae_puntoventa` (
  `ID_PuntoVenta` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Direccion` varchar(200) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `Horario` varchar(100) DEFAULT NULL,
  `Tipo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mae_puntoventa`
--

INSERT INTO `mae_puntoventa` (`ID_PuntoVenta`, `Nombre`, `Direccion`, `Telefono`, `Horario`, `Tipo`) VALUES
(1, 'Mall', 'Calle Principal 123', '123456789', '9:00 AM - 6:00 PM', 'Físico'),
(2, 'Tienda Centro Comercial', 'Avenida Comercial 456', '987654321', '10:00 AM - 8:00 PM', 'Físico'),
(3, 'Tienda Tottus.com', 'Sitio web', 'N/A', '24/7', 'Virtual'),
(4, 'Tienda Plaza Vea', 'Calle Secundaria 789', '555555555', '8:00 AM - 5:00 PM', 'Físico'),
(5, 'Tienda Ripley', 'Calle Central 456', '777777777', '9:00 AM - 7:00 PM', 'Físico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mae_vendedor`
--

CREATE TABLE `mae_vendedor` (
  `T_Documento` varchar(100) DEFAULT NULL,
  `ID_Vendedor` int(11) NOT NULL,
  `Nombres` varchar(100) DEFAULT NULL,
  `Apellidos` varchar(100) DEFAULT NULL,
  `Mobile` int(9) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mae_vendedor`
--

INSERT INTO `mae_vendedor` (`T_Documento`, `ID_Vendedor`, `Nombres`, `Apellidos`, `Mobile`, `Email`, `Username`, `Password`) VALUES
('DNI', 71636779, 'geraldyne', 'roque', 956557265, 'geral@gmail', 'geral', '123456'),
('DNI', 77777788, 'Isac', 'Jarata', 923537462, 'Johanjarata@gmail.com', 'ISAC', '123456');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trs_factura`
--

CREATE TABLE `trs_factura` (
  `ID_Factura` int(11) NOT NULL,
  `ID_Cliente` int(11) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `ID_Vendedor` int(11) DEFAULT NULL,
  `ID_PuntoVenta` int(11) DEFAULT NULL,
  `ID_ModoPago` int(11) DEFAULT NULL,
  `Monto_ImporteTotal` decimal(10,2) DEFAULT NULL,
  `Impuesto` int(11) DEFAULT NULL,
  `Impuesto_Total` decimal(10,2) DEFAULT NULL,
  `Monto_Total` decimal(10,2) DEFAULT NULL,
  `Observaciones` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `trs_factura`
--

INSERT INTO `trs_factura` (`ID_Factura`, `ID_Cliente`, `Fecha`, `ID_Vendedor`, `ID_PuntoVenta`, `ID_ModoPago`, `Monto_ImporteTotal`, `Impuesto`, `Impuesto_Total`, `Monto_Total`, `Observaciones`) VALUES
(10001, 71636770, '2023-07-03', 77777788, 5, 5, '225.00', 18, '34.32', '259.32', 'ninguna observacion'),
(10002, 71636770, '2023-07-03', 77777788, 1, 1, '15.00', 18, '2.29', '17.29', ''),
(10003, 71636770, '2023-07-03', 77777788, 1, 4, '584.95', 18, '89.23', '674.18', ''),
(10004, 71636770, '2023-07-07', 77777788, 1, 1, '75.00', 18, '11.44', '86.44', ''),
(10006, 90123457, '2023-07-07', 77777788, 1, 1, '2886943.74', 18, '440381.24', '3327324.98', ''),
(10007, 71636770, '2023-07-07', 77777788, 3, 5, '179.98', 18, '27.44', '207.42', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trs_ordenfactura`
--

CREATE TABLE `trs_ordenfactura` (
  `ID_OrdenFactura` int(11) NOT NULL,
  `ID_Factura` int(11) DEFAULT NULL,
  `ID_Articulo` int(11) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `Importe_Final` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `trs_ordenfactura`
--

INSERT INTO `trs_ordenfactura` (`ID_OrdenFactura`, `ID_Factura`, `ID_Articulo`, `Cantidad`, `Importe_Final`) VALUES
(22, 10001, 100, 2, '30.00'),
(24, 10003, 100, 3, '45.00'),
(25, 10002, 100, 1, '15.00'),
(26, 10001, 100, 4, '60.00'),
(32, 10001, 101, 4, '80.00'),
(33, 10001, 100, 4, '60.00'),
(34, 10004, 100, 5, '75.00'),
(35, 10003, 50, 5, '404.95'),
(36, 10003, 48, 2, '179.98'),
(37, 10006, 33, 4, '279.96'),
(40, 10001, 27, 1, '99.99'),
(42, 10006, 17, 222222, '2886663.78'),
(43, 10007, 48, 2, '179.98'),
(44, 10007, 14, 5, '74.95');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mae_articulo`
--
ALTER TABLE `mae_articulo`
  ADD PRIMARY KEY (`ID_Articulo`),
  ADD KEY `ID_Categoria` (`ID_Categoria`);

--
-- Indices de la tabla `mae_categoria`
--
ALTER TABLE `mae_categoria`
  ADD PRIMARY KEY (`ID_Categoria`);

--
-- Indices de la tabla `mae_cliente`
--
ALTER TABLE `mae_cliente`
  ADD PRIMARY KEY (`ID_Cliente`);

--
-- Indices de la tabla `mae_modopago`
--
ALTER TABLE `mae_modopago`
  ADD PRIMARY KEY (`ID_ModoPago`);

--
-- Indices de la tabla `mae_puntoventa`
--
ALTER TABLE `mae_puntoventa`
  ADD PRIMARY KEY (`ID_PuntoVenta`);

--
-- Indices de la tabla `mae_vendedor`
--
ALTER TABLE `mae_vendedor`
  ADD PRIMARY KEY (`ID_Vendedor`);

--
-- Indices de la tabla `trs_factura`
--
ALTER TABLE `trs_factura`
  ADD PRIMARY KEY (`ID_Factura`),
  ADD KEY `ID_Cliente` (`ID_Cliente`),
  ADD KEY `ID_Vendedor` (`ID_Vendedor`),
  ADD KEY `ID_PuntoVenta` (`ID_PuntoVenta`),
  ADD KEY `ID_ModoPago` (`ID_ModoPago`);

--
-- Indices de la tabla `trs_ordenfactura`
--
ALTER TABLE `trs_ordenfactura`
  ADD PRIMARY KEY (`ID_OrdenFactura`),
  ADD KEY `ID_Factura` (`ID_Factura`),
  ADD KEY `ID_Articulo` (`ID_Articulo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `trs_ordenfactura`
--
ALTER TABLE `trs_ordenfactura`
  MODIFY `ID_OrdenFactura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mae_articulo`
--
ALTER TABLE `mae_articulo`
  ADD CONSTRAINT `mae_articulo_ibfk_1` FOREIGN KEY (`ID_Categoria`) REFERENCES `mae_categoria` (`ID_Categoria`);

--
-- Filtros para la tabla `trs_factura`
--
ALTER TABLE `trs_factura`
  ADD CONSTRAINT `trs_factura_ibfk_1` FOREIGN KEY (`ID_Cliente`) REFERENCES `mae_cliente` (`ID_Cliente`),
  ADD CONSTRAINT `trs_factura_ibfk_2` FOREIGN KEY (`ID_Vendedor`) REFERENCES `mae_vendedor` (`ID_Vendedor`),
  ADD CONSTRAINT `trs_factura_ibfk_3` FOREIGN KEY (`ID_PuntoVenta`) REFERENCES `mae_puntoventa` (`ID_PuntoVenta`),
  ADD CONSTRAINT `trs_factura_ibfk_4` FOREIGN KEY (`ID_ModoPago`) REFERENCES `mae_modopago` (`ID_ModoPago`);

--
-- Filtros para la tabla `trs_ordenfactura`
--
ALTER TABLE `trs_ordenfactura`
  ADD CONSTRAINT `trs_ordenfactura_ibfk_1` FOREIGN KEY (`ID_Factura`) REFERENCES `trs_factura` (`ID_Factura`),
  ADD CONSTRAINT `trs_ordenfactura_ibfk_2` FOREIGN KEY (`ID_Articulo`) REFERENCES `mae_articulo` (`ID_Articulo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
