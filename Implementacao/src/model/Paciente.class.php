<?php
class Paciente
{
	private $idPaciente;
	private $nome;
	private $cpf;
	private $dataNascimento;
	private $endereco;
	private $plano;

	public function __construct($idPaciente, $nome, $dataNascimento, $endereco, $cpf, $plano)
	{
        $this->idPaciente = $idPaciente;
		$this->nome = $nome;
		$this->cpf = $cpf;
		$this->dataNascimento = $dataNascimento;
		$this->endereco = $endereco;
		$this->plano = $plano;
	}
    
    /**
     * @return mixed
     */
    public function getIdPaciente()
    {
        return $this->idPaciente;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @return mixed
     */
    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    /**
     * @return mixed
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @return mixed
     */
    public function getPlano()
    {
        return $this->plano;
    }

    /**
     * @param mixed $idPaciente
     *
     * @return self
     */
    public function setIdPaciente($idPaciente)
    {
        $this->idPaciente = $idPaciente;

        return $this;
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
     * @param mixed $dataNascimento
     *
     * @return self
     */
    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;

        return $this;
    }

    /**
     * @param mixed $endereco
     *
     * @return self
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;

        return $this;
    }

    /**
     * @param mixed $cpf
     *
     * @return self
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * @param mixed $plano
     *
     * @return self
     */
    public function setPlano($plano)
    {
        $this->plano = $plano;

        return $this;
    }
}
?>