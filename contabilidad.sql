-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 07-06-2018 a las 03:47:18
-- Versión del servidor: 5.7.21
-- Versión de PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `contabilidad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devengado`
--

DROP TABLE IF EXISTS `devengado`;
CREATE TABLE IF NOT EXISTS `devengado` (
  `idDevengado` int(11) NOT NULL AUTO_INCREMENT,
  `Folio` int(11) NOT NULL,
  `fecha_dev` date NOT NULL,
  PRIMARY KEY (`idDevengado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

DROP TABLE IF EXISTS `factura`;
CREATE TABLE IF NOT EXISTS `factura` (
  `idFactura` int(11) NOT NULL AUTO_INCREMENT,
  `idProveedor` int(11) NOT NULL,
  `numero_fact` int(11) NOT NULL,
  `monto_fact` int(11) NOT NULL,
  `idOC` int(11) NOT NULL,
  `id_fecha` int(11) NOT NULL,
  `id_Notacredito` int(11) DEFAULT NULL,
  `id_dev` int(11) DEFAULT NULL,
  PRIMARY KEY (`idFactura`),
  KEY `idProveedor_FK_idx` (`idProveedor`),
  KEY `idOrden_compra_FK_idx` (`idOC`),
  KEY `id_fecha_fact_FK_idx` (`id_fecha`),
  KEY `id_nota_crediot_fk_idx` (`id_Notacredito`),
  KEY `id_devengado_fk_idx` (`id_dev`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fecha_fact`
--

DROP TABLE IF EXISTS `fecha_fact`;
CREATE TABLE IF NOT EXISTS `fecha_fact` (
  `idfecha_fact` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_recep` date NOT NULL,
  `fecha_conforme` date DEFAULT NULL,
  `fecha_fact` date DEFAULT NULL,
  PRIMARY KEY (`idfecha_fact`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licitacion`
--

DROP TABLE IF EXISTS `licitacion`;
CREATE TABLE IF NOT EXISTS `licitacion` (
  `idLicitacion` int(11) NOT NULL AUTO_INCREMENT,
  `num_Lic` varchar(12) NOT NULL,
  `descripcion_lic` varchar(250) DEFAULT NULL,
  `monto_lic` int(11) NOT NULL,
  PRIMARY KEY (`idLicitacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_credito`
--

DROP TABLE IF EXISTS `nota_credito`;
CREATE TABLE IF NOT EXISTS `nota_credito` (
  `idNota_credito` int(11) NOT NULL AUTO_INCREMENT,
  `monto_nc` int(11) DEFAULT NULL,
  `fecha_nc` date DEFAULT NULL,
  PRIMARY KEY (`idNota_credito`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_compra`
--

DROP TABLE IF EXISTS `orden_compra`;
CREATE TABLE IF NOT EXISTS `orden_compra` (
  `idOrden_Compra` int(11) NOT NULL AUTO_INCREMENT,
  `NumeroOC` varchar(12) NOT NULL,
  `Descrip_oc` varchar(200) DEFAULT NULL,
  `idLicitacion` int(11) DEFAULT NULL,
  `monto_total` int(11) NOT NULL,
  `monto_recep` int(11) NOT NULL,
  PRIMARY KEY (`idOrden_Compra`),
  KEY `idLicitacion_idx` (`idLicitacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE IF NOT EXISTS `supplier` (
  `supplierID` int(11) NOT NULL AUTO_INCREMENT,
  `supplierRut` varchar(9) NOT NULL,
  `supplierName` varchar(45) NOT NULL,
  `supplierDescrip` varchar(100) DEFAULT NULL,
  `supplierStatus` tinyint(4) NOT NULL,
  `process` varchar(20) NOT NULL,
  PRIMARY KEY (`supplierID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombreUser` varchar(30) NOT NULL,
  `user` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `tipo_usuario` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `idOrden_compra_FK` FOREIGN KEY (`idOC`) REFERENCES `orden_compra` (`idOrden_Compra`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idProveedor_FK` FOREIGN KEY (`idProveedor`) REFERENCES `supplier` (`supplierID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_devengado_fk` FOREIGN KEY (`id_dev`) REFERENCES `devengado` (`idDevengado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_fecha_fact_FK` FOREIGN KEY (`id_fecha`) REFERENCES `fecha_fact` (`idfecha_fact`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_nota_crediot_fk` FOREIGN KEY (`id_Notacredito`) REFERENCES `nota_credito` (`idNota_credito`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `orden_compra`
--
ALTER TABLE `orden_compra`
  ADD CONSTRAINT `idLicitacion` FOREIGN KEY (`idLicitacion`) REFERENCES `licitacion` (`idLicitacion`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
