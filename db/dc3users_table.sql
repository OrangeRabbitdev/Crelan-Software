/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 5.5.9 : Database - software
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`software` /*!40100 DEFAULT CHARACTER SET utf8 */;

/*Table structure for table `archivos` */

DROP TABLE IF EXISTS `archivos`;

CREATE TABLE `archivos` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `autor` varchar(100) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `archivos` */

/*Table structure for table `dc3users` */

DROP TABLE IF EXISTS `dc3users`;

CREATE TABLE `dc3users` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `nombre_empleado` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `clave_unica` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `ocupacion` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `nombre_razonSocial_empresa` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `actividad_principal_empresa` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `registro_federal_empresa` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `registro_patronal_empresa` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `puesto` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `nombreCurso` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `duracion_horas_curso` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `periodo_ejecucion_desde` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `periodo_ejecucion_hasta` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `area_tematica_curso` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `nombre_firma_instructor` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `nombre_firma_representanteLegal` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `nombre_firma_representanteTrabajadores` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `ruta_firma_instructor` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `ruta_firma_representanteLegal` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `ruta_firma_representanteTrabajadores` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=445 DEFAULT CHARSET=utf8;

/*Data for the table `dc3users` */

/*Table structure for table `facturacion` */

DROP TABLE IF EXISTS `facturacion`;

CREATE TABLE `facturacion` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `filePath` varchar(300) DEFAULT NULL,
  `dateEnd` varchar(200) NOT NULL,
  `status` varchar(100) DEFAULT 'pendiente',
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `facturacion` */

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `rol` varchar(100) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `roles` */

insert  into `roles`(`id`,`rol`) values 
(1,'Administrador'),
(2,'Empleado');

/*Table structure for table `usuarios_empresa` */

DROP TABLE IF EXISTS `usuarios_empresa`;

CREATE TABLE `usuarios_empresa` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nombre_empresa` varchar(200) DEFAULT NULL,
  `representante_legal` varchar(200) DEFAULT NULL,
  `servicio_o_producto` varchar(200) DEFAULT NULL,
  `empleados_totales` int(200) DEFAULT NULL,
  `responsable_inmueble` varchar(200) DEFAULT NULL,
  `telefono1` varchar(200) DEFAULT NULL,
  `correo_electronico` varchar(200) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `fecha_inicio_operaciones` varchar(200) DEFAULT NULL,
  `coordenadas` varchar(200) DEFAULT NULL,
  `telefono2` varchar(200) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `usuarios_empresa` */

insert  into `usuarios_empresa`(`id`,`nombre_empresa`,`representante_legal`,`servicio_o_producto`,`empleados_totales`,`responsable_inmueble`,`telefono1`,`correo_electronico`,`direccion`,`fecha_inicio_operaciones`,`coordenadas`,`telefono2`) values 
(7,'Le Rose Technology','Marco Rosas','Desarrolladora',2,NULL,'315 5146984','le.rosetechnology@gmail.com','México',NULL,NULL,NULL);

/*Table structure for table `usuarios_plataforma` */

DROP TABLE IF EXISTS `usuarios_plataforma`;

CREATE TABLE `usuarios_plataforma` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellidos` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `password` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `updated_at` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `created_at` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rol` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `usuarios_plataforma` */

insert  into `usuarios_plataforma`(`id`,`nombre`,`apellidos`,`email`,`password`,`estado`,`updated_at`,`created_at`,`rol`) values 
(46,'Kevin','González','astarothkd@gmail.com','$2y$10$6wLyWzEOAZ01MJKzYdTur.eVjQijmVX/xyNCuY0mXhhq7bFYImrJS','activo','2020-11-28 14:07:35','2020-11-28 14:07:35','Administrador'),
(49,'Marco','Rosas','rosas@gmail.com','$2y$10$cGtrij6ypAHwxnyDZu4FcO33ENqxibbe5Sm8tW2FW/eEOq2FVfJiG','activo','2020-11-28 15:23:56','2020-11-28 15:23:56','Empleado'),
(50,'Jorge','Bañuelas','jralvarad@hotmail.com','$2y$10$lGOzkrKXlgpTlKEuVV8FB.UWMa72P443IHHjvtDIiy7xyiu2C2.32','activo','2020-11-28 17:24:25','2020-11-28 17:24:25','Administrador');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
