<?php 
// ini_set('display_errors', 1);ini_set('display_startup_errors', 1);error_reporting(E_ALL);
require_once(__DIR__."/ConexaoDao.class.php");
require_once(__DIR__."/app.config.php");

class ConsultaDao
{
	private $ultimoInserido;
	public function __construct()
	{
	}

	public function setConsulta(Consulta $consulta)
	{
		require_once(__DIR__."/../model/Consulta.class.php");
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
			$query = "UPDATE consulta
				SET idMedico = ".$consulta->getIdMedico().",
					idPaciente = ".$consulta->getIdPaciente().",
					idClinica = ".$consulta->getIdClinica().",
					data = '".$consulta->getData()."'
				WHERE idConsulta = ".$consulta->getIdConsulta().";
				";
		}
		// die("<pre>$query</pre>");
		$resultado = $objDao->multiQuery($query);
		$this->setUltimoInserido($objDao->getUltimoInserido());
		return $resultado;
	}

	public function getConsultas($idMedico = NULL, $idPaciente = NULL, $dataInicial = NULL, $dataFinal = NULL)
	{
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

	public function getInfoConsulta($idConsulta)
	{
		$objDao = ConexaoDao::getInstance(hostDb1, userDb1, passDb1, nameDb1);
		$query = 
		"SELECT
				consulta.idConsulta,
				consulta.idMedico,
				consulta.idPaciente,
				consulta.idClinica,
				consulta.data
			FROM consulta consulta
			WHERE consulta.idConsulta = ".$idConsulta.";";
		// die("<pre>$query</pre>");
		$resultado = $objDao->consultar($query);
		return $resultado;
	}

	public function setDeletarConsulta($idConsulta)
	{
		$objDao = ConexaoDao::getInstance(hostDb1, userDb1, passDb1, nameDb1);//Constantes incluidas no arquivo app.config.php
		$query =
		"DELETE FROM consulta
			WHERE idConsulta = ".$idConsulta.";";
		// die("<pre>$query</pre>");
		$resultado = $objDao->multiQuery($query);
		return $resultado;
	}

    /**
     * @return mixed
     */
    public function getUltimoInserido()
    {
        return $this->ultimoInserido;
    }

    /**
     * @param mixed $ultimoInserido
     *
     * @return self
     */
    public function setUltimoInserido($ultimoInserido)
    {
        $this->ultimoInserido = $ultimoInserido;

        return $this;
    }
}
?>