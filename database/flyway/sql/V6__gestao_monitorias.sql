-- Table `gestao_monitorias`.`local`
-- -----------------------------------------------------
ALTER TABLE local
ADD dependencia varchar(70),
DROP COLUMN predio,
DROP COLUMN sala;
