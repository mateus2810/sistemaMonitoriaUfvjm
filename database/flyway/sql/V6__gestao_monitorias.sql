-- Table `gestao_monitorias`.`local`
-- -----------------------------------------------------
ALTER TABLE local
ADD dependencia varchar(50),
DROP COLUMN predio,
DROP COLUMN sala;
