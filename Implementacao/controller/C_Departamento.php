<?php 
// ini_set('display_errors', 1);ini_set('display_startup_errors', 1);error_reporting(E_ALL);
require_once("../persistence/DepartamentoDao.class.php");
require_once("utility/TratamentoCaracteres.class.php");

TratamentoCaracteres::limparStringsRequests();

switch ($_REQUEST["acao"])
{
	case 'setDepartamento':
		require_once("../model/Departamento.class.php");
		$objDepartamento = new Departamento($_POST['idDepartamento'], $_POST["nome"], $_POST["idClinica"]);
		$objDepartamentoDao = new DepartamentoDao();
		try {
			$retorno = $objDepartamentoDao->setDepartamento($objDepartamento);
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
	case 'getDepartamentos':
		$objDepartamentoDao = new DepartamentoDao();
		$retorno = $objDepartamentoDao->getDepartamentos();
		$departamentos = [];
		while($departamento = $retorno->fetch_object())
		{
			$departamento->nome = $departamento->nome;
			$departamentos[] = $departamento;
		}
		print json_encode($departamentos);
		break;
	case 'consultar':
		$objDepartamento = new DepartamentoDao();
		$retorno = $objDepartamento->getDepartamentos($_GET["nome"]);
		$arrDepartamentos = array();
		while($paciente = $retorno->fetch_object())
		{
			$arrDepartamentos[] = $paciente;
		}
		print json_encode($arrDepartamentos);
		break;
	case 'getInfoDepartamento':
		$objDepartamento = new DepartamentoDao();
		$retorno = $objDepartamento->getInfoDepartamento($_GET["idDepartamento"]);
		$departamento = $retorno->fetch_object();
		// $departamento->nome = utf8_decode($departamento->nome);
		print json_encode($departamento);
		break;
	case 'deletar':
		$objDepartamento = new DepartamentoDao();
		$retorno = $objDepartamento->setDeletarDepartamento($_POST["idDepartamento"]);
		if($retorno)
		{
			$resultado->status = true;
			$resultado->mensagem = "Operação realizada com sucesso.";
		}
		print json_encode($resultado);
		break;
}
?>