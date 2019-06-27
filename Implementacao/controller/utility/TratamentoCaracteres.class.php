<?php
class TratamentoCaracteres
{
	public static function limparStringsRequests()
	{
		foreach ($_REQUEST as $key => $string)
		{
			$_REQUEST[$key] = self::limpaString($string);
		}
		foreach ($_GET as $key => $string)
		{
			$_GET[$key] = self::limpaString($string);
		}
		foreach ($_POST as $key => $string)
		{
			$_POST[$key] = self::limpaString($string);
		}
	}

	public static function limpaString($string)
	{
		return preg_replace('/([\'])|([\"])/', "", strip_tags($string));
	}

	public static function getHash($string)
	{
		return hash("sha256",$string);
	}
}
?>