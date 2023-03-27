-- --------------------------------------------------------
-- Host:                         cursosinfin.com
-- Versión del servidor:         8.0.32 - MySQL Community Server - GPL
-- SO del servidor:              Linux
-- HeidiSQL Versión:             12.4.0.6659
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando estructura para tabla doqxqqul_curfin.configuracion
CREATE TABLE IF NOT EXISTS `configuracion` (
  `id` int NOT NULL,
  `parametros` varchar(45) NOT NULL,
  `valor` varchar(45) NOT NULL,
  `usuario` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla doqxqqul_curfin.configuracion: ~0 rows (aproximadamente)
DELETE FROM `configuracion`;

-- Volcando estructura para tabla doqxqqul_curfin.gastos
CREATE TABLE IF NOT EXISTS `gastos` (
  `idgastos` int NOT NULL AUTO_INCREMENT,
  `descripcion_gastos` varchar(45) NOT NULL,
  `gasto_previsto` float NOT NULL,
  `gasto_realizado_año` float NOT NULL,
  `gasto_realizado_CF` float NOT NULL,
  `aplicacion_presupuestada` varchar(45) NOT NULL,
  PRIMARY KEY (`idgastos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla doqxqqul_curfin.gastos: ~0 rows (aproximadamente)
DELETE FROM `gastos`;

-- Volcando estructura para tabla doqxqqul_curfin.indice
CREATE TABLE IF NOT EXISTS `indice` (
  `nombre_tabla` varchar(45) NOT NULL,
  `nombre_columna` varchar(45) DEFAULT NULL,
  `tipo_valor` varchar(45) DEFAULT NULL,
  `nulo` varchar(3) DEFAULT NULL,
  `primarykey` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla doqxqqul_curfin.indice: ~55 rows (aproximadamente)
DELETE FROM `indice`;
INSERT INTO `indice` (`nombre_tabla`, `nombre_columna`, `tipo_valor`, `nulo`, `primarykey`) VALUES
	('configuracion', 'id', 'int(11)', 'NO', ''),
	('configuracion', 'parametros', 'varchar(45)', 'NO', ''),
	('configuracion', 'valor', 'varchar(45)', 'NO', ''),
	('configuracion', 'usuario', 'varchar(45)', 'NO', ''),
	('gastos', 'idgastos', 'int(11)', 'NO', 'PRI'),
	('gastos', 'descripcion_gastos', 'varchar(45)', 'NO', ''),
	('gastos', 'gasto_previsto', 'float', 'NO', ''),
	('gastos', 'gasto_realizado_año', 'float', 'NO', ''),
	('gastos', 'gasto_realizado_CF', 'float', 'NO', ''),
	('gastos', 'aplicacion_presupuestada', 'varchar(45)', 'NO', ''),
	('indice', 'nombre_tabla', 'varchar(45)', 'NO', ''),
	('indice', 'tipo_valor', 'varchar(45)', 'YES', ''),
	('indice', 'parametros', 'varchar(45)', 'YES', ''),
	('indice', 'nombre_columna', 'varchar(45)', 'YES', ''),
	('ingresos', 'id_ingresos', 'int(11)', 'NO', 'PRI'),
	('ingresos', 'admpublic_ingresos', 'varchar(45)', 'YES', ''),
	('ingresos', 'gasto_previsto', 'float', 'YES', ''),
	('ingresos', 'ingreso_realizado_año', 'float', 'YES', ''),
	('ingresos', 'ingresos_realizado_importe', 'float', 'YES', ''),
	('ingresos', 'aplicacion_presupuestada', 'varchar(45)', 'NO', ''),
	('ingresos', 'descripcion_economica_ingresos', 'varchar(45)', 'YES', ''),
	('permisos', 'idpermisos', 'int(11)', 'NO', 'PRI'),
	('permisos', 'nombrepermisos', 'varchar(45)', 'NO', ''),
	('proyectos', 'idproyectos', 'int(11)', 'NO', 'PRI'),
	('proyectos', 'linea_proyecto', 'varchar(45)', 'YES', ''),
	('proyectos', 'descripcion_proyectos', 'varchar(45)', 'NO', ''),
	('proyectos', 'importe_proyectos', 'int(11)', 'YES', ''),
	('proyectos', 'fecha_provisional', 'varchar(45)', 'YES', ''),
	('subvenciones', 'id_subvenciones', 'int(11)', 'NO', 'PRI'),
	('subvenciones', 'descripcion_subvenciones', 'varchar(45)', 'NO', ''),
	('subvenciones', 'fecha_creacion', 'date', 'NO', ''),
	('subvenciones', 'fecha_planteada', 'date', 'YES', ''),
	('subvenciones', 'fecha_presentada', 'date', 'YES', ''),
	('subvenciones', 'fecha_provisional', 'date', 'YES', ''),
	('subvenciones', 'fecha_definitiva', 'date', 'YES', ''),
	('subvenciones', 'fecha_justificada', 'date', 'YES', ''),
	('subvenciones', 'fecha_ingreso', 'date', 'YES', ''),
	('subvenciones', 'entidad_solicitada', 'date', 'YES', ''),
	('subvenciones', 'importe_publicado', 'int(11)', 'YES', ''),
	('subvenciones', 'importe_solicitado', 'int(11)', 'YES', ''),
	('subvenciones', 'importe_proyecto', 'int(11)', 'YES', ''),
	('subvenciones', 'importe_concedido', 'int(11)', 'YES', ''),
	('subvenciones', 'importe_ingresado', 'int(11)', 'YES', ''),
	('subvenciones', 'importe_pagado', 'int(11)', 'YES', ''),
	('subvenciones', 'id_proyectos', 'int(11)', 'YES', ''),
	('subvenciones', 'subvencionescol', 'varchar(45)', 'YES', ''),
	('subvenciones_back', 'idsubvenciones_back', 'int(11)', 'NO', 'PRI'),
	('subvenciones_back', 'datos', 'varchar(45)', 'YES', ''),
	('subvenciones_back', 'subvenciones_backcol', 'varchar(45)', 'YES', ''),
	('usuarios', 'idusuarios', 'int(11)', 'NO', 'PRI'),
	('usuarios', 'nombreusuario', 'varchar(45)', 'NO', ''),
	('usuarios', 'correousuario', 'varchar(45)', 'NO', 'UNI'),
	('usuarios', 'telefonousurio', 'varchar(45)', 'NO', 'UNI'),
	('usuarios', 'departamento', 'varchar(45)', 'NO', ''),
	('usuarios', 'permisos_idpermisos', 'int(11)', 'YES', '');

-- Volcando estructura para tabla doqxqqul_curfin.ingresos
CREATE TABLE IF NOT EXISTS `ingresos` (
  `id_ingresos` int NOT NULL AUTO_INCREMENT,
  `admpublic_ingresos` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `gasto_previsto` float DEFAULT NULL,
  `ingreso_realizado_año` float DEFAULT NULL,
  `ingresos_realizado_importe` float DEFAULT NULL,
  `aplicacion_presupuestada` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `descripcion_economica_ingresos` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_ingresos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla doqxqqul_curfin.ingresos: ~0 rows (aproximadamente)
DELETE FROM `ingresos`;

-- Volcando estructura para tabla doqxqqul_curfin.linea_proyectos
CREATE TABLE IF NOT EXISTS `linea_proyectos` (
  `idproyectos` int NOT NULL AUTO_INCREMENT,
  `linea_proyecto` int NOT NULL,
  `descripcion_proyectos` varchar(45) NOT NULL,
  `importe_proyectos` float NOT NULL,
  `fecha_provisional` date NOT NULL,
  PRIMARY KEY (`idproyectos`,`linea_proyecto`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla doqxqqul_curfin.linea_proyectos: ~0 rows (aproximadamente)
DELETE FROM `linea_proyectos`;

-- Volcando estructura para tabla doqxqqul_curfin.permisos
CREATE TABLE IF NOT EXISTS `permisos` (
  `idpermisos` int NOT NULL AUTO_INCREMENT,
  `nombrepermisos` varchar(45) NOT NULL,
  PRIMARY KEY (`idpermisos`),
  UNIQUE KEY `idpermisos_UNIQUE` (`idpermisos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla doqxqqul_curfin.permisos: ~0 rows (aproximadamente)
DELETE FROM `permisos`;

-- Volcando estructura para tabla doqxqqul_curfin.proyectos
CREATE TABLE IF NOT EXISTS `proyectos` (
  `nombre_proyectos` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_proyectos` int NOT NULL,
  `concejal` varchar(45) NOT NULL,
  `fecha_proyectos` date NOT NULL,
  PRIMARY KEY (`nombre_proyectos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla doqxqqul_curfin.proyectos: ~0 rows (aproximadamente)
DELETE FROM `proyectos`;

-- Volcando estructura para tabla doqxqqul_curfin.subvenciones
CREATE TABLE IF NOT EXISTS `subvenciones` (
  `id_subvenciones` int NOT NULL AUTO_INCREMENT,
  `descripcion_subvenciones` varchar(45) NOT NULL,
  `entidad_solicitada` varchar(50) NOT NULL,
  `tipo_de_organismo` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `importe_publicado` float NOT NULL,
  `fecha_creacion` date NOT NULL,
  `fecha_planteada` date DEFAULT NULL,
  `fecha_presentada` date DEFAULT NULL,
  `fecha_provisional` date DEFAULT NULL,
  `fecha_definitiva` date DEFAULT NULL,
  `fecha_justificada` date DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `importe_solicitado` float DEFAULT NULL,
  `importe_proyecto` float DEFAULT NULL,
  `importe_concedido` float DEFAULT NULL,
  `importe_ingresado` float DEFAULT NULL,
  `importe_pagado` float DEFAULT NULL,
  `id_proyectos` int DEFAULT NULL,
  PRIMARY KEY (`id_subvenciones`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla doqxqqul_curfin.subvenciones: ~0 rows (aproximadamente)
DELETE FROM `subvenciones`;
INSERT INTO `subvenciones` (`id_subvenciones`, `descripcion_subvenciones`, `entidad_solicitada`, `tipo_de_organismo`, `importe_publicado`, `fecha_creacion`, `fecha_planteada`, `fecha_presentada`, `fecha_provisional`, `fecha_definitiva`, `fecha_justificada`, `fecha_ingreso`, `importe_solicitado`, `importe_proyecto`, `importe_concedido`, `importe_ingresado`, `importe_pagado`, `id_proyectos`) VALUES
	(7, 'prueba 5566', 'Ayuntamiento Granada', 'Estatal', 1340, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(8, 'prueba 7777', 'junta', 'Junta', 120000, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(9, 'prueba88888', 'junta', 'Junta', 123333, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- Volcando estructura para tabla doqxqqul_curfin.subvenciones_back
CREATE TABLE IF NOT EXISTS `subvenciones_back` (
  `idsubvenciones_back` int NOT NULL,
  `datos` varchar(45) DEFAULT NULL,
  `subvenciones_backcol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idsubvenciones_back`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla doqxqqul_curfin.subvenciones_back: ~0 rows (aproximadamente)
DELETE FROM `subvenciones_back`;

-- Volcando estructura para tabla doqxqqul_curfin.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idusuarios` int NOT NULL AUTO_INCREMENT,
  `nombreusuario` varchar(45) NOT NULL,
  `correousuario` varchar(45) NOT NULL,
  `telefonousurio` varchar(45) NOT NULL,
  `departamento` varchar(45) NOT NULL,
  `permisos_idpermisos` int DEFAULT NULL,
  PRIMARY KEY (`idusuarios`),
  UNIQUE KEY `idusuarios_UNIQUE` (`idusuarios`),
  UNIQUE KEY `correousuario_UNIQUE` (`correousuario`),
  UNIQUE KEY `telefonousurio_UNIQUE` (`telefonousurio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla doqxqqul_curfin.usuarios: ~0 rows (aproximadamente)
DELETE FROM `usuarios`;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
