<?php
require_once("../persistence/ConexaoDao.class.php");
require_once("../persistence/app.config.php");
class ClinicaDao
{
	function getClinicas()
	{
		$objDao = ConexaoDao::getInstance(hostDb1, userDb1, passDb1, nameDb1);
		$query = 
		"SELECT
				idClinica,
				cnpj,
				nome
			FROM clinica";
		// die("<pre>$query</pre>");
		$resultado = $objDao->consultar($query);
		return $resultado;
	}
}
?>