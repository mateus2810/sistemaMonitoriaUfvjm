-- -----------------------------------------------------
-- Table `gestao_monitorias`.`monitoria`
-- -----------------------------------------------------
ALTER TABLE monitoria
ADD conta varchar(30),
ADD agencia varchar(30),
ADD banco varchar(30),
ADD cpf varchar(30);

