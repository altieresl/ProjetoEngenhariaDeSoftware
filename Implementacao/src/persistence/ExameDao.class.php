<?php 
// ini_set('display_errors', 1);ini_set('display_startup_errors', 1);error_reporting(E_ALL);
require_once("../persistence/ConexaoDao.class.php");
require_once("../persistence/app.config.php");

class ExameDao
{
	public function __construct()
	{
	}

	public function setExame(Exame $exame)
	{
		require_once("../model/Exame.class.php");
		$objDao = ConexaoDao::getInstance(hostDb1, userDb1, passDb1, nameDb1);
		if($exame->getIdExame() == NULL)
		{
			$query = 
			"INSERT INTO exame (data, tipo, idConsulta, diagnostico)
				VALUES
					('".$exame->getData()."',
					'".$exame->getTipo()."',
					".$exame->getIdConsulta().",
					'".$exame->getDiagnostico()."');
			";
		}else
		{
			$query = "UPDATE exame
				SET data = '".$exame->getData()."',
					tipo = '".$exame->getTipo()."',
					idConsulta = ".$exame->getIdConsulta().",
					diagnostico = '".$exame->getDiagnostico()."'
				WHERE idExame = ".$exame->getIdExame().";
				";
		}
		// die("<pre>$query</pre>");
		$resultado = $objDao->multiQuery($query);
		return $resultado;
	}

	public function getExames($tipo = NULL, $dataInicial = NULL, $dataFinal = NULL, $idConsulta = NULL)
	{
		$objDao = ConexaoDao::getInstance(hostDb1, userDb1, passDb1, nameDb1);//Constantes incluidas no arquivo app.config.php
		$query = 
		"SELECT
				exa.idExame,
				exa.data,
				exa.tipo,
				func.nome nomeMedico,
				pac.nome nomePaciente,
				exa.idConsulta,
				con.data dataConsulta
			FROM exame exa
			INNER JOIN consulta con ON con.idConsulta = exa.idConsulta
			INNER JOIN funcionario func ON func.idFuncionario = con.idMedico
			INNER JOIN paciente pac ON pac.idPaciente = con.idPaciente
		";
		if($tipo != NULL or $dataInicial != NULL or $dataFinal != NULL or $idConsulta != NULL)
		{
			$query .= "WHERE ";
		}
		if($tipo != NULL)
		{
			$query .= "	exa.tipo LIKE '".$tipo."' AND ";
		}

		if($dataInicial != NULL and $dataFinal != NULL)
		{
			$query .= "exa.data BETWEEN '".$dataInicial."' AND '".$dataFinal."' AND ";
		}

		if($idConsulta != NULL)
		{
			$query .= "	exa.idConsulta = ".$idConsulta." AND ";
		}

		$query = trim($query, " AND ");
		
		// die("<pre>$query</pre>");
		$resultado = $objDao->consultar($query);
		return $resultado;
	}

	public function getInfoExame($idExame)
	{
		$objDao = ConexaoDao::getInstance(hostDb1, userDb1, passDb1, nameDb1);//Constantes incluidas no arquivo app.config.php
		$query = 
		"SELECT
				exa.idExame,
				exa.data,
				exa.tipo,
				func.nome nomeMedico,
				pac.nome nomePaciente,
				exa.idConsulta,
				con.data dataConsulta,
				exa.diagnostico
			FROM exame exa
			INNER JOIN consulta con ON con.idConsulta = exa.idConsulta
			INNER JOIN funcionario func ON func.idFuncionario = con.idMedico
			INNER JOIN paciente pac ON pac.idPaciente = con.idPaciente
			WHERE exa.idExame = ".$idExame.";";
		
		// die("<pre>$query</pre>");
		$resultado = $objDao->consultar($query);
		// var_dump($resultado);
		return $resultado;
	}

	public function setDeletarExame($idExame)
	{
		$objDao = ConexaoDao::getInstance(hostDb1, userDb1, passDb1, nameDb1);//Constantes incluidas no arquivo app.config.php
		$query =
		"DELETE FROM exame
			WHERE idExame = ".$idExame.";";
		// die("<pre>$query</pre>");
		$resultado = $objDao->multiQuery($query);
		return $resultado;
	}
}
?>