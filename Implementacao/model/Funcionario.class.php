<?php
class Funcionario {
	private $idFuncionario;
	private $nome;
	private $salario;
	private $idDepartamento;

	public function __construct($idFuncionario, $nome, $salario, $idDepartamento)
	{
		$this->idFuncionario = $idFuncionario;
		$this->nome = $nome;
		$this->salario = $salario;
		$this->idDepartamento = $idDepartamento;
	}

	/**
	 * Get the value of idFuncionario
	 */ 
	public function getIdFuncionario()
	{
		return $this->idFuncionario;
	}

	/**
	 * Set the value of idFuncionario
	 *
	 * @return  self
	 */ 
	public function setIdFuncionario($idFuncionario)
	{
		$this->idFuncionario = $idFuncionario;

		return $this;
	}

	/**
	 * Get the value of nome
	 */ 
	public function getNome()
	{
		return $this->nome;
	}

	/**
	 * Set the value of nome
	 *
	 * @return  self
	 */ 
	public function setNome($nome)
	{
		$this->nome = $nome;

		return $this;
	}

	/**
	 * Get the value of salario
	 */ 
	public function getSalario()
	{
		return $this->salario;
	}

	/**
	 * Set the value of salario
	 *
	 * @return  self
	 */ 
	public function setSalario($salario)
	{
		$this->salario = $salario;

		return $this;
	}

	/**
	 * Get the value of idDepartamento
	 */ 
	public function getIdDepartamento()
	{
		return $this->idDepartamento;
	}

	/**
	 * Set the value of idDepartamento
	 *
	 * @return  self
	 */ 
	public function setIdDepartamento($idDepartamento)
	{
		$this->idDepartamento = $idDepartamento;

		return $this;
	}
}
?>