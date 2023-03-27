CREATE TABLE IF NOT EXISTS `subvenciones` (
  `proyectos_idproyectos` INT NOT NULL,
  `id_subvenciones` INT NOT NULL,
  `descripcion_subvenciones` VARCHAR(45) NOT NULL,
  `fecha_creacion` DATE NOT NULL,
  `fecha_planteada` DATE NULL,
  `fecha_presentada` DATE NULL,
  `fecha_provisional` DATE NULL,
  `fecha_definitiva` DATE NULL,
  `fecha_justificada` DATE NULL,
  `fecha_ingreso` DATE NULL,
  `entidad_solicitada` DATE NULL,
  `impote_publicado` INT NULL,
  `importe_solicitado` INT NULL,
  `importe_proyecto` INT NULL,
  `importe_concedido` INT NULL,
  `importe_ingresado` INT NULL,
  `importe_pagado` INT NULL,
  INDEX `fk_subvenciones_proyectos1_idx` (`proyectos_idproyectos` ASC),
  PRIMARY KEY (`id_subvenciones`),
  CONSTRAINT `fk_subvenciones_proyectos1`
    FOREIGN KEY (`proyectos_idproyectos`)
    REFERENCES `ayto_programa`.`proyectos` (`idproyectos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB; 