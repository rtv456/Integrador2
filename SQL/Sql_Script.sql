-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

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
DROP TABLE IF EXISTS `citas`.`sede` ;

CREATE TABLE IF NOT EXISTS `citas`.`sede` (
  `idSede` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(200) NULL,
  `estado` VARCHAR(1) NULL,
  PRIMARY KEY (`idSede`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `citas`.`especialidad`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `citas`.`especialidad` ;

CREATE TABLE IF NOT EXISTS `citas`.`especialidad` (
  `idEspecialidad` INT(11) NOT NULL AUTO_INCREMENT,
  `idSede` INT NOT NULL,
  `descripcion` VARCHAR(100) NULL DEFAULT NULL,
  `estado` VARCHAR(1) NULL DEFAULT NULL,
  PRIMARY KEY (`idEspecialidad`),
  CONSTRAINT `fk_especialidad_sede1`
    FOREIGN KEY (`idSede`)
    REFERENCES `citas`.`sede` (`idSede`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `citas`.`persona`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `citas`.`persona` ;

CREATE TABLE IF NOT EXISTS `citas`.`persona` (
  `idPersona` INT(11) NOT NULL AUTO_INCREMENT,
  `documento` VARCHAR(11) NOT NULL,
  `apePaterno` VARCHAR(50) NULL DEFAULT NULL,
  `apeMaterno` VARCHAR(50) NULL DEFAULT NULL,
  `nombres` VARCHAR(50) NULL DEFAULT NULL,
  `fechaNacimiento` DATE NULL DEFAULT NULL,
  `sexo` CHAR(1) NULL DEFAULT NULL,
  `correo` VARCHAR(60) NULL DEFAULT NULL,
  `estado` VARCHAR(1) NULL DEFAULT NULL,
  `usuarioReg` VARCHAR(60) NULL DEFAULT NULL,
  `fechaReg` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`idPersona`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = latin1;

CREATE UNIQUE INDEX `documento_UNIQUE` ON `citas`.`persona` (`documento` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `citas`.`medico`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `citas`.`medico` ;

CREATE TABLE IF NOT EXISTS `citas`.`medico` (
  `idMedico` INT(11) NOT NULL AUTO_INCREMENT,
  `idEspecialidad` INT(11) NOT NULL,
  `idPersona` INT(11) NOT NULL,
  `CMP` VARCHAR(10) NULL DEFAULT NULL,
  `minutosAtencion` DOUBLE NULL DEFAULT '0',
  `estado` VARCHAR(1) NULL DEFAULT NULL,
  PRIMARY KEY (`idMedico`),
  CONSTRAINT `fk_medico_especialidad`
    FOREIGN KEY (`idEspecialidad`)
    REFERENCES `citas`.`especialidad` (`idEspecialidad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_medico_persona1`
    FOREIGN KEY (`idPersona`)
    REFERENCES `citas`.`persona` (`idPersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `citas`.`horario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `citas`.`horario` ;

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
  PRIMARY KEY (`idHorario`),
  CONSTRAINT `fk_horario_medico1`
    FOREIGN KEY (`idMedico`)
    REFERENCES `citas`.`medico` (`idMedico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `citas`.`paciente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `citas`.`paciente` ;

CREATE TABLE IF NOT EXISTS `citas`.`paciente` (
  `idPaciente` INT(11) NOT NULL AUTO_INCREMENT,
  `idPersona` INT(11) NOT NULL,
  `HC` VARCHAR(50) NULL DEFAULT NULL,
  `estado` VARCHAR(1) NULL DEFAULT NULL,
  PRIMARY KEY (`idPaciente`),
  CONSTRAINT `fk_paciente_persona1`
    FOREIGN KEY (`idPersona`)
    REFERENCES `citas`.`persona` (`idPersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `citas`.`citas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `citas`.`citas` ;

CREATE TABLE IF NOT EXISTS `citas`.`citas` (
  `idCita` INT(11) NOT NULL AUTO_INCREMENT,
  `idHorario` INT(11) NOT NULL,
  `idMedico` INT(11) NOT NULL,
  `idPaciente` INT(11) NOT NULL,
  `fechaHoraCita` DATETIME NULL DEFAULT NULL,
  `estado` VARCHAR(1) NULL DEFAULT NULL,
  `usuarioReg` VARCHAR(60) NULL DEFAULT NULL,
  `fechaReg` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`idCita`),
  CONSTRAINT `fk_citas_horario1`
    FOREIGN KEY (`idHorario`)
    REFERENCES `citas`.`horario` (`idHorario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_citas_paciente1`
    FOREIGN KEY (`idPaciente`)
    REFERENCES `citas`.`paciente` (`idPaciente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_citas_medico1`
    FOREIGN KEY (`idMedico`)
    REFERENCES `citas`.`medico` (`idMedico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `citas`.`perfil`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `citas`.`perfil` ;

CREATE TABLE IF NOT EXISTS `citas`.`perfil` (
  `idPerfil` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(100) NULL,
  `estado` VARCHAR(1) NULL,
  PRIMARY KEY (`idPerfil`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `citas`.`usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `citas`.`usuarios` ;

CREATE TABLE IF NOT EXISTS `citas`.`usuarios` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `idPersona` INT(11) NOT NULL,
  `idPerfil` INT NOT NULL,
  `usuario` VARCHAR(60) NOT NULL,
  `contrasena` VARCHAR(20) NOT NULL,
  `estado` VARCHAR(1) NULL DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  CONSTRAINT `fk_usuarios_persona1`
    FOREIGN KEY (`idPersona`)
    REFERENCES `citas`.`persona` (`idPersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios_perfil1`
    FOREIGN KEY (`idPerfil`)
    REFERENCES `citas`.`perfil` (`idPerfil`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;

CREATE UNIQUE INDEX `usuario_UNIQUE` ON `citas`.`usuarios` (`usuario` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `citas`.`modulo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `citas`.`modulo` ;

CREATE TABLE IF NOT EXISTS `citas`.`modulo` (
  `idModulo` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(100) NULL,
  `iconModulo` VARCHAR(50) NULL,
  `estado` VARCHAR(1) NULL,
  PRIMARY KEY (`idModulo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `citas`.`menu`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `citas`.`menu` ;

CREATE TABLE IF NOT EXISTS `citas`.`menu` (
  `idMenu` INT NOT NULL AUTO_INCREMENT,
  `idModulo` INT NOT NULL,
  `descripcion` VARCHAR(100) NULL,
  `urlmenu` VARCHAR(2000) NULL,
  `icmenu` VARCHAR(45) NULL,
  `estado` VARCHAR(1) NULL,
  PRIMARY KEY (`idMenu`),
  CONSTRAINT `fk_menu_modulo1`
    FOREIGN KEY (`idModulo`)
    REFERENCES `citas`.`modulo` (`idModulo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `citas`.`menu_perfil`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `citas`.`menu_perfil` ;

CREATE TABLE IF NOT EXISTS `citas`.`menu_perfil` (
  `idPerfil` INT NOT NULL,
  `idMenu` INT NOT NULL,
  `estado` VARCHAR(1) NULL,
  PRIMARY KEY (`idPerfil`, `idMenu`),
  CONSTRAINT `fk_menu_has_perfil_menu1`
    FOREIGN KEY (`idMenu`)
    REFERENCES `citas`.`menu` (`idMenu`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_menu_has_perfil_perfil1`
    FOREIGN KEY (`idPerfil`)
    REFERENCES `citas`.`perfil` (`idPerfil`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `citas`.`diagnostico`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `citas`.`diagnostico` ;

CREATE TABLE IF NOT EXISTS `citas`.`diagnostico` (
  `idDiagnostico` INT NOT NULL AUTO_INCREMENT,
  `codcie` VARCHAR(45) NULL,
  `descripcion` VARCHAR(1000) NULL,
  `estado` VARCHAR(1) NULL,
  PRIMARY KEY (`idDiagnostico`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `citas`.`historia_clinica`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `citas`.`historia_clinica` ;

CREATE TABLE IF NOT EXISTS `citas`.`historia_clinica` (
  `idHistoria` INT NOT NULL AUTO_INCREMENT,
  `idDiagnostico` INT NOT NULL,
  `idCita` INT(11) NOT NULL,
  `fechaAtencion` VARCHAR(20) NULL,
  `edad` VARCHAR(4) NULL,
  `relato` VARCHAR(3000) NULL,
  `indicaciones` VARCHAR(1000) NULL,
  `estado` VARCHAR(1) NULL,
  PRIMARY KEY (`idHistoria`),
  CONSTRAINT `fk_historia_clinica_diagnostico1`
    FOREIGN KEY (`idDiagnostico`)
    REFERENCES `citas`.`diagnostico` (`idDiagnostico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_historia_clinica_citas1`
    FOREIGN KEY (`idCita`)
    REFERENCES `citas`.`citas` (`idCita`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `citas`.`examenes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `citas`.`examenes` ;

CREATE TABLE IF NOT EXISTS `citas`.`examenes` (
  `idExamenes` INT NOT NULL AUTO_INCREMENT,
  `tipoExamen` VARCHAR(45) NULL,
  `descripcion` VARCHAR(100) NULL,
  `estado` VARCHAR(1) NULL,
  PRIMARY KEY (`idExamenes`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `citas`.`examenes_historia_clinica`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `citas`.`examenes_historia_clinica` ;

CREATE TABLE IF NOT EXISTS `citas`.`examenes_historia_clinica` (
  `idExamenes` INT NOT NULL,
  `idHistoria` INT NOT NULL,
  `archivo` VARCHAR(500) NULL,
  `usuarioRegistra` VARCHAR(60) NULL,
  `fechaRegistra` DATETIME NULL,
  `estado` VARCHAR(1) NULL,
  PRIMARY KEY (`idExamenes`, `idHistoria`),
  CONSTRAINT `fk_examenes_has_historia_clinica_examenes1`
    FOREIGN KEY (`idExamenes`)
    REFERENCES `citas`.`examenes` (`idExamenes`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_examenes_has_historia_clinica_historia_clinica1`
    FOREIGN KEY (`idHistoria`)
    REFERENCES `citas`.`historia_clinica` (`idHistoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

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
INSERT INTO `citas`.`persona` (`idPersona`, `documento`, `apePaterno`, `apeMaterno`, `nombres`, `fechaNacimiento`, `sexo`, `correo`, `estado`, `usuarioReg`, `fechaReg`) VALUES (1, '12345678', 'CORDOVA', 'ALLENDE', 'SAMUEL', '1986-11-11', 'M', 'micorreo1@gmail.com', '1', 'ADMIN', '2020-11-11');
INSERT INTO `citas`.`persona` (`idPersona`, `documento`, `apePaterno`, `apeMaterno`, `nombres`, `fechaNacimiento`, `sexo`, `correo`, `estado`, `usuarioReg`, `fechaReg`) VALUES (2, '12345677', 'PEREZ', 'RAMOS', 'MARIA', '1986-11-11', 'F', 'micorreo2@gmail.com', '1', 'ADMIN', '2020-11-11');
INSERT INTO `citas`.`persona` (`idPersona`, `documento`, `apePaterno`, `apeMaterno`, `nombres`, `fechaNacimiento`, `sexo`, `correo`, `estado`, `usuarioReg`, `fechaReg`) VALUES (3, '12345676', 'FLORES', 'LAZO', 'RAUL', '1986-11-11', 'M', 'micorreo3@gmail.com', '1', 'ADMIN', '2020-11-11');

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
INSERT INTO `citas`.`paciente` (`idPaciente`, `idPersona`, `HC`, `estado`) VALUES (1, 3, '1', '1');

COMMIT;


-- -----------------------------------------------------
-- Data for table `citas`.`perfil`
-- -----------------------------------------------------
START TRANSACTION;
USE `citas`;
INSERT INTO `citas`.`perfil` (`idPerfil`, `descripcion`, `estado`) VALUES (1, 'ADMINISTRADOR', '1');
INSERT INTO `citas`.`perfil` (`idPerfil`, `descripcion`, `estado`) VALUES (2, 'MEDICO', '1');
INSERT INTO `citas`.`perfil` (`idPerfil`, `descripcion`, `estado`) VALUES (3, 'PACIENTE', '1');
INSERT INTO `citas`.`perfil` (`idPerfil`, `descripcion`, `estado`) VALUES (4, 'EXAMENES', '1');

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
INSERT INTO `citas`.`menu` (`idMenu`, `idModulo`, `descripcion`, `urlmenu`, `icmenu`, `estado`) VALUES (1, 1, 'MENU', '../cita/menu.php', NULL, '0');
INSERT INTO `citas`.`menu` (`idMenu`, `idModulo`, `descripcion`, `urlmenu`, `icmenu`, `estado`) VALUES (2, 1, 'PERFIL', '../cita/perfil.php', NULL, '0');
INSERT INTO `citas`.`menu` (`idMenu`, `idModulo`, `descripcion`, `urlmenu`, `icmenu`, `estado`) VALUES (3, 1, 'USUARIOS', '../cita/usuarios.php', NULL, '1');
INSERT INTO `citas`.`menu` (`idMenu`, `idModulo`, `descripcion`, `urlmenu`, `icmenu`, `estado`) VALUES (4, 2, 'ESPECIALIDAD', '../cita/especialidad.php', NULL, '1');
INSERT INTO `citas`.`menu` (`idMenu`, `idModulo`, `descripcion`, `urlmenu`, `icmenu`, `estado`) VALUES (5, 2, 'MEDICOS', '../cita/medicos.php', NULL, '1');
INSERT INTO `citas`.`menu` (`idMenu`, `idModulo`, `descripcion`, `urlmenu`, `icmenu`, `estado`) VALUES (6, 3, 'PERSONAS', '../cita/persona.php', NULL, '1');
INSERT INTO `citas`.`menu` (`idMenu`, `idModulo`, `descripcion`, `urlmenu`, `icmenu`, `estado`) VALUES (7, 2, 'AGENDAR CITAS', '../cita/citas.php', NULL, '1');
INSERT INTO `citas`.`menu` (`idMenu`, `idModulo`, `descripcion`, `urlmenu`, `icmenu`, `estado`) VALUES (8, 2, 'PACIENTES', '../cita/paciente.php', NULL, '1');
INSERT INTO `citas`.`menu` (`idMenu`, `idModulo`, `descripcion`, `urlmenu`, `icmenu`, `estado`) VALUES (9, 2, 'HORARIO', '../cita/horario.php', NULL, '1');
INSERT INTO `citas`.`menu` (`idMenu`, `idModulo`, `descripcion`, `urlmenu`, `icmenu`, `estado`) VALUES (10, 1, 'PERFIL MENU', '../cita/perfilmenu.php', NULL, '0');
INSERT INTO `citas`.`menu` (`idMenu`, `idModulo`, `descripcion`, `urlmenu`, `icmenu`, `estado`) VALUES (11, 2, 'VER MIS CITAS', '../cita/miscitas.php', NULL, '1');
INSERT INTO `citas`.`menu` (`idMenu`, `idModulo`, `descripcion`, `urlmenu`, `icmenu`, `estado`) VALUES (12, 2, 'EXAMENES', '../cita/examenes.php', NULL, '1');
INSERT INTO `citas`.`menu` (`idMenu`, `idModulo`, `descripcion`, `urlmenu`, `icmenu`, `estado`) VALUES (13, 2, 'REPORTE HC', '../cita/historiaclinica.php', NULL, '1');

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
INSERT INTO `citas`.`menu_perfil` (`idPerfil`, `idMenu`, `estado`) VALUES (2, 7, '0');
INSERT INTO `citas`.`menu_perfil` (`idPerfil`, `idMenu`, `estado`) VALUES (2, 9, '0');
INSERT INTO `citas`.`menu_perfil` (`idPerfil`, `idMenu`, `estado`) VALUES (3, 7, '1');
INSERT INTO `citas`.`menu_perfil` (`idPerfil`, `idMenu`, `estado`) VALUES (2, 11, '1');
INSERT INTO `citas`.`menu_perfil` (`idPerfil`, `idMenu`, `estado`) VALUES (3, 11, '1');
INSERT INTO `citas`.`menu_perfil` (`idPerfil`, `idMenu`, `estado`) VALUES (2, 13, '1');
INSERT INTO `citas`.`menu_perfil` (`idPerfil`, `idMenu`, `estado`) VALUES (4, 12, '1');
INSERT INTO `citas`.`menu_perfil` (`idPerfil`, `idMenu`, `estado`) VALUES (1, 12, '1');
INSERT INTO `citas`.`menu_perfil` (`idPerfil`, `idMenu`, `estado`) VALUES (1, 13, '1');

COMMIT;


-- -----------------------------------------------------
-- Data for table `citas`.`diagnostico`
-- -----------------------------------------------------
START TRANSACTION;
USE `citas`;
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (1, 'A000', 'COLERA DEBIDO A VIBRIO CHOLERAE 01, BIOTIPO CHOLERAE', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (2, 'A001', 'COLERA DEBIDO A VIBRIO CHOLERAE 01, BIOTIPO EL TOR', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (3, 'A009', 'COLERA, NO ESPECIFICADO', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (4, 'A010', 'FIEBRE TIFOIDEA', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (5, 'A011', 'FIEBRE PARATIFOIDEA A', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (6, 'A012', 'FIEBRE PARATIFOIDEA B', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (7, 'A013', 'FIEBRE PARATIFOIDEA C', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (8, 'A014', 'FIEBRE PARATIFOIDEA, NO ESPECIFICADA', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (9, 'A020', 'ENTERITIS DEBIDA A SALMONELLA', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (10, 'A021', 'SEPSIS DEBIDA A SALMONELLA', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (11, 'A022', 'INFECCIONES LOCALIZADAS DEBIDAS A SALMONELLA', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (12, 'A028', 'OTRAS INFECCIONES ESPECIFICADAS COMO DEBIDAS A SALMONELLA', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (13, 'A029', 'INFECCION DEBIDA A SALMONELLA, NO ESPECIFICADA', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (14, 'A030', 'SHIGELOSIS DEBIDA A SHIGELLA DYSENTERIAE', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (15, 'A031', 'SHIGELOSIS DEBIDA A SHIGELLA FLEXNERI', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (16, 'A032', 'SHIGELOSIS DEBIDA A SHIGELLA BOYDII', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (17, 'A033', 'SHIGELOSIS DEBIDA A SHIGELLA SONNEI', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (18, 'A038', 'OTRAS SHIGELOSIS', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (19, 'A039', 'SHIGELOSIS DE TIPO NO ESPECIFICADO', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (20, 'A040', 'INFECCION DEBIDA A ESCHERICHIA COLI ENTEROPATOGENA', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (21, 'A041', 'INFECCION DEBIDA A ESCHERICHIA COLI ENTEROTOXIGENA', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (22, 'A042', 'INFECCION DEBIDA A ESCHERICHIA COLI ENTEROINVASIVA', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (23, 'A043', 'INFECCION DEBIDA A ESCHERICHIA COLI ENTEROHEMORRAGICA', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (24, 'A044', 'OTRAS INFECCIONES INTESTINALES DEBIDAS A ESCHERICHIA COLI', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (25, 'A045', 'ENTERITIS DEBIDA A CAMPYLOBACTER', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (26, 'A046', 'ENTERITIS DEBIDA A YERSINIA ENTEROCOLITICA', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (27, 'A047', 'ENTEROCOLITIS DEBIDA A CLOSTRIDIUM DIFFICILE', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (28, 'A048', 'OTRAS INFECCIONES INTESTINALES BACTERIANAS ESPECIFICADAS', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (29, 'A049', 'INFECCION INTESTINAL BACTERIANA, NO ESPECIFICADA', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (30, 'A050', 'INTOXICACION ALIMENTARIA ESTAFILOCOCICA', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (31, 'A051', 'BOTULISMO', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (32, 'A052', 'INTOXICACION ALIMENTARIA DEBIDA A CLOSTRIDIUM PERFRINGENS [CLOSTRIDIUM WELCHII]', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (33, 'A053', 'INTOXICACION ALIMENTARIA DEBIDA A VIBRIO PARAHAEMOLYTICUS', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (34, 'A054', 'INTOXICACION ALIMENTARIA DEBIDA A BACILLUS CEREUS', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (35, 'A058', 'OTRAS INTOXICACIONES ALIMENTARIAS DEBIDAS A BACTERIAS ESPECIFICADAS', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (36, 'A059', 'INTOXICACION ALIMENTARIA BACTERIANA, NO ESPECIFICADA', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (37, 'A060', 'DISENTERIA AMEBIANA AGUDA', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (38, 'A061', 'AMEBIASIS INTESTINAL CRONICA', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (39, 'A062', 'COLITIS AMEBIANA NO DISENTERICA', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (40, 'A063', 'AMEBOMA INTESTINAL', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (41, 'A064', 'ABSCESO AMEBIANO DEL HIGADO', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (42, 'A065', 'ABSCESO AMEBIANO DEL PULMON', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (43, 'A066', 'ABSCESO AMEBIANO DEL CEREBRO', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (44, 'A067', 'AMEBIASIS CUTANEA', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (45, 'A068', 'INFECCION AMEBIANA DE OTRAS LOCALIZACIONES', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (46, 'A069', 'AMEBIASIS, NO ESPECIFICADA', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (47, 'A070', 'BALANTIDIASIS', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (48, 'A071', 'GIARDIASIS [LAMBLIASIS]', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (49, 'A072', 'CRIPTOSPORIDIOSIS', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (50, 'A073', 'ISOSPORIASIS', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (51, 'A078', 'OTRAS ENFERMEDADES INTESTINALES ESPECIFICADAS DEBIDAS A PROTOZOARIOS', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (52, 'A079', 'ENFERMEDAD INTESTINAL DEBIDA A PROTOZOARIOS, NO ESPECIFICADA', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (53, 'A080', 'ENTERITIS DEBIDA A ROTAVIRUS', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (54, 'A081', 'GASTROENTEROPATIA AGUDA DEBIDA AL AGENTE DE NORWALK', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (55, 'A082', 'ENTERITIS DEBIDA A ADENOVIRUS', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (56, 'A083', 'OTRAS ENTERITIS VIRALES', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (57, 'A084', 'INFECCION INTESTINAL VIRAL, SIN OTRA ESPECIFICACION', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (58, 'A085', 'OTRAS INFECCIONES INTESTINALES ESPECIFICADAS', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (59, 'A090', 'OTRAS GASTROENTERITIS Y COLITIS DE ORIGEN INFECCIOSO', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (60, 'A099', 'GASTROENTERITIS Y COLITIS DE ORIGEN NO ESPECIFICADO', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (61, 'A09X', 'INFECCIONES INTESTINALES DEBIDAS A OTROS ORGANISMOS SIN ESPECIFICAR', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (62, 'A150', 'TUBERCULOSIS DEL PULMON, CONFIRMADA POR HALLAZGO MICROSCOPICO DEL BACILO TUBERCULOSO EN ESPUTO, CON O SIN CULTIVO', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (63, 'A151', 'TUBERCULOSIS DEL PULMON, CONFIRMADA UNICAMENTE POR CULTIVO', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (64, 'A152', 'TUBERCULOSIS DEL PULMON, CONFIRMADA HISTOLOGICAMENTE', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (65, 'A153', 'TUBERCULOSIS DEL PULMON, CONFIRMADA POR MEDIOS NO ESPECIFICADOS', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (66, 'A154', 'TUBERCULOSIS DE GANGLIOS LINFATICOS INTRATORACICOS, CONFIRMADA BACTERIOLOGICA E HISTOLOGICAMENTE', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (67, 'A155', 'TUBERCULOSIS DE LARINGE, TRAQUEA Y BRONQUIOS, CONFIRMADA BACTERIOLOGICA E HISTOLOGICAMENTE', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (68, 'A156', 'PLEURESIA TUBERCULOSA, CONFIRMADA BACTERIOLOGICA E HISTOLOGICAMENTE', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (69, 'A157', 'TUBERCULOSIS RESPIRATORIA PRIMARIA, CONFIRMADA BACTERIOLOGICA E HISTOLOGICAMENTE', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (70, 'A158', 'OTRAS TUBERCULOSIS RESPIRATORIAS, CONFIRMADAS BACTERIOLOGICA E HISTOLOGICAMENTE', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (71, 'A159', 'TUBERCULOSIS RESPIRATORIA NO ESPECIFICADA, CONFIRMADA BACTERIOLOGICA E HISTOLOGICAMENTE', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (72, 'A160', 'TUBERCULOSIS DEL PULMON, CON EXAMEN BACTERIOLOGICO E HISTOLOGICO NEGATIVOS', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (73, 'A161', 'TUBERCULOSIS DE PULMON, SIN EXAMEN BACTERIOLOGICO E HISTOLOGICO', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (74, 'A162', 'TUBERCULOSIS DE PULMON, SIN MENCION DE CONFIRMACION BACTERIOLOGICA O HISTOLOGICA', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (75, 'A163', 'TUBERCULOSIS DE GANGLIOS LINFATICOS INTRATORACICOS, SIN MENCION DE CONFIRMACION BACTERIOLOGICA O HISTOLOGICA', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (76, 'A164', 'TUBERCULOSIS DE LARINGE, TRAQUEA Y BRONQUIOS, SIN MENCION DE CONFIRMACION BACTERIOLOGICA O HISTOLOGICA', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (77, 'A165', 'PLEURESIA TUBERCULOSA, SIN MENCION DE CONFIRMACION BACTERIOLOGICA O HISTOLOGICA', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (78, 'A167', 'TUBERCULOSIS RESPIRATORIA PRIMARIA, SIN MENCION DE CONFIRMACION BACTERIOLOGICA O HISTOLOGICA', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (79, 'A168', 'OTRAS TUBERCULOSIS RESPIRATORIAS, SIN MENCION DE CONFIRMACION', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (80, 'A169', 'TUBERCULOSIS RESPIRATORIA NO ESPECIFICADA, SIN MENCION DE CONFIRMACION BACTERIOLOGICA O HISTOLOGICA', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (81, 'A170', 'MENINGITIS TUBERCULOSA', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (82, 'A171', 'TUBERCULOMA MENINGEO', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (83, 'A178', 'OTRAS TUBERCULOSIS DEL SISTEMA NERVIOSO', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (84, 'A179', 'TUBERCULOSIS DEL SISTEMA NERVIOSO, NO ESPECIFICADA', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (85, 'A180', 'TUBERCULOSIS DE HUESOS Y ARTICULACIONES', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (86, 'A181', 'TUBERCULOSIS DEL APARATO GENITOURINARIO', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (87, 'A182', 'LINFADENOPATIA PERIFERICA TUBERCULOSA', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (88, 'A183', 'TUBERCULOSIS DE LOS INTESTINOS, EL PERITONEO Y LOS GANGLIOS MESENTERICOS', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (89, 'A184', 'TUBERCULOSIS DE LA PIEL Y EL TEJIDO SUBCUTANEO', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (90, 'A185', 'TUBERCULOSIS DEL OJO', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (91, 'A186', 'TUBERCULOSIS DEL OIDO', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (92, 'A187', 'TUBERCULOSIS DE GLANDULAS SUPRARRENALES', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (93, 'A188', 'TUBERCULOSIS DE OTROS ORGANOS ESPECIFICADOS', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (94, 'A190', 'TUBERCULOSIS MILIAR AGUDA DE UN SOLO SITIO ESPECIFICADO', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (95, 'A191', 'TUBERCULOSIS MILIAR AGUDA DE SITIOS MULTIPLES', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (96, 'A192', 'TUBERCULOSIS MILIAR AGUDA, NO ESPECIFICADA', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (97, 'A198', 'OTRAS TUBERCULOSIS MILIARES', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (98, 'A199', 'TUBERCULOSIS MILIAR, SIN OTRA ESPECIFICACION', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (99, 'A200', 'PESTE BUBONICA', '1');
INSERT INTO `citas`.`diagnostico` (`idDiagnostico`, `codcie`, `descripcion`, `estado`) VALUES (100, 'A201', 'PESTE CELULOCUTANEA', '1');

COMMIT;


-- -----------------------------------------------------
-- Data for table `citas`.`examenes`
-- -----------------------------------------------------
START TRANSACTION;
USE `citas`;
INSERT INTO `citas`.`examenes` (`idExamenes`, `tipoExamen`, `descripcion`, `estado`) VALUES (1, 'LAB', 'Examen de Perfil completo lipido', '1');
INSERT INTO `citas`.`examenes` (`idExamenes`, `tipoExamen`, `descripcion`, `estado`) VALUES (2, 'IMG', 'Ecografia de torax', '1');
INSERT INTO `citas`.`examenes` (`idExamenes`, `tipoExamen`, `descripcion`, `estado`) VALUES (3, 'IMG', 'Radiografia de torax', '1');

COMMIT;

