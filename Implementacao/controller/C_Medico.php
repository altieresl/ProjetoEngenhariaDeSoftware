<?php
// ini_set('display_errors', 1);ini_set('display_startup_errors', 1);error_reporting(E_ALL);
require_once("../persistence/MedicoDao.class.php");
require_once("utility/TratamentoCaracteres.class.php");

TratamentoCaracteres::limparStringsRequests();

switch ($_REQUEST["acao"])
{
	case 'consultar':
		$objMedico = new MedicoDao();
		$retorno = $objMedico->getMedicos();
		$arrMedicos = array();
		while($medico = $retorno->fetch_object())
		{
			$arrMedicos[] = $medico;
		}
		print json_encode($arrMedicos);
		break;
}
?>