<?php
namespace app\Aritmetica;
use PHPUnit\Framework\TestCase;
class SomaTest extends TestCase
{
	public function testSomaDoisNumeros()
	{
		$soma = new Soma();
		$soma->setNum1(10);
		$soma->setNum2(20);
		$this->assertEquals(30, $soma->somar());
	}
}
?>