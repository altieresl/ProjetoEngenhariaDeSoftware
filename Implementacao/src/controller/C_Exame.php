<?php
// ini_set('display_errors', 1);ini_set('display_startup_errors', 1);error_reporting(E_ALL);
require_once("../persistence/ExameDao.class.php");
require_once("utility/TratamentoCaracteres.class.php");

TratamentoCaracteres::limparStringsRequests();

switch ($_REQUEST["acao"])
{
	case 'setExame':
		require_once("../model/Exame.class.php");
		$objExame = new Exame($_POST['idExame'], $_POST["tipo"], $_POST["data"], $_POST["idConsulta"], $_POST["diagnostico"]);
		$objExameDao = new ExameDao();
		try {
			$retorno = $objExameDao->setExame($objExame);
			$resultado = new StdClass();
		} catch (Exception $e){
			$resultado = new StdClass();
			$resultado->status = false;
			$resultado->mensagem = "Erro ao realizar operação.";
		}
		if($retorno)
		{
			$resultado->status = true;
			$resultado->mensagem = "Operação realizada com sucesso.";
		}
		print json_encode($resultado);
		break;
	case 'consultar':
		$objExameDao = new ExameDao();
		$retorno = $objExameDao->getExames($_GET["tipo"], $_GET["dataInicial"], $_GET["dataFinal"], $_GET["idConsulta"]);
		$arrConsultas = array();
		while($paciente = $retorno->fetch_object())
		{
			$arrConsultas[] = $paciente;
		}
		print json_encode($arrConsultas);
		break;
	case 'getInfoExame':
		$objExameDao = new ExameDao();
		$retorno = $objExameDao->getInfoExame($_GET["idExame"]);
		$exame = $retorno->fetch_object();
		print json_encode($exame);
		break;
	case 'deletar':
		$objExameDao = new ExameDao();
		$retorno = $objExameDao->setDeletarExame($_POST["idExame"]);
		if($retorno)
		{
			$resultado->status = true;
			$resultado->mensagem = "Operação realizada com sucesso.";
		}
		print json_encode($resultado);
		break;
}
?>