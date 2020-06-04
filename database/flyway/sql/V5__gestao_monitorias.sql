-- Table `gestao_monitorias`.`usuario`
-- -----------------------------------------------------
ALTER TABLE usuario
ADD containstitucional varchar(30),
DROP COLUMN senha;
