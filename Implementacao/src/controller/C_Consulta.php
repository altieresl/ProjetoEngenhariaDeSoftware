<?php
// ini_set('display_errors', 1);ini_set('display_startup_errors', 1);error_reporting(E_ALL);
require_once("../persistence/ConsultaDao.class.php");
require_once("utility/TratamentoCaracteres.class.php");

TratamentoCaracteres::limparStringsRequests();

switch ($_REQUEST["acao"])
{
	case 'setConsulta':
		require_once("../model/Consulta.class.php");
		$objConsulta = new Consulta($_POST['idConsulta'], $_POST["idMedico"], $_POST["idPaciente"], $_POST["idClinica"], $_POST["data"]);
		$objConsultaDao = new ConsultaDao();
		try {
			$retorno = $objConsultaDao->setConsulta($objConsulta);
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
		$objConsultaDao = new ConsultaDao();
		$retorno = $objConsultaDao->getConsultas($_GET["idMedico"], $_GET["idPaciente"], $_GET["dataInicial"], $_GET["dataFinal"]);
		$arrConsultas = array();
		while($consulta = $retorno->fetch_object())
		{
			$arrConsultas[] = $consulta;
		}
		print json_encode($arrConsultas);
		break;
	case 'getInfoConsulta':
		$objConsulta = new ConsultaDao();
		$retorno = $objConsulta->getInfoConsulta($_GET["idConsulta"]);
		$consulta = $retorno->fetch_object();
		print json_encode($consulta);
		break;
	case 'deletar':
		$objConsulta = new ConsultaDao();
		$retorno = $objConsulta->setDeletarConsulta($_POST["idConsulta"]);
		if($retorno)
		{
			$resultado->status = true;
			$resultado->mensagem = "Operação realizada com sucesso.";
		}
		print json_encode($resultado);
		break;
}
?>