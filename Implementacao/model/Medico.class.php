<?php
require_once("Funcionario.class.php");
class Medico extends Funcionario{
	private $especializacao;

	public function __construct($idFuncionario = NULL, $nome, $salario, $idDepartamento, $especializacao)
	{
		parent::__construct($idFuncionario, $nome, $salario, $idDepartamento);
		$this->especializacao = $especializacao;
	}

	/**
	 * Get the value of especializacao
	 */ 
	public function getEspecializacao()
	{
		return $this->especializacao;
	}

	/**
	 * Set the value of especializacao
	 *
	 * @return  self
	 */ 
	public function setEspecializacao($especializacao)
	{
		$this->especializacao = $especializacao;

		return $this;
	}

}
?>