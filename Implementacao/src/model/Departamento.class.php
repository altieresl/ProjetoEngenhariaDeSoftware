<?php
class Departamento
{
    private $idDepartamento;
	private $nome;
    private $idClinica;

	public function __construct($idDepartamento, $nome, $idClinica)
	{
		$this->idDepartamento = $idDepartamento;
		$this->nome = $nome;
        $this->idClinica = $idClinica;
	}

    /**
     * @return mixed
     */
    public function getIdDepartamento()
    {
        return $this->idDepartamento;
    }

    /**
     * @param mixed $idDepartamento
     *
     * @return self
     */
    public function setIdDepartamento($idDepartamento)
    {
        $this->idDepartamento = $idDepartamento;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     *
     * @return self
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdClinica()
    {
        return $this->idClinica;
    }

    /**
     * @param mixed $idClinica
     *
     * @return self
     */
    public function setIdClinica($idClinica)
    {
        $this->idClinica = $idClinica;

        return $this;
    }
}
?>