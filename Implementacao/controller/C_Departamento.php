<?php 
// ini_set('display_errors', 1);ini_set('display_startup_errors', 1);error_reporting(E_ALL);
require_once("../persistence/DepartamentoDao.class.php");
require_once("utility/TratamentoCaracteres.class.php");

TratamentoCaracteres::limparStringsRequests();

switch ($_REQUEST["acao"]) {
	case 'getDepartamentos':
		$objDepartamentoDao = new DepartamentoDao();
		$retorno = $objDepartamentoDao->getDepartamentos();
		$departamentos = [];
		while($departamento = $retorno->fetch_object())
		{
			$departamento->nome = utf8_encode($departamento->nome);
			$departamentos[] = $departamento;
		}
		print json_encode($departamentos);
		break;
}
?>