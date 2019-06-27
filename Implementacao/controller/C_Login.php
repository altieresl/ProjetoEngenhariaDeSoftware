<?php
// ini_set('display_errors', 1);ini_set('display_startup_errors', 1);error_reporting(E_ALL);
require_once("../persistence/LoginDao.class.php");
require_once("utility/TratamentoCaracteres.class.php");

TratamentoCaracteres::limparStringsRequests();

switch ($_REQUEST["acao"])
{
	case 'logar':
		$objLogin = new LoginDao();
		$retorno = $objLogin->getLogin($_POST["login"], $_POST["senha"]);
		$usuario = $retorno->fetch_object();
		$resultado = new StdClass();
		if($usuario != NULL)
		{
			session_start();
			$_SESSION["usuario"] = $usuario->login;
			$_SESSION["nome"] = $usuario->nome;
			$_SESSION["tipo"] = $usuario->tipo;
			$resultado->mensagem = "Login efetuado com sucesso.";
			$resultado->status = true;
		}else
		{
			$resultado->mensagem = "Erro ao efetuar login.";
			$resultado->status = false;
		}
		print json_encode($resultado);
		break;
}
?>