-- Table `gestao_monitorias`.`usuario`
-- -----------------------------------------------------
ALTER TABLE local
ADD dependencia varchar(50),
DROP COLUMN predio,
DROP COLUMN sala;
