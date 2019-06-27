CREATE SCHEMA IF NOT EXISTS `trabalho_engenharia` DEFAULT CHARACTER SET latin1 ;
USE `trabalho_engenharia` ;

CREATE TABLE IF NOT EXISTS `trabalho_engenharia`.`clinica` (
  `idClinica` INT(11) NOT NULL AUTO_INCREMENT,
  `cnpj` VARCHAR(14) NOT NULL,
  `nome` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`idClinica`),
  UNIQUE INDEX `cnpj` (`cnpj` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

CREATE TABLE IF NOT EXISTS `trabalho_engenharia`.`departamento` (
  `idDepartamento` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(15) NOT NULL,
  `idClinica` INT(11) NOT NULL,
  PRIMARY KEY (`idDepartamento`),
  INDEX `fk_departamento_clinica` (`idClinica` ASC),
  CONSTRAINT `fk_departamento_clinica`
    FOREIGN KEY (`idClinica`)
    REFERENCES `trabalho_engenharia`.`clinica` (`idClinica`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

CREATE TABLE IF NOT EXISTS `trabalho_engenharia`.`funcionario` (
  `idFuncionario` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(30) NOT NULL,
  `salario` DECIMAL(5,2) NOT NULL,
  `idDepartamento` INT(11) NOT NULL,
  PRIMARY KEY (`idFuncionario`),
  INDEX `fk_funcionario_departamento` (`idDepartamento` ASC),
  CONSTRAINT `fk_funcionario_departamento`
    FOREIGN KEY (`idDepartamento`)
    REFERENCES `trabalho_engenharia`.`departamento` (`idDepartamento`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

CREATE TABLE IF NOT EXISTS `trabalho_engenharia`.`assistenteServicosGerais` (
  `funcao` VARCHAR(20) NOT NULL,
  `idFuncionario` INT(11) NOT NULL,
  UNIQUE INDEX `assistenteServicosGerais_idFuncionario_unique` (`idFuncionario`),
  INDEX `fk_assistenteServicosGerais_funcionario` (`idFuncionario` ASC),
  CONSTRAINT `fk_assistenteServicosGerais_funcionario`
    FOREIGN KEY (`idFuncionario`)
    REFERENCES `trabalho_engenharia`.`funcionario` (`idFuncionario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

CREATE TABLE IF NOT EXISTS `trabalho_engenharia`.`plano` (
  `idPlano` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(20) NOT NULL,
  `preco` INT(11) NOT NULL,
  PRIMARY KEY (`idPlano`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

CREATE TABLE IF NOT EXISTS `trabalho_engenharia`.`paciente` (
  `idPaciente` INT(11) NOT NULL AUTO_INCREMENT,
  `cpf` VARCHAR(11) NOT NULL,
  `endereco` VARCHAR(60) NOT NULL,
  `nome` VARCHAR(30) NOT NULL,
  `dataNascimento` DATE NOT NULL,
  `idPlano` INT(11) NULL,
  PRIMARY KEY (`idPaciente`),
  UNIQUE INDEX `cpf` (`cpf` ASC),
  INDEX `fk_paciente_plano` (`idPlano` ASC),
  CONSTRAINT `fk_paciente_plano`
    FOREIGN KEY (`idPlano`)
    REFERENCES `trabalho_engenharia`.`plano` (`idPlano`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

CREATE TABLE IF NOT EXISTS `trabalho_engenharia`.`consulta` (
  `idConsulta` INT(11) NOT NULL AUTO_INCREMENT,
  `data` DATETIME NOT NULL,
  `idMedico` INT(11) NOT NULL,
  `idPaciente` INT(11) NOT NULL,
  `idClinica` INT(11) NOT NULL,
  PRIMARY KEY (`idConsulta`),
  INDEX `fk_consulta_clinica` (`idClinica` ASC),
  INDEX `fk_consulta_medico` (`idMedico` ASC),
  INDEX `fk_consulta_paciente` (`idPaciente` ASC),
  CONSTRAINT `fk_consulta_clinica`
    FOREIGN KEY (`idClinica`)
    REFERENCES `trabalho_engenharia`.`clinica` (`idClinica`),
  CONSTRAINT `fk_consulta_medico`
    FOREIGN KEY (`idMedico`)
    REFERENCES `trabalho_engenharia`.`funcionario` (`idFuncionario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_consulta_paciente`
    FOREIGN KEY (`idPaciente`)
    REFERENCES `trabalho_engenharia`.`paciente` (`idPaciente`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

CREATE TABLE IF NOT EXISTS `trabalho_engenharia`.`enfermeiro` (
  `ala` VARCHAR(20) NOT NULL,
  `idFuncionario` INT(11) NOT NULL,
  UNIQUE INDEX `enfermeiro_idFuncionario_unique` (`idFuncionario`),
  INDEX `fk_enfermeiro_funcionario` (`idFuncionario` ASC),
  CONSTRAINT `fk_enfermeiro_funcionario`
    FOREIGN KEY (`idFuncionario`)
    REFERENCES `trabalho_engenharia`.`funcionario` (`idFuncionario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

CREATE TABLE IF NOT EXISTS `trabalho_engenharia`.`medico` (
  `especializacao` VARCHAR(20) NOT NULL DEFAULT 'Clínico Geral',
  `idFuncionario` INT(11) NOT NULL,
  UNIQUE INDEX `medico_idFuncionario_unique` (`idFuncionario`),
  INDEX `fk_medico_funcionario` (`idFuncionario` ASC),
  CONSTRAINT `fk_medico_funcionario`
    FOREIGN KEY (`idFuncionario`)
    REFERENCES `trabalho_engenharia`.`funcionario` (`idFuncionario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

CREATE TABLE IF NOT EXISTS `trabalho_engenharia`.`tecnicoAdministrativo` (
  `setor` VARCHAR(20) NOT NULL,
  `idFuncionario` INT(11) NOT NULL,
  UNIQUE INDEX `tecnicoAdministrativo_idFuncionario_unique` (`idFuncionario`),
  INDEX `fk_tecnicoAdministrativo_funcionario` (`idFuncionario` ASC),
  CONSTRAINT `fk_tecnicoAdministrativo_funcionario`
    FOREIGN KEY (`idFuncionario`)
    REFERENCES `trabalho_engenharia`.`funcionario` (`idFuncionario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

CREATE TABLE  IF NOT EXISTS `trabalho_engenharia`.`exame` (
  `idExame` INT(11) NOT NULL,
  `DATA` DATETIME NOT NULL,
  `tipo` VARCHAR(25) NOT NULL,
  `idConsulta` INT(11) NOT NULL,
  PRIMARY KEY (`idExame`),
  INDEX `fk_exame_consulta` (`idConsulta`),
  CONSTRAINT `fk_exame_consulta` FOREIGN KEY (`idConsulta`) REFERENCES `consulta` (`idConsulta`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;
