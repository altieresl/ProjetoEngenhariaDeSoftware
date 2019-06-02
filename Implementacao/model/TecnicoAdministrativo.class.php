<?php
require_once("Funcionario.class.php");
class TecnicoAdministrativo extends Funcionario{
	private $setor;

	public function __construct($idFuncionario, $nome, $salario, $idDepartamento, $setor)
	{
		parent::__construct($idFuncionario, $nome, $salario, $idDepartamento);
		$this->setor = $setor;
	}

	/**
	 * Get the value of setor
	 */ 
	public function getSetor()
	{
		return $this->setor;
	}

	/**
	 * Set the value of setor
	 *
	 * @return  self
	 */ 
	public function setSetor($setor)
	{
		$this->setor = $setor;

		return $this;
	}

}
?>