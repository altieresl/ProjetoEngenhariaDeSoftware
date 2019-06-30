<?php
require_once("../persistence/ConexaoDao.class.php");
require_once("../persistence/app.config.php");
class MedicoDao
{
	function getMedicos()
	{
		$objDao = ConexaoDao::getInstance(hostDb1, userDb1, passDb1, nameDb1);
		$query = 
		"SELECT
				func.idFuncionario,
				func.nome
			FROM medico
			INNER JOIN funcionario func ON func.idFuncionario = medico.idFuncionario;";
		// die("<pre>$query</pre>");
		$resultado = $objDao->consultar($query);
		return $resultado;
	}
}
?>