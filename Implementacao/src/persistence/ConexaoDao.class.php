 <?php
// ini_set('display_errors', 1);ini_set('display_startup_errors', 1);error_reporting(E_ALL);
class ConexaoDao
{
	private static $instance;
	private $obj;
	private function __construct($host, $user, $pass, $db)
	{
		$this->obj = mysqli_connect($host, $user, $pass, $db) or die("Erro ao conectar ao banco de dados.");
		$this->obj->set_charset("utf8");
	}

	public static function getInstance($host, $user, $pass, $db)
	{
		if (self::$instance == NULL)
		{
			self::$instance = new self($host, $user, $pass, $db);
		}
		return self::$instance;
	}

	public function consultar($query)
	{
		$ret = $this->obj->query($query);	
		if($this->obj->error != "")
			throw new Exception("Erro na query (".$this->obj->error.").");
		return $ret;
	}

	public function executar($query)
	{
		$ret = $this->obj->query($query);
		if($this->obj->error != "")
			throw new Exception("Erro na query (".$this->obj->error.").");
		return $ret;
	}

	public function getUltimoInserido()
	{
		return $this->obj->insert_id;
	}

	public function multiQuery($query)
	{
		$ret = $this->obj->multi_query($query);
		while ($this->obj->more_results() and $this->obj->next_result()){}
		if($this->obj->error != "")
			throw new Exception("Erro na query (".$this->obj->error.").");
		return $ret;
		
	}

	public function fecharConexao()
	{
		$this->obj->close();
	}
	public function __destruct()
	{
		$this->fecharConexao();
	}
}
?>