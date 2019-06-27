<?php 
// ini_set('display_errors', 1);ini_set('display_startup_errors', 1);error_reporting(E_ALL);
require_once("../persistence/ConexaoDao.class.php");
require_once("../persistence/app.config.php");

class ConsultaDao
{
	public function __construct()
	{
	}

	public function setConsulta(Consulta $consulta)
	{
		require_once("../model/Consulta.class.php");
		$objDao = ConexaoDao::getInstance(hostDb1, userDb1, passDb1, nameDb1);
		if($consulta->getIdConsulta() == NULL)
		{
			$query = 
			"INSERT INTO consulta (idMedico, idPaciente, idClinica, data)
				VALUES
					(".$consulta->getIdMedico().",
					".$consulta->getIdPaciente().",
					".$consulta->getIdClinica().",
					'".$consulta->getData()."');
			";
		}else
		{
			$query = "UPDATE paciente
				SET idMedico = ".$consulta->getIdMedico().",
					idPaciente = ".$consulta->getIdPaciente().",
					idClinica = ".$consulta->getIdClinica().",
					data = '".$consulta->getData()."'
				WHERE idConsulta = ".$consulta->getIdConsulta().";
				";
		}
		// die("<pre>$query</pre>");
		$resultado = $objDao->multiQuery($query);
		return $resultado;
	}

	public function getConsultas($idMedico = NULL, $idPaciente = NULL, $dataInicial = NULL, $dataFinal = NULL)
	{
		require_once("../model/AssistenteServicosGerais.class.php");
		$objDao = ConexaoDao::getInstance(hostDb1, userDb1, passDb1, nameDb1);
		$query = 
		"SELECT
				consulta.idConsulta,
				funcionario.nome nomeMedico,
				paciente.nome nomePaciente,
				clinica.nome nomeClinica,
				consulta.data
			FROM consulta consulta
			INNER JOIN funcionario ON funcionario.idFuncionario = consulta.idMedico
			INNER JOIN medico ON medico.idFuncionario = funcionario.idFuncionario
			INNER JOIN paciente ON paciente.idPaciente = consulta.idPaciente
			INNER JOIN clinica ON clinica.idClinica = consulta.idClinica
		";
		if($idMedico != NULL or $idPaciente != NULL or ($dataInicial != NULL and $dataFinal != NULL))
		{
			$query .= "WHERE ";
			if($idMedico != NULL)
				$query .= " funcionario.idFuncionario = ".$idMedico." AND ";
			if($idPaciente != NULL)
				$query .= " paciente.idPaciente = ".$idPaciente." AND ";
			if($dataInicial != NULL and $dataFinal != NULL)
				$query .= " consulta.data BETWEEN '".$dataInicial."' AND '".$dataFinal."' ";
			$query = trim($query, " AND ");
		}
		// die("<pre>$query</pre>");
		$resultado = $objDao->consultar($query);
		return $resultado;
	}
}
?>