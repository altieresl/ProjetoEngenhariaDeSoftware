<?php 
ini_set('display_errors', 1);ini_set('display_startup_errors', 1);error_reporting(E_ALL);
require_once("../persistence/FuncionarioDao.class.php");
switch ($_REQUEST["acao"]) {
	case 'setFuncionario':
		$retorno = false;
		switch ($_POST["tipoFuncionario"])//Para cada tipo de funcionário a ação é diferente
		{
			case '1':
				require_once("../model/Medico.class.php");
				$objMedico = new Medico($_POST['idFuncionario'], $_POST["nome"], $_POST["salario"], $_POST["idDepartamento"], $_POST["especializacao"]);
				$objFuncionarioDao = new FuncionarioDao();
				try {
					$retorno = $objFuncionarioDao->setMedico($objMedico);
					$resultado = new StdClass();
				} catch (Exception $e) {
					$resultado = new StdClass();
					$resultado->status = false;
					$resultado->mensagem = "Erro ao realizar operação.";
				}
				break;
			case '2':
				require_once("../model/Enfermeiro.class.php");
				$objEnfermeiro = new Enfermeiro($_POST['idFuncionario'], $_POST["nome"], $_POST["salario"], $_POST["idDepartamento"], $_POST["ala"]);
				$objFuncionarioDao = new FuncionarioDao();
				try {
					$retorno = $objFuncionarioDao->setEnfermeiro($objEnfermeiro);
					$resultado = new StdClass();
				} catch (Exception $e) {
					$resultado = new StdClass();
					$resultado->status = false;
					$resultado->mensagem = "Erro ao realizar operação.";
				}
				break;
			case '3':
				require_once("../model/TecnicoAdministrativo.class.php");
				$objTecnicoAdministrativo = new TecnicoAdministrativo($_POST['idFuncionario'], $_POST["nome"], $_POST["salario"], $_POST["idDepartamento"], $_POST["setor"]);
				$objFuncionarioDao = new FuncionarioDao();
				try {
					$retorno = $objFuncionarioDao->setTecnicoAdministrativo($objTecnicoAdministrativo);
					$resultado = new StdClass();
				} catch (Exception $e) {
					$resultado = new StdClass();
					$resultado->status = false;
					$resultado->mensagem = "Erro ao realizar operação.";
				}
				break;
			case '4':
				require_once("../model/AssistenteServicosGerais.class.php");
				$objAssistenteServicosGerais = new AssistenteServicosGerais($_POST['idFuncionario'], $_POST["nome"], $_POST["salario"], $_POST["idDepartamento"], $_POST["funcao"]);
				$objFuncionarioDao = new FuncionarioDao();
				try {
					$retorno = $objFuncionarioDao->setAssistenteServicosGerais($objAssistenteServicosGerais);
					$resultado = new StdClass();

				} catch (Exception $e) {
					$resultado = new StdClass();
					$resultado->status = false;
					$resultado->mensagem = "Erro ao realizar operação.";
				}
				break;
		}
		if($retorno)
		{
			$resultado->status = true;
			$resultado->mensagem = "Operação realizada com sucesso.";
		}else
		{
			$resultado->status = false;
			$resultado->mensagem = "Erro ao realizar operação.";
		}
		print json_encode($resultado);
		break;
	case 'consultar':
		$objFuncionarioDao = new FuncionarioDao();
		$retorno = $objFuncionarioDao->getFuncionarios($_GET["nomeFuncionario"], $_GET["tipoFuncionario"]);
		$arrFuncionarios = array();
		while($funcionario = $retorno->fetch_object())
		{
			$funcionario->nomeFuncionario = $funcionario->nomeFuncionario;
			$funcionario->nomeDepartamento = utf8_encode($funcionario->nomeDepartamento);
			$arrFuncionarios[] = $funcionario;
		}
		print json_encode($arrFuncionarios);
		break;
	case 'getInfoFuncionario':
		$objFuncionarioDao = new FuncionarioDao();
		$retorno = $objFuncionarioDao->getInfoFuncionario($_GET["idFuncionario"], $_GET["tipoFuncionario"]);
		$arrFuncionarios = array();
		$funcionario = $retorno->fetch_object();
		$funcionario->nomeFuncionario = $funcionario->nomeFuncionario;
		print json_encode($funcionario);
		break;
	case 'deletar':
		$objFuncionarioDao = new FuncionarioDao();
		$retorno = $objFuncionarioDao->setDeletarFuncionario($_POST["idFuncionario"]);
		if($retorno)
		{
			$resultado->status = true;
			$resultado->mensagem = "Operação realizada com sucesso.";
		}else
		{
			$resultado->status = false;
			$resultado->mensagem = "Erro ao realizar operação.";
		}
		print json_encode($resultado);
		break;
}
?>