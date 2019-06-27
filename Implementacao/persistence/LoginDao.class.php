<?php 
// ini_set('display_errors', 1);ini_set('display_startup_errors', 1);error_reporting(E_ALL);
require_once("../persistence/ConexaoDao.class.php");
require_once("../persistence/app.config.php");

class LoginDao
{
	public function getLogin($login, $senha)
	{
		$objDao = ConexaoDao::getInstance(hostDb1, userDb1, passDb1, nameDb1);
		$senha = hash('sha256', $senha);
		$query = 
		"SELECT
				usu.*,
				func.nome,
				CASE
				WHEN med.idFuncionario IS NOT NULL
					THEN 1
				WHEN enf.idFuncionario IS NOT NULL
					THEN 2
				WHEN tec.idFuncionario IS NOT NULL
					THEN 3
				WHEN serv.idFuncionario IS NOT NULL
					THEN 4 
				END tipo
			FROM usuario usu
			INNER JOIN funcionario func ON func.idFuncionario = usu.idFuncionario
			LEFT JOIN medico med ON med.idFuncionario = usu.idFuncionario
			LEFT JOIN enfermeiro enf ON enf.idFuncionario = usu.idFuncionario
			LEFT JOIN tecnicoAdministrativo tec ON tec.idFuncionario = usu.idFuncionario
			LEFT JOIN assistenteServicosGerais serv ON serv.idFuncionario = usu.idFuncionario
			WHERE login = '".$login."' AND senha = '".$senha."' AND (med.idFuncionario IS NOT NULL OR enf.idFuncionario IS NOT NULL OR tec.idFuncionario IS NOT NULL OR serv.idFuncionario IS NOT NULL);
		";
		// die("<pre>$query</pre>");
		$resultado = $objDao->consultar($query);
		return $resultado;
	}
}