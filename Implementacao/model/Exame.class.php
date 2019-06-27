<?php
class Exame
{
	private $idExame;
	private $tipo;
	private $data;
	private $idConsulta;

	public function __construct($idExame, $tipo, $data, $idConsulta)
	{
		$this->idExame = $idExame;
		$this->tipo = $tipo;
		$this->data = $data;
		$this->idConsulta = $idConsulta;
	}

    /**
     * @return mixed
     */
    public function getIdExame()
    {
        return $this->idExame;
    }

    /**
     * @param mixed $idExame
     *
     * @return self
     */
    public function setIdExame($idExame)
    {
        $this->idExame = $idExame;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     *
     * @return self
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
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

    /**
     * @return mixed
     */
    public function getIdConsulta()
    {
        return $this->idConsulta;
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
}
?>