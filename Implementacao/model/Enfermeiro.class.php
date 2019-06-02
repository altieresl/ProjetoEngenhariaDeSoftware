<?php
require_once("Funcionario.class.php");
class Enfermeiro extends Funcionario{
	private $ala;

	public function __construct($idFuncionario, $nome, $salario, $idDepartamento, $ala)
	{
		parent::__construct($idFuncionario, $nome, $salario, $idDepartamento);
		$this->ala = $ala;
	}

	/**
	 * Get the value of ala
	 */ 
	public function getAla()
	{
		return $this->ala;
	}

	/**
	 * Set the value of ala
	 *
	 * @return  self
	 */ 
	public function setAla($ala)
	{
		$this->ala = $ala;

		return $this;
	}

}
?>