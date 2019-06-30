<?php
use PHPUnit\Framework\TestCase;
class PacienteTest extends TestCase
{
	public function testModelPaciente()
	{
		include_once(__DIR__ ."/../../src/model/Paciente.class.php");
		$nome = "Monica Almeida";
		$dataNascimento = "10/05/1992";
		$endereco = "Rua 1";
		$cpf = "19339483723";
		$idPlano = 3;
		$objPaciente = new Paciente(null, $nome, $dataNascimento, $endereco, $cpf, $idPlano);
		$this->assertEquals($objPaciente->getIdPaciente(), null);
		$this->assertEquals($objPaciente->getNome(), $nome);
		$this->assertEquals($objPaciente->getDataNascimento(), $dataNascimento);
		$this->assertEquals($objPaciente->getEndereco(), $endereco);
		$this->assertEquals($objPaciente->getCpf(), $cpf);
		$this->assertEquals($objPaciente->getPlano(), $idPlano);
	}

	public function testPacienteDaoCadastrar()
	{
		include_once(__DIR__ ."/../../src/model/Paciente.class.php");
		include_once(__DIR__ ."/../../src/persistence/PacienteDao.class.php");
		$nome = "Monica Almeida";
		$dataNascimento = "1992-05-10";
		$endereco = "Rua 1";
		$cpf = "19339483723";
		$idPlano = 3;
		$objPaciente = new Paciente(null, $nome, $dataNascimento, $endereco, $cpf, $idPlano);
		$objPacienteDao = new PacienteDao();
		$retornoInsercao = $objPacienteDao->setPaciente($objPaciente);
		$ultimoInserido = $objPacienteDao->getUltimoInserido();

		$retornoPesquisa = $objPacienteDao->getInfoPaciente($ultimoInserido);
		$pacientePesquisado = $retornoPesquisa->fetch_object();
		$this->assertEquals($pacientePesquisado->nome, $nome);
		$this->assertEquals($pacientePesquisado->dataNascimento, $dataNascimento);
		$this->assertEquals($pacientePesquisado->endereco, $endereco);
		$this->assertEquals($pacientePesquisado->idPlano, $idPlano);
		
		$objPacienteDao->setDeletarPaciente($ultimoInserido);
	}

	public function testPacienteDaoAtualizar()
	{
		include_once(__DIR__ ."/../../src/model/Paciente.class.php");
		include_once(__DIR__ ."/../../src/persistence/PacienteDao.class.php");
		$idPaciente = 19;
		$nome = "Wagner Amaral 2";
		$dataNascimento = "1990-01-01";
		$endereco = "Rua Assis de Oliveira, 123";
		$cpf = "12345612345";
		$idPlano = 2;
		$objPaciente = new Paciente($idPaciente, $nome, $dataNascimento, $endereco, $cpf, $idPlano);
		$objPacienteDao = new PacienteDao();
		$retornoInsercao = $objPacienteDao->setPaciente($objPaciente);

		$retornoPesquisa = $objPacienteDao->getInfoPaciente($idPaciente);
		$pacientePesquisado = $retornoPesquisa->fetch_object();
		$this->assertEquals($pacientePesquisado->nome, $nome);
		$this->assertEquals($pacientePesquisado->dataNascimento, $dataNascimento);
		$this->assertEquals($pacientePesquisado->endereco, $endereco);
		$this->assertEquals($pacientePesquisado->idPlano, $idPlano);
	}

	public function testPacienteDaoApagar()
	{
		include_once(__DIR__ ."/../../src/model/Paciente.class.php");
		include_once(__DIR__ ."/../../src/persistence/PacienteDao.class.php");
		// Cadastra um paciente
		$nome = "Vera Menezes";
		$dataNascimento = "1982-07-23";
		$endereco = "Rua Dom Pedro 1, 293";
		$cpf = "98739274348";
		$idPlano = 1;
		$objPaciente = new Paciente(null, $nome, $dataNascimento, $endereco, $cpf, $idPlano);
		$objPacienteDao = new PacienteDao();
		$retornoInsercao = $objPacienteDao->setPaciente($objPaciente);
		$ultimoInserido = $objPacienteDao->getUltimoInserido();
		
		// Apaga um paciente
		$objPacienteDao->setDeletarPaciente($ultimoInserido);

		$retornoPesquisa = $objPacienteDao->getInfoPaciente($ultimoInserido);
		$pacientePesquisado = $retornoPesquisa->fetch_object();
		$this->assertEquals($pacientePesquisado, NULL);
	}
}
?>