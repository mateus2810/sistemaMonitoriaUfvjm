-- -----------------------------------------------------
-- Table `gestao_monitorias`.`atestado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gestao_monitorias`.`atestado_frequencia` (
  `id_atestado_frequencia` INT NOT NULL AUTO_INCREMENT,
  `id_periodo` INT NOT NULL,
  `data_inicio` DATE NOT NULL,
  `data_fim` DATE NULL,
  `cadastrado` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_atestado_frequencia`),
  INDEX `fk_atestado_periodo1_idx` (`id_periodo` ASC) ,
  CONSTRAINT `fk_atestado_periodo1`
    FOREIGN KEY (`id_periodo`)
    REFERENCES `gestao_monitorias`.`periodo` (`id_periodo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
