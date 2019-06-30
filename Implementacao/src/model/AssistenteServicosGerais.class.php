<?php
require_once("Funcionario.class.php");
class AssistenteServicosGerais extends Funcionario{
	private $funcao;

	public function __construct($idFuncionario, $nome, $salario, $idDepartamento, $funcao)
	{
		parent::__construct($idFuncionario, $nome, $salario, $idDepartamento);
		$this->funcao = $funcao;
	}

	/**
	 * Get the value of funcao
	 */ 
	public function getFuncao()
	{
		return $this->funcao;
	}

	/**
	 * Set the value of funcao
	 *
	 * @return  self
	 */ 
	public function setFuncao($funcao)
	{
		$this->funcao = $funcao;

		return $this;
	}

}
?>