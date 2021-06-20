-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema citas
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `citas` ;

-- -----------------------------------------------------
-- Schema citas
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `citas` DEFAULT CHARACTER SET latin1 ;
USE `citas` ;

-- -----------------------------------------------------
-- Table `citas`.`sede`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `citas`.`sede` (
  `idSede` INT NOT NULL,
  `descripcion` VARCHAR(200) NULL,
  `estado` VARCHAR(1) NULL,
  PRIMARY KEY (`idSede`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `citas`.`especialidad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `citas`.`especialidad` (
  `idEspecialidad` INT(11) NOT NULL AUTO_INCREMENT,
  `idSede` INT NOT NULL,
  `descripcion` VARCHAR(100) NULL DEFAULT NULL,
  `estado` VARCHAR(1) NULL DEFAULT NULL,
  PRIMARY KEY (`idEspecialidad`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `citas`.`persona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `citas`.`persona` (
  `idPersona` INT(11) NOT NULL AUTO_INCREMENT,
  `documento` VARCHAR(8) NULL,
  `apePaterno` VARCHAR(50) NULL DEFAULT NULL,
  `apeMaterno` VARCHAR(50) NULL DEFAULT NULL,
  `nombres` VARCHAR(50) NULL DEFAULT NULL,
  `fechaNacimiento` DATE NULL DEFAULT NULL,
  `sexo` CHAR(1) NULL DEFAULT NULL,
  `correo` VARCHAR(50) NULL DEFAULT NULL,
  `estado` VARCHAR(1) NULL DEFAULT NULL,
  `usuarioReg` VARCHAR(60) NULL DEFAULT NULL,
  `fechaReg` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`idPersona`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `citas`.`medico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `citas`.`medico` (
  `idMedico` INT(11) NOT NULL AUTO_INCREMENT,
  `idEspecialidad` INT(11) NOT NULL,
  `idPersona` INT(11) NOT NULL,
  `CMP` VARCHAR(10) NULL DEFAULT NULL,
  `minutosAtencion` DOUBLE NULL DEFAULT '0',
  `estado` VARCHAR(1) NULL DEFAULT NULL,
  PRIMARY KEY (`idMedico`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `citas`.`horario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `citas`.`horario` (
  `idHorario` INT(11) NOT NULL AUTO_INCREMENT,
  `idMedico` INT(11) NOT NULL,
  `fechaHoraInicio` DATETIME NULL DEFAULT NULL,
  `fechaHoraFin` DATETIME NULL DEFAULT NULL,
  `flgLunes` VARCHAR(1) NULL,
  `flgMartes` VARCHAR(1) NULL,
  `flgMiercoles` VARCHAR(1) NULL,
  `flgJueves` VARCHAR(1) NULL,
  `flgViernes` VARCHAR(1) NULL,
  `flgSabado` VARCHAR(1) NULL,
  `flgDomingo` VARCHAR(1) NULL,
  `estado` VARCHAR(1) NULL DEFAULT NULL,
  PRIMARY KEY (`idHorario`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `citas`.`paciente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `citas`.`paciente` (
  `idPaciente` INT(11) NOT NULL AUTO_INCREMENT,
  `idPersona` INT(11) NOT NULL,
  `HC` VARCHAR(50) NULL DEFAULT NULL,
  `estado` VARCHAR(1) NULL DEFAULT NULL,
  PRIMARY KEY (`idPaciente`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `citas`.`citas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `citas`.`citas` (
  `idCita` INT(11) NOT NULL AUTO_INCREMENT,
  `idHorario` INT(11) NOT NULL,
  `idMedico` INT(11) NOT NULL,
  `idPaciente` INT(11) NOT NULL,
  `fechaHoraCita` DATETIME NULL DEFAULT NULL,
  `estado` VARCHAR(1) NULL DEFAULT NULL,
  `usuarioReg` VARCHAR(60) NULL DEFAULT NULL,
  `fechaReg` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`idCita`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `citas`.`perfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `citas`.`perfil` (
  `idPerfil` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(100) NULL,
  `estado` VARCHAR(1) NULL,
  PRIMARY KEY (`idPerfil`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `citas`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `citas`.`usuarios` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `idPersona` INT(11) NOT NULL,
  `idPerfil` INT NOT NULL,
  `usuario` VARCHAR(60) NOT NULL,
  `contrasena` VARCHAR(20) NOT NULL,
  `estado` VARCHAR(1) NULL DEFAULT NULL,
  PRIMARY KEY (`idUsuario`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `citas`.`modulo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `citas`.`modulo` (
  `idModulo` INT NOT NULL,
  `descripcion` VARCHAR(100) NULL,
  `iconModulo` VARCHAR(50) NULL,
  `estado` VARCHAR(1) NULL,
  PRIMARY KEY (`idModulo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `citas`.`menu`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `citas`.`menu` (
  `idMenu` INT NOT NULL AUTO_INCREMENT,
  `idModulo` INT NOT NULL,
  `descripcion` VARCHAR(100) NULL,
  `urlmenu` VARCHAR(2000) NULL,
  `icmenu` VARCHAR(45) NULL,
  `estado` VARCHAR(1) NULL,
  PRIMARY KEY (`idMenu`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `citas`.`menu_perfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `citas`.`menu_perfil` (
  `idPerfil` INT NOT NULL,
  `idMenu` INT NOT NULL,
  `estado` VARCHAR(1) NULL,
  PRIMARY KEY (`idPerfil`, `idMenu`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Data for table `citas`.`sede`
-- -----------------------------------------------------
START TRANSACTION;
USE `citas`;
INSERT INTO `citas`.`sede` (`idSede`, `descripcion`, `estado`) VALUES (1, 'Los Olivos', '1');
INSERT INTO `citas`.`sede` (`idSede`, `descripcion`, `estado`) VALUES (2, 'San Martin de Porres', '1');
INSERT INTO `citas`.`sede` (`idSede`, `descripcion`, `estado`) VALUES (3, 'Lima Centro', '1');
INSERT INTO `citas`.`sede` (`idSede`, `descripcion`, `estado`) VALUES (4, 'Tele Consulta', '1');

COMMIT;


-- -----------------------------------------------------
-- Data for table `citas`.`especialidad`
-- -----------------------------------------------------
START TRANSACTION;
USE `citas`;
INSERT INTO `citas`.`especialidad` (`idEspecialidad`, `idSede`, `descripcion`, `estado`) VALUES (1, 1, 'CARDIOLOGIA', '1');
INSERT INTO `citas`.`especialidad` (`idEspecialidad`, `idSede`, `descripcion`, `estado`) VALUES (2, 1, 'GINECOLOGIA', '1');
INSERT INTO `citas`.`especialidad` (`idEspecialidad`, `idSede`, `descripcion`, `estado`) VALUES (3, 1, 'PEDIATRIA', '1');
INSERT INTO `citas`.`especialidad` (`idEspecialidad`, `idSede`, `descripcion`, `estado`) VALUES (4, 1, 'GASTROENTEROLOGIA', '1');
INSERT INTO `citas`.`especialidad` (`idEspecialidad`, `idSede`, `descripcion`, `estado`) VALUES (5, 1, 'PSICOLOGIA', '1');
INSERT INTO `citas`.`especialidad` (`idEspecialidad`, `idSede`, `descripcion`, `estado`) VALUES (6, 1, 'PSIQUIATRIA', '1');
INSERT INTO `citas`.`especialidad` (`idEspecialidad`, `idSede`, `descripcion`, `estado`) VALUES (7, 1, 'NEUROLOGIA', '1');
INSERT INTO `citas`.`especialidad` (`idEspecialidad`, `idSede`, `descripcion`, `estado`) VALUES (8, 1, 'ODONTOLOGIA', '1');
INSERT INTO `citas`.`especialidad` (`idEspecialidad`, `idSede`, `descripcion`, `estado`) VALUES (9, 1, 'OLFTALMOLOGIA', '1');
INSERT INTO `citas`.`especialidad` (`idEspecialidad`, `idSede`, `descripcion`, `estado`) VALUES (10, 1, 'MEDICINA INTERNA', '1');
INSERT INTO `citas`.`especialidad` (`idEspecialidad`, `idSede`, `descripcion`, `estado`) VALUES (11, 1, 'TRAUMATOLOGIA', '1');

COMMIT;


-- -----------------------------------------------------
-- Data for table `citas`.`persona`
-- -----------------------------------------------------
START TRANSACTION;
USE `citas`;
INSERT INTO `citas`.`persona` (`idPersona`, `documento`, `apePaterno`, `apeMaterno`, `nombres`, `fechaNacimiento`, `sexo`, `correo`, `estado`, `usuarioReg`, `fechaReg`) VALUES (1, '12345678', 'CORDOVA', 'ALLENDE', 'SAMUEL', '1986-11-11', 'M', 'CORDOVAALLENDE@GMAIL.COM', '1', 'ADMIN', '2020-11-11');
INSERT INTO `citas`.`persona` (`idPersona`, `documento`, `apePaterno`, `apeMaterno`, `nombres`, `fechaNacimiento`, `sexo`, `correo`, `estado`, `usuarioReg`, `fechaReg`) VALUES (2, '12345677', 'PEREZ', 'RAMOS', 'MARIA', '1986-11-11', 'F', 'CORDOVAALLENDE@GMAIL.COM', '1', 'ADMIN', '2020-11-11');
INSERT INTO `citas`.`persona` (`idPersona`, `documento`, `apePaterno`, `apeMaterno`, `nombres`, `fechaNacimiento`, `sexo`, `correo`, `estado`, `usuarioReg`, `fechaReg`) VALUES (3, '12345676', 'FLORES', 'LAZO', 'RAUL', '1986-11-11', 'M', 'CORDOVAALLENDE@GMAIL.COM', '1', 'ADMIN', '2020-11-11');

COMMIT;


-- -----------------------------------------------------
-- Data for table `citas`.`medico`
-- -----------------------------------------------------
START TRANSACTION;
USE `citas`;
INSERT INTO `citas`.`medico` (`idMedico`, `idEspecialidad`, `idPersona`, `CMP`, `minutosAtencion`, `estado`) VALUES (1, 1, 2, 'C01111', 20, '1');

COMMIT;


-- -----------------------------------------------------
-- Data for table `citas`.`horario`
-- -----------------------------------------------------
START TRANSACTION;
USE `citas`;
INSERT INTO `citas`.`horario` (`idHorario`, `idMedico`, `fechaHoraInicio`, `fechaHoraFin`, `flgLunes`, `flgMartes`, `flgMiercoles`, `flgJueves`, `flgViernes`, `flgSabado`, `flgDomingo`, `estado`) VALUES (1, 1, '2020-11-20 14:00', '2020-12-30 20:00', '1', '1', '1', '0', '0', '0', '0', '1');
INSERT INTO `citas`.`horario` (`idHorario`, `idMedico`, `fechaHoraInicio`, `fechaHoraFin`, `flgLunes`, `flgMartes`, `flgMiercoles`, `flgJueves`, `flgViernes`, `flgSabado`, `flgDomingo`, `estado`) VALUES (2, 1, '2020-11-20 08:00', '2020-12-30 13:00', '0', '0', '1', '1', '0', '1', '0', '1');

COMMIT;


-- -----------------------------------------------------
-- Data for table `citas`.`paciente`
-- -----------------------------------------------------
START TRANSACTION;
USE `citas`;
INSERT INTO `citas`.`paciente` (`idPaciente`, `idPersona`, `HC`, `estado`) VALUES (1, 3, 'H0001', '1');

COMMIT;


-- -----------------------------------------------------
-- Data for table `citas`.`perfil`
-- -----------------------------------------------------
START TRANSACTION;
USE `citas`;
INSERT INTO `citas`.`perfil` (`idPerfil`, `descripcion`, `estado`) VALUES (1, 'ADMINISTRADOR', '1');
INSERT INTO `citas`.`perfil` (`idPerfil`, `descripcion`, `estado`) VALUES (2, 'MEDICO', '1');
INSERT INTO `citas`.`perfil` (`idPerfil`, `descripcion`, `estado`) VALUES (3, 'PACIENTE', '1');

COMMIT;


-- -----------------------------------------------------
-- Data for table `citas`.`usuarios`
-- -----------------------------------------------------
START TRANSACTION;
USE `citas`;
INSERT INTO `citas`.`usuarios` (`idUsuario`, `idPersona`, `idPerfil`, `usuario`, `contrasena`, `estado`) VALUES (1, 1, 1, 'admin@gmail.com', '123', '1');
INSERT INTO `citas`.`usuarios` (`idUsuario`, `idPersona`, `idPerfil`, `usuario`, `contrasena`, `estado`) VALUES (2, 2, 2, 'medico@gmail.com', '123', '1');
INSERT INTO `citas`.`usuarios` (`idUsuario`, `idPersona`, `idPerfil`, `usuario`, `contrasena`, `estado`) VALUES (3, 3, 3, 'paciente@gmail.com', '123', '1');

COMMIT;


-- -----------------------------------------------------
-- Data for table `citas`.`modulo`
-- -----------------------------------------------------
START TRANSACTION;
USE `citas`;
INSERT INTO `citas`.`modulo` (`idModulo`, `descripcion`, `iconModulo`, `estado`) VALUES (1, 'Sistema', 'nav-icon far fa-plus-square', '1');
INSERT INTO `citas`.`modulo` (`idModulo`, `descripcion`, `iconModulo`, `estado`) VALUES (2, 'Citas', 'nav-icon far fa-calendar-alt', '1');
INSERT INTO `citas`.`modulo` (`idModulo`, `descripcion`, `iconModulo`, `estado`) VALUES (3, 'General', 'nav-icon fas fa-th', '1');

COMMIT;


-- -----------------------------------------------------
-- Data for table `citas`.`menu`
-- -----------------------------------------------------
START TRANSACTION;
USE `citas`;
INSERT INTO `citas`.`menu` (`idMenu`, `idModulo`, `descripcion`, `urlmenu`, `icmenu`, `estado`) VALUES (1, 1, 'MENU', '../cita/menu.php', NULL, '1');
INSERT INTO `citas`.`menu` (`idMenu`, `idModulo`, `descripcion`, `urlmenu`, `icmenu`, `estado`) VALUES (2, 1, 'PERFIL', '../cita/perfil.php', NULL, '1');
INSERT INTO `citas`.`menu` (`idMenu`, `idModulo`, `descripcion`, `urlmenu`, `icmenu`, `estado`) VALUES (3, 1, 'USUARIOS', '../cita/usuarios.php', NULL, '1');
INSERT INTO `citas`.`menu` (`idMenu`, `idModulo`, `descripcion`, `urlmenu`, `icmenu`, `estado`) VALUES (4, 2, 'ESPECIALIDAD', '../cita/especialidad.php', NULL, '1');
INSERT INTO `citas`.`menu` (`idMenu`, `idModulo`, `descripcion`, `urlmenu`, `icmenu`, `estado`) VALUES (5, 2, 'MEDICOS', '../cita/medicos.php', NULL, '1');
INSERT INTO `citas`.`menu` (`idMenu`, `idModulo`, `descripcion`, `urlmenu`, `icmenu`, `estado`) VALUES (6, 3, 'PERSONAS', '../cita/persona.php', NULL, '1');
INSERT INTO `citas`.`menu` (`idMenu`, `idModulo`, `descripcion`, `urlmenu`, `icmenu`, `estado`) VALUES (7, 2, 'CITAS', '../cita/citas.php', NULL, '1');
INSERT INTO `citas`.`menu` (`idMenu`, `idModulo`, `descripcion`, `urlmenu`, `icmenu`, `estado`) VALUES (8, 2, 'PACIENTES', '../cita/paciente.php', NULL, '1');
INSERT INTO `citas`.`menu` (`idMenu`, `idModulo`, `descripcion`, `urlmenu`, `icmenu`, `estado`) VALUES (9, 2, 'HORARIO', '../cita/horario.php', NULL, '1');
INSERT INTO `citas`.`menu` (`idMenu`, `idModulo`, `descripcion`, `urlmenu`, `icmenu`, `estado`) VALUES (10, 1, 'PERFIL MENU', '../cita/perfilmenu.php', NULL, '1');

COMMIT;


-- -----------------------------------------------------
-- Data for table `citas`.`menu_perfil`
-- -----------------------------------------------------
START TRANSACTION;
USE `citas`;
INSERT INTO `citas`.`menu_perfil` (`idPerfil`, `idMenu`, `estado`) VALUES (1, 1, '1');
INSERT INTO `citas`.`menu_perfil` (`idPerfil`, `idMenu`, `estado`) VALUES (1, 2, '1');
INSERT INTO `citas`.`menu_perfil` (`idPerfil`, `idMenu`, `estado`) VALUES (1, 3, '1');
INSERT INTO `citas`.`menu_perfil` (`idPerfil`, `idMenu`, `estado`) VALUES (1, 4, '1');
INSERT INTO `citas`.`menu_perfil` (`idPerfil`, `idMenu`, `estado`) VALUES (1, 5, '1');
INSERT INTO `citas`.`menu_perfil` (`idPerfil`, `idMenu`, `estado`) VALUES (1, 6, '1');
INSERT INTO `citas`.`menu_perfil` (`idPerfil`, `idMenu`, `estado`) VALUES (1, 7, '1');
INSERT INTO `citas`.`menu_perfil` (`idPerfil`, `idMenu`, `estado`) VALUES (1, 8, '1');
INSERT INTO `citas`.`menu_perfil` (`idPerfil`, `idMenu`, `estado`) VALUES (1, 9, '1');
INSERT INTO `citas`.`menu_perfil` (`idPerfil`, `idMenu`, `estado`) VALUES (1, 10, '1');
INSERT INTO `citas`.`menu_perfil` (`idPerfil`, `idMenu`, `estado`) VALUES (2, 7, '1');
INSERT INTO `citas`.`menu_perfil` (`idPerfil`, `idMenu`, `estado`) VALUES (2, 9, '1');
INSERT INTO `citas`.`menu_perfil` (`idPerfil`, `idMenu`, `estado`) VALUES (3, 7, '1');

COMMIT;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
