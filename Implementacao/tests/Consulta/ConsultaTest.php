<?php
use PHPUnit\Framework\TestCase;
class ConsultaTest extends TestCase
{
	public function testModelConsulta()
	{
		include_once(__DIR__ ."/../../src/model/Consulta.class.php");
		$idMedico = 29;
		$idPaciente = 19;
		$idClinica = 1;
		$data = "2019-06-25";
		$objConsulta = new Consulta(null, $idMedico, $idPaciente, $idClinica, $data);
		$this->assertEquals($objConsulta->getIdConsulta(), null);
		$this->assertEquals($objConsulta->getIdMedico(), $idMedico);
		$this->assertEquals($objConsulta->getIdPaciente(), $idPaciente);
		$this->assertEquals($objConsulta->getIdClinica(), $idClinica);
		$this->assertEquals($objConsulta->getData(), $data);
	}

	public function testConsultaDaoCadastrar()
	{
		include_once(__DIR__ ."/../../src/model/Consulta.class.php");
		include_once(__DIR__ ."/../../src/persistence/ConsultaDao.class.php");
		$idMedico = 29;
		$idPaciente = 19;
		$idClinica = 1;
		$data = "2019-06-25 15:00:00";
		$objConsulta = new Consulta(null, $idMedico, $idPaciente, $idClinica, $data);
		$objConsultaDao = new ConsultaDao();
		$retornoInsercao = $objConsultaDao->setConsulta($objConsulta);
		$ultimoInserido = $objConsultaDao->getUltimoInserido();

		$retornoPesquisa = $objConsultaDao->getInfoConsulta($ultimoInserido);
		$consultaPesquisada = $retornoPesquisa->fetch_object();
		$this->assertEquals($consultaPesquisada->idMedico, $idMedico);
		$this->assertEquals($consultaPesquisada->idPaciente, $idPaciente);
		$this->assertEquals($consultaPesquisada->idClinica, $idClinica);
		$this->assertEquals($consultaPesquisada->data, $data);
		
		$objConsultaDao->setDeletarConsulta($ultimoInserido);
	}

	public function testConsultaDaoAtualizar()
	{
		include_once(__DIR__ ."/../../src/model/Consulta.class.php");
		include_once(__DIR__ ."/../../src/persistence/ConsultaDao.class.php");
		$idConsulta = 8;
		$idMedico = 51;
		$idPaciente = 19;
		$idClinica = 1;
		$data = "2019-06-20 15:00:00";
		$objConsulta = new Consulta($idConsulta, $idMedico, $idPaciente, $idClinica, $data);
		$objConsultaDao = new ConsultaDao();
		$retornoInsercao = $objConsultaDao->setConsulta($objConsulta);

		$retornoPesquisa = $objConsultaDao->getInfoConsulta($idConsulta);
		$consultaPesquisada = $retornoPesquisa->fetch_object();
		$this->assertEquals($consultaPesquisada->idMedico, $idMedico);
		$this->assertEquals($consultaPesquisada->idPaciente, $idPaciente);
		$this->assertEquals($consultaPesquisada->idClinica, $idClinica);
		$this->assertEquals($consultaPesquisada->data, $data);
	}

	public function testConsultaDaoApagar()
	{
		include_once(__DIR__ ."/../../src/model/Consulta.class.php");
		include_once(__DIR__ ."/../../src/persistence/ConsultaDao.class.php");
		// Cadastra uma consulta
		$idMedico = 74;
		$idPaciente = 21;
		$idClinica = 1;
		$data = "2019-06-16 12:30:00";
		$objConsulta = new Consulta(null, $idMedico, $idPaciente, $idClinica, $data);
		$objConsultaDao = new ConsultaDao();
		$retornoInsercao = $objConsultaDao->setConsulta($objConsulta);
		$ultimoInserido = $objConsultaDao->getUltimoInserido();

		// Apaga a consulta
		$objConsultaDao->setDeletarConsulta($ultimoInserido);

		$retornoPesquisa = $objConsultaDao->getInfoConsulta($ultimoInserido);
		$consultaPesquisada = $retornoPesquisa->fetch_object();
		$this->assertEquals($consultaPesquisada, null);
	}
}
?>