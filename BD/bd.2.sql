DROP DATABASE IF EXISTS  `UAED`;
CREATE DATABASE  IF NOT EXISTS `UAED` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `UAED`;

DROP TABLE IF EXISTS `requerimiento`;
CREATE TABLE `requerimiento` (
  `r_codigo` int(5) NOT NULL AUTO_INCREMENT,
  `r_nombre` varchar(25) not null,
  `r_descrp` varchar(255) not  NULL,
  `r_status` char(1) not null,
  PRIMARY KEY (`r_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `regimen`;
CREATE TABLE `regimen` (
  `rg_codigo` int(5) NOT NULL AUTO_INCREMENT,
  `rg_nombre` varchar(25) not null,
  `rg_descrp` varchar(255) not  NULL,
  `rg_status` char(1) not null,
  PRIMARY KEY (`rg_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `grado`;
CREATE TABLE `grado` (
  `g_codigo` int(2) NOT NULL AUTO_INCREMENT,
  `g_nombre` varchar(25) not null,
  `g_descrp` varchar(255) not  NULL,
  `g_status` char(1) not null,
  PRIMARY KEY (`g_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `tipo_discapacidad`;
CREATE TABLE `tipo_discapacidad` (
  `td_codigo` int(5) NOT NULL AUTO_INCREMENT,
  `td_nombre` varchar(25) not null,
  `td_descrp` varchar(255) not  NULL,
  `td_status` char(1) not null,
  PRIMARY KEY (`td_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `articulo`;
CREATE TABLE `articulo` (
  `a_codigo` int(5) NOT NULL,
  `a_nombre` varchar(25) not null,
  `a_descrp` varchar(255) not  NULL,
  `a_cantidad` int(2) zerofill not  NULL,
  `a_status` char(1) not null,
  PRIMARY KEY (`a_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `certificado`;
CREATE TABLE `certificado` (
  `c_codigo` int(5) NOT NULL,
  `c_emision` date not null,
  `c_vencimiento` date not  NULL,
  `c_status` char(1) not null,
  PRIMARY KEY (`c_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `estudiante`;
CREATE TABLE `estudiante` (
  `e_cedula` int(8) NOT NULL,
  `e_nombre` varchar(25) not null,
  `e_decanato` int(5) not null,
  `e_carrera` int(5) not null,
  `e_semestre` int (2) not null,
  `e_estado` char(1) not  NULL,
  `e_status` char(1) not null,
  PRIMARY KEY (`e_cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `estudiante_discapacidad`;
CREATE TABLE `estudiante_discapacidad` (
  `e_cedula` int(8) NOT NULL,
  `c_codigo` int(5) not null,
  `ed_status` char(1) not null,
  primary key (`e_cedula`,`c_codigo`),
  key `e_cedula` (`e_cedula`),
  constraint `ed_cedula` foreign key (`e_cedula`) references `estudiante` (`e_cedula`),
  key `c_codigo` (`c_codigo`),
  constraint `ed_certificado` foreign key (`c_codigo`) references `certificado` (`c_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `estudiante_requerimiento`;
CREATE TABLE `estudiante_requerimiento` (
  `e_cedula` int(8) NOT NULL,
  `r_codigo` int(5) not null,
  `er_status` char(1) not null,
  primary key (`e_cedula`,`r_codigo`),
  key `e_cedula` (`e_cedula`),
  constraint `er_estudiante` foreign key (`e_cedula`) references `estudiante_discapacidad` (`e_cedula`),
  key `r_codigo` (`r_codigo`),
  constraint `er_requerimiento` foreign key (`r_codigo`) references `requerimiento` (`r_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `discapacidad`;
CREATE TABLE `discapacidad` (
  `e_cedula` int(8) NOT NULL,
  `td_codigo` int(5) not null,
  `g_codigo` int(5) not null,
  `rg_codigo` int(5) not null,
  `d_duracion` date,
  `d_status` char(1) not null,
  primary key (`e_cedula`,`td_codigo`,`g_codigo`,`rg_codigo`),
  KEY `e_cedula` (`e_cedula`),
  constraint `d_estudiante` foreign key (`e_cedula`) references `estudiante_discapacidad` (`e_cedula`),
  KEY `td_codigo` (`td_codigo`),
  constraint `d_tipo` foreign key (`td_codigo`) references `tipo_discapacidad` (`td_codigo`),
  KEY `g_codigo` (`g_codigo`),
  constraint `d_grado` foreign key (`g_codigo`) references `grado` (`g_codigo`),
  KEY `rg_codigo` (`rg_codigo`),
  constraint `rg_regimen` foreign key (`rg_codigo`) references `regimen` (`rg_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `prestamo`;
CREATE TABLE `prestamo` (
  `e_cedula` int(8) NOT NULL,
  `a_codigo` int(5) not null,
  `p_prestamo` date not null,
  `p_vencimiento` date not null,
  `p_status` char(1) not null,
  primary key (`e_cedula`,`a_codigo`),
  KEY `e_cedula` (`e_cedula`),
  constraint `p_estudiante` foreign key (`e_cedula`) references `estudiante_discapacidad` (`e_cedula`),
  KEY `a_codigo` (`a_codigo`),
  constraint `p_articulo` foreign key (`a_codigo`) references `articulo` (`a_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

use `uaed`;
drop table if exists `usuario`;
create table `usuario` (
	`u_cedula` int(8) not null,
    `u_nombre` varchar(25) not null,
    `u_tipo` varchar(25) not null,
    `u_username` varchar(25) not null,
    `u_password` varchar(8) not null,
    `u_status` char(1) not null,
    primary key(`u_cedula`)
)