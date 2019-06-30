<?php
class Consulta
{
	private $idConsulta;
	private $idMedico;
	private $idPaciente;
	private $idClinica;
	private $data;

	public function __construct($idConsulta, $idMedico, $idPaciente, $idClinica, $data)
	{
		$this->idConsulta = $idConsulta;
		$this->idMedico = $idMedico;
		$this->idPaciente = $idPaciente;
		$this->idClinica = $idClinica;
		$this->data = $data;
	}

    /**
     * @return mixed
     */
    public function getIdConsulta()
    {
        return $this->idConsulta;
    }

    /**
     * @return mixed
     */
    public function getIdMedico()
    {
        return $this->idMedico;
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
    public function getIdClinica()
    {
        return $this->idClinica;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $idConsulta
     *
     * @return self
     */
    public function setIdConsulta($idConsulta)
    {
        $this->idConsulta = $idConsulta;

        return $this;
    }

    /**
     * @param mixed $idMedico
     *
     * @return self
     */
    public function setIdMedico($idMedico)
    {
        $this->idMedico = $idMedico;

        return $this;
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
     * @param mixed $idClinica
     *
     * @return self
     */
    public function setIdClinica($idClinica)
    {
        $this->idClinica = $idClinica;

        return $this;
    }

    /**
     * @param mixed $data
     *
     * @return self
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }
}
?>