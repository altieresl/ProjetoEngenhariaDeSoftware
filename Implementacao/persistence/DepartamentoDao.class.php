<?php 
// ini_set('display_errors', 1);ini_set('display_startup_errors', 1);error_reporting(E_ALL);
require_once("../persistence/ConexaoDao.class.php");
require_once("../persistence/app.config.php");

class DepartamentoDao {
	public function __construct() {

	}
	public function getDepartamentos()
	{
		require_once("../model/AssistenteServicosGerais.class.php");
		$objDao = new ConexaoDao(hostDb1, userDb1, passDb1, nameDb1);
		$query = 
		"SELECT
				dep.idDepartamento,
				dep.nome
			FROM departamento dep;
		";
		$resultado = $objDao->consultar($query);
		return $resultado;
	}
}
?>
