<?php
// ini_set('display_errors', 1);ini_set('display_startup_errors', 1);error_reporting(E_ALL);
require_once("app.config.php");
require_once("ConexaoDao.class.php");
class PlanosDao
{
	public static function getPlanos()
	{
		$objDao = ConexaoDao::getInstance(hostDb1, userDb1, passDb1, nameDb1);
		$sql = "
		SELECT
				*
			FROM plano";
		// die("<pre>$sql</pre>");
		$ret = $objDao->consultar($sql);
		$objDao->fecharConexao();
		return $ret;
	}
}
?>