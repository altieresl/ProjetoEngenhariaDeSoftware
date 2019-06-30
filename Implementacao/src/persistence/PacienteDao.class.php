<?php 
// ini_set('display_errors', 1);ini_set('display_startup_errors', 1);error_reporting(E_ALL);
require_once(__DIR__."/ConexaoDao.class.php");
require_once(__DIR__."/app.config.php");

class PacienteDao
{
	private $ultimoInserido;
	public function setPaciente(Paciente $paciente)
	{
		require_once(__DIR__."/../model/Paciente.class.php");
		$objDao = ConexaoDao::getInstance(hostDb1, userDb1, passDb1, nameDb1);
		if($paciente->getIdPaciente() == NULL)
		{
			$query = 
			"INSERT INTO paciente (nome, cpf, dataNascimento, endereco, idPlano)
				VALUES
					('".$paciente->getNome()."',
					'".$paciente->getCpf()."',
					'".$paciente->getDataNascimento()."',
					'".$paciente->getEndereco()."',
					".$paciente->getPlano().");
			";
		}else
		{
			$query = "UPDATE paciente
				SET nome = '".$paciente->getNome()."',
					cpf = '".$paciente->getCpf()."',
					dataNascimento = '".$paciente->getDataNascimento()."',
					endereco = '".$paciente->getEndereco()."',
					idPlano = ".$paciente->getPlano()."
				WHERE idPaciente = ".$paciente->getIdPaciente().";
				";
		}
		// die("<pre>$query</pre>");
		$resultado = $objDao->executar($query);
		$this->setUltimoInserido($objDao->getUltimoInserido());
		return $resultado;
	}

	public function getPacientes($nome = NULL, $cpf = NULL)
	{
		$objDao = ConexaoDao::getInstance(hostDb1, userDb1, passDb1, nameDb1);
		$query = 
		"SELECT
				paciente.idPaciente,
				paciente.nome,
				paciente.cpf,
				paciente.endereco,
				paciente.dataNascimento,
				paciente.idPlano,
				plano.nome nomePlano
			FROM paciente
			LEFT JOIN plano ON plano.idPlano = paciente.idPlano
		";
		if($nome != NULL or $cpf != NULL)
		{
			$query .= "WHERE ";
		}
		if($nome != NULL)
		{
			$query .= " paciente.nome LIKE '%".$nome."%' AND ";
		}
		if($cpf != NULL)
		{
			$query .= " paciente.cpf LIKE '%".$cpf."%'";
		}
		$query = trim($query, " AND ");
		// die("<pre>$query</pre>");
		$resultado = $objDao->consultar($query);
		return $resultado;
	}

	public function getInfoPaciente($idPaciente)
	{
		$objDao = ConexaoDao::getInstance(hostDb1, userDb1, passDb1, nameDb1);
		$query = 
		"SELECT
				paciente.idPaciente,
				paciente.nome,
				paciente.cpf,
				paciente.endereco,
				paciente.dataNascimento,
				paciente.idPlano,
				plano.nome nomePlano
			FROM paciente
			INNER JOIN plano ON plano.idPlano = paciente.idPlano
			WHERE paciente.idPaciente = ".$idPaciente."
		";
		// die("<pre>$query</pre>");
		$resultado = $objDao->consultar($query);
		return $resultado;
	}

	public function setDeletarPaciente($idPaciente)
	{
		$objDao = ConexaoDao::getInstance(hostDb1, userDb1, passDb1, nameDb1);//Constantes incluidas no arquivo app.config.php
		$query =
		"DELETE FROM paciente
			WHERE idPaciente = ".$idPaciente.";";
		// die("<pre>$query</pre>");
		$resultado = $objDao->multiQuery($query);
		return $resultado;
	}

    /**
     * @return mixed
     */
    public function getUltimoInserido()
    {
        return $this->ultimoInserido;
    }

    /**
     * @param mixed $ultimoInserido
     *
     * @return self
     */
    public function setUltimoInserido($ultimoInserido)
    {
        $this->ultimoInserido = $ultimoInserido;

        return $this;
    }
}
?>