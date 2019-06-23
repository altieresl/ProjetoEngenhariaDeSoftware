<?php 
// ini_set('display_errors', 1);ini_set('display_startup_errors', 1);error_reporting(E_ALL);
require_once("../persistence/ConexaoDao.class.php");//Classe de conexão com o banco
require_once("../persistence/app.config.php");//Arquivo com as constantes de conexão com banco de dados

class FuncionarioDao {
	public function __construct() {
	}

	public function setMedico(Medico $medico)//Função que cadastra ou atualiza o registro de um médico, recebe um objeto da classe Medico
	{
		require_once("../model/Medico.class.php");
		$objDao = ConexaoDao::getInstance(hostDb1, userDb1, passDb1, nameDb1);
		if($medico->getIdFuncionario() == NULL)//Se o id do funcionário é nulo significa que inseriremos um novo
		{
			$query = 
			"INSERT INTO funcionario (nome, salario, idDepartamento)
				VALUES
					('".$medico->getNome()."',
					".$medico->getSalario().",
					".$medico->getIdDepartamento().");
			INSERT INTO medico (especializacao, idFuncionario)
				VALUES
					('".$medico->getEspecializacao()."',
					LAST_INSERT_ID());
			";
		}else//Caso não seja nulo atualizamos o registro atual com o tal id do funcionário
		{
			$query = "UPDATE funcionario
				SET nome = '".$medico->getNome()."',
					salario = ".$medico->getSalario().",
					idDepartamento = ".$medico->getIdDepartamento()."
				WHERE idFuncionario = ".$medico->getIdFuncionario().";
			UPDATE medico
				SET especializacao = '".$medico->getEspecializacao()."'
				WHERE idFuncionario = ".$medico->getIdFuncionario()."
				";
		}
		$resultado = $objDao->multiQuery($query);
		return $resultado;
	}

	public function setEnfermeiro(Enfermeiro $enfermeiro)//Função que cadastra ou atualiza o registro de um enfermeiro
	{
		require_once("../model/Enfermeiro.class.php");
		$objDao = ConexaoDao::getInstance(hostDb1, userDb1, passDb1, nameDb1);
		if($enfermeiro->getIdFuncionario() == NULL)//Se o id do funcionário é nulo significa que inseriremos um novo
		{
			$query = 
			"INSERT INTO funcionario (nome, salario, idDepartamento)
				VALUES
					('".$enfermeiro->getNome()."',
					".$enfermeiro->getSalario().",
					".$enfermeiro->getIdDepartamento().");
			INSERT INTO enfermeiro (ala, idFuncionario)
				VALUES
					('".$enfermeiro->getAla()."',
					LAST_INSERT_ID());
			";
		}else//Caso não seja nulo atualizamos o registro atual com o tal id do funcionário
		{
			$query = "UPDATE funcionario
				SET nome = '".$enfermeiro->getNome()."',
					salario = ".$enfermeiro->getSalario().",
					idDepartamento = ".$enfermeiro->getIdDepartamento()."
				WHERE idFuncionario = ".$enfermeiro->getIdFuncionario().";
			UPDATE enfermeiro
				SET ala = '".$enfermeiro->getAla()."'
				WHERE idFuncionario = ".$enfermeiro->getIdFuncionario()."
				";
		}
		// die("<pre>$query</pre>");
		$resultado = $objDao->multiQuery($query);
		return $resultado;
	}
	public function setTecnicoAdministrativo(TecnicoAdministrativo $tecnicoAdministrativo)//Função que cadastra ou atualiza o registro de um técnico administrativo, recebe um objeto da classe TecnicoAdministrativo
	{
		require_once("../model/TecnicoAdministrativo.class.php");
		$objDao = ConexaoDao::getInstance(hostDb1, userDb1, passDb1, nameDb1);
		if($tecnicoAdministrativo->getIdFuncionario() == NULL)//Se o id do funcionário é nulo significa que inseriremos um novo
		{
			$query = 
			"INSERT INTO funcionario (nome, salario, idDepartamento)
				VALUES
					('".$tecnicoAdministrativo->getNome()."',
					".$tecnicoAdministrativo->getSalario().",
					".$tecnicoAdministrativo->getIdDepartamento().");
			INSERT INTO tecnicoAdministrativo (setor, idFuncionario)
				VALUES
					('".$tecnicoAdministrativo->getSetor()."',
					LAST_INSERT_ID());
			";
		}else//Caso não seja nulo atualizamos o registro atual com o tal id do funcionário
		{
			$query = "UPDATE funcionario
				SET nome = '".$tecnicoAdministrativo->getNome()."',
					salario = ".$tecnicoAdministrativo->getSalario().",
					idDepartamento = ".$tecnicoAdministrativo->getIdDepartamento()."
				WHERE idFuncionario = ".$tecnicoAdministrativo->getIdFuncionario().";
			UPDATE tecnicoAdministrativo
				SET setor = '".$tecnicoAdministrativo->getSetor()."'
				WHERE idFuncionario = ".$tecnicoAdministrativo->getIdFuncionario()."
				";
		}

		$resultado = $objDao->multiQuery($query);
		return $resultado;
	}
	public function setAssistenteServicosGerais(AssistenteServicosGerais $assistenteServicosGerais)//Função que cadastra ou atualiza o registro de um assistente de serviços gerais, recebe um objeto da classe AssistenteServicosGerais
	{
		require_once("../model/AssistenteServicosGerais.class.php");
		$objDao = ConexaoDao::getInstance(hostDb1, userDb1, passDb1, nameDb1);
		if($assistenteServicosGerais->getIdFuncionario() == NULL)//Se o id do funcionário é nulo significa que inseriremos um novo
		{
			$query = 
			"INSERT INTO funcionario (nome, salario, idDepartamento)
				VALUES
					('".$assistenteServicosGerais->getNome()."',
					".$assistenteServicosGerais->getSalario().",
					".$assistenteServicosGerais->getIdDepartamento().");
			INSERT INTO assistenteServicosGerais (funcao, idFuncionario)
				VALUES
					('".$assistenteServicosGerais->getFuncao()."',
					LAST_INSERT_ID());
			";
		}else//Caso não seja nulo atualizamos o registro atual com o tal id do funcionário
		{
			$query = "UPDATE funcionario
				SET nome = '".$assistenteServicosGerais->getNome()."',
					salario = ".$assistenteServicosGerais->getSalario().",
					idDepartamento = ".$assistenteServicosGerais->getIdDepartamento()."
				WHERE idFuncionario = ".$assistenteServicosGerais->getIdFuncionario().";
			UPDATE assistenteServicosGerais
				SET funcao = '".$assistenteServicosGerais->getFuncao()."'
				WHERE idFuncionario = ".$assistenteServicosGerais->getIdFuncionario()."
				";
		}
		$resultado = $objDao->multiQuery($query);
		return $resultado;
	}
	public function getFuncionarios($nomeFuncionario = NULL, $tipoFuncionario = NULL) //Função que retorna um funcionário e seu tipo(médico, enfermeiro e etc)
	{
		require_once("../model/AssistenteServicosGerais.class.php");
		$objDao = ConexaoDao::getInstance(hostDb1, userDb1, passDb1, nameDb1);
		$query = 
		"SELECT
				func.idFuncionario,
				func.nome nomeFuncionario,
				func.salario,
				dep.nome nomeDepartamento,
				CASE
					WHEN med.idFuncionario IS NOT NULL
						THEN 'Medico'
					WHEN enf.idFuncionario IS NOT NULL
						THEN 'Enfermeiro'
					WHEN tec.idFuncionario IS NOT NULL
						THEN 'Técnico Administrativo'
					WHEN assist.idFuncionario IS NOT NULL
						THEN 'Assistente de Serviços Gerais'
				END tipoFuncionario,
				CASE
					WHEN med.idFuncionario IS NOT NULL
						THEN 1
					WHEN enf.idFuncionario IS NOT NULL
						THEN 2
					WHEN tec.idFuncionario IS NOT NULL
						THEN 3
					WHEN assist.idFuncionario IS NOT NULL
						THEN 4
				END codTipoFuncionario
			FROM funcionario func
			INNER JOIN departamento dep ON dep.idDepartamento = func.idDepartamento
			LEFT JOIN medico med ON med.idFuncionario = func.idFuncionario
			LEFT JOIN enfermeiro enf ON enf.idFuncionario = func.idFuncionario
			LEFT JOIN tecnicoAdministrativo tec ON tec.idFuncionario = func.idFuncionario
			LEFT JOIN assistenteServicosGerais assist ON assist.idFuncionario = func.idFuncionario
			WHERE (med.idFuncionario IS NOT NULL OR enf.idFuncionario IS NOT NULL OR tec.idFuncionario IS NOT NULL OR assist.idFuncionario IS NOT NULL)
		";
		if($nomeFuncionario != NULL)
		{
			$query .= "	AND func.nome LIKE '%".$nomeFuncionario."%' ";
		}
		if($tipoFuncionario != NULL and $tipoFuncionario != -1)//Caso o tipo de funcionário já tenha sido passado, busca especificamente pelo tal tipo
		{
			$queryTemp = "";
			switch ($tipoFuncionario)
			{
				case 1:
					$queryTemp = " AND med.idFuncionario IS NOT NULL ";
					break;
				case 2:
					$queryTemp = " AND enf.idFuncionario IS NOT NULL ";
					break;
				case 3:
					$queryTemp = " AND tec.idFuncionario IS NOT NULL ";
					break;
				case 4:
					$queryTemp = " AND assist.idFuncionario IS NOT NULL ";
					break;
			}
			$query .= $queryTemp;
		}
		// die("<pre>$query</pre>");
		$resultado = $objDao->consultar($query);
		return $resultado;
	}
	public function getInfoFuncionario($codFuncionario, $tipoFuncionario)//Busca por um funcionário especifico pelo seu código
	{
		require_once("../model/AssistenteServicosGerais.class.php");
		$objDao = ConexaoDao::getInstance(hostDb1, userDb1, passDb1, nameDb1);
		$query = 
		"SELECT
				func.idFuncionario,
				func.nome nomeFuncionario,
				func.salario,
				func.idDepartamento,
				CASE
					WHEN med.idFuncionario IS NOT NULL
						THEN 1
					WHEN enf.idFuncionario IS NOT NULL
						THEN 2
					WHEN tec.idFuncionario IS NOT NULL
						THEN 3
					WHEN assist.idFuncionario IS NOT NULL
						THEN 4
				END tipoFuncionario,
				med.especializacao especializacao_medico,
				enf.ala ala_enfermeiro,
				tec.setor setor_tecnico,
				assist.funcao funcao_assistente
			FROM funcionario func
			LEFT JOIN medico med ON med.idFuncionario = func.idFuncionario
			LEFT JOIN enfermeiro enf ON enf.idFuncionario = func.idFuncionario
			LEFT JOIN tecnicoAdministrativo tec ON tec.idFuncionario = func.idFuncionario
			LEFT JOIN assistenteServicosGerais assist ON assist.idFuncionario = func.idFuncionario
			WHERE (med.idFuncionario IS NOT NULL OR enf.idFuncionario IS NOT NULL OR tec.idFuncionario IS NOT NULL OR assist.idFuncionario IS NOT NULL)
				AND func.idFuncionario = ".$codFuncionario." ";
		if($tipoFuncionario != NULL)//Caso o tipo de funcionário já tenha sido passado, busca especificamente pelo tal tipo
		{
			$queryTemp = "";
			switch ($tipoFuncionario)
			{
				case 1:
					$queryTemp = " AND med.idFuncionario IS NOT NULL ";
					break;
				case 2:
					$queryTemp = " AND enf.idFuncionario IS NOT NULL ";
					break;
				case 3:
					$queryTemp = " AND tec.idFuncionario IS NOT NULL ";
					break;
				case 4:
					$queryTemp = " AND assist.idFuncionario IS NOT NULL ";
					break;
			}
			$query .= $queryTemp;
		}
		$query .= " LIMIT 1;";
		// die("<pre>$query</pre>");
		$resultado = $objDao->consultar($query);
		return $resultado;
	}

	public function setDeletarFuncionario($codFuncionario)//Deleta um funcionário
	{
		require_once("../model/AssistenteServicosGerais.class.php");
		$objDao = ConexaoDao::getInstance(hostDb1, userDb1, passDb1, nameDb1);
		$query =
		"DELETE FROM funcionario
			WHERE idFuncionario = ".$codFuncionario;
		// die("<pre>$query</pre>");
		$resultado = $objDao->executar($query);
		return $resultado;
	}
}
?>
