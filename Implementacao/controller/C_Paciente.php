<?php
// ini_set('display_errors', 1);ini_set('display_startup_errors', 1);error_reporting(E_ALL);
require_once("../persistence/PacienteDao.class.php");
require_once("utility/TratamentoCaracteres.class.php");

TratamentoCaracteres::limparStringsRequests();

switch ($_REQUEST["acao"])
{
	case 'setPaciente':
		require_once("../model/Paciente.class.php");
		$objPaciente = new Paciente($_POST['idPaciente'], $_POST["nome"], $_POST["dataNascimento"], $_POST["endereco"], $_POST["cpf"], $_POST["plano"]);
		$objPacienteDao = new PacienteDao();
		try {
			$retorno = $objPacienteDao->setPaciente($objPaciente);
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
		$objPaciente = new PacienteDao();
		$retorno = $objPaciente->getPacientes($_GET["nome"], $_GET["cpf"]);
		$arrPacientes = array();
		while($paciente = $retorno->fetch_object())
		{
			$arrPacientes[] = $paciente;
		}
		print json_encode($arrPacientes);
		break;
	case 'getInfoPaciente':
		$objPacienteDao = new PacienteDao();
		$retorno = $objPacienteDao->getInfoPaciente($_GET["idPaciente"]);
		$paciente = $retorno->fetch_object();
		print json_encode($paciente);
		break;
	case 'deletar':
		$objPacienteDao = new PacienteDao();
		$retorno = $objPacienteDao->setDeletarPaciente($_POST["idPaciente"]);
		if($retorno)
		{
			$resultado->status = true;
			$resultado->mensagem = "Operação realizada com sucesso.";
		}
		print json_encode($resultado);
		break;
}
?>
