<?php 
// ini_set('display_errors', 1);ini_set('display_startup_errors', 1);error_reporting(E_ALL);
require_once("../persistence/ConexaoDao.class.php");
require_once("../persistence/app.config.php");

class DepartamentoDao
{
	public function __construct()
	{

	}

	public function setDepartamento(Departamento $departamento)
	{
		require_once("../model/Departamento.class.php");
		$objDao = ConexaoDao::getInstance(hostDb1, userDb1, passDb1, nameDb1);
		if($departamento->getIdDepartamento() == NULL)
		{
			$query = 
			"INSERT INTO departamento (nome, idClinica)
				VALUES
					('".$departamento->getNome()."',
					".$departamento->getIdClinica().");
			";
		}else
		{
			$query = "UPDATE departamento
				SET nome = '".$departamento->getNome()."',
					idClinica = '".$departamento->getIdClinica()."'
				WHERE idDepartamento = ".$departamento->getIdDepartamento().";
				";
		}
		// die("<pre>$query</pre>");
		$resultado = $objDao->multiQuery($query);
		return $resultado;
	}


	public function getDepartamentos($nomeDepartamento = "")
	{
		$objDao = ConexaoDao::getInstance(hostDb1, userDb1, passDb1, nameDb1);
		$query = 
		"SELECT
				dep.idDepartamento,
				dep.nome,
				cli.nome nomeClinica
			FROM departamento dep
			INNER JOIN clinica cli ON cli.idClinica = dep.idClinica
			WHERE dep.nome LIKE '%".$nomeDepartamento."%';
		";
		$resultado = $objDao->consultar($query);
		return $resultado;
	}

	public function getInfoDepartamento($idDepartamento)
	{
		$objDao = ConexaoDao::getInstance(hostDb1, userDb1, passDb1, nameDb1);
		$query = 
		"SELECT
				dep.nome,
				dep.idClinica
			FROM departamento dep
			WHERE dep.idDepartamento = ".$idDepartamento.";";
		// die("<pre>$query</pre>");
		$resultado = $objDao->consultar($query);
		return $resultado;
	}

	public function setDeletarDepartamento($idDepartamento)
	{
		$objDao = ConexaoDao::getInstance(hostDb1, userDb1, passDb1, nameDb1);//Constantes incluidas no arquivo app.config.php
		$query =
		"DELETE FROM departamento
			WHERE idDepartamento = ".$idDepartamento.";";
		// die("<pre>$query</pre>");
		$resultado = $objDao->multiQuery($query);
		return $resultado;
	}
}
?>
