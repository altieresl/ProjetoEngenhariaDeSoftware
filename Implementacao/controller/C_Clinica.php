<?php
// ini_set('display_errors', 1);ini_set('display_startup_errors', 1);error_reporting(E_ALL);
require_once("../persistence/ClinicaDao.class.php");
require_once("utility/TratamentoCaracteres.class.php");

TratamentoCaracteres::limparStringsRequests();

switch ($_REQUEST["acao"])
{
	case 'consultar':
		$objClinica = new ClinicaDao();
		$retorno = $objClinica->getClinicas();
		$arrClinicas = array();
		while($clinica = $retorno->fetch_object())
		{
			$arrClinicas[] = $clinica;
		}
		print json_encode($arrClinicas);
		break;
}
?>