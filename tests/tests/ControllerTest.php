<?php

/** @file
 * @brief Empty unit testing template
 * @cond 
 * @brief Unit tests for the class 
 */
require __DIR__ . "/../../vendor/autoload.php";
class ControllerTest extends \PHPUnit_Framework_TestCase
{
    const SEED = 1422668587;
	public function test_construct() {
		$Steampunked = new Steampunked\Steampunked(self::SEED);
		$controller = new Steampunked\Controller($Steampunked, array());

		$this->assertInstanceOf('Steampunked\Controller', $controller);
		$this->assertFalse($controller->isReset());
		$this->assertEquals('game.php', $controller->getPage());
	}
	public function test_new() {
		$Steampunked = new Steampunked\Steampunked(self::SEED);
		$controller = new Steampunked\Controller($Steampunked, array('n' => ''));

		$this->assertInstanceOf('Steampunked\Controller', $controller);
		$this->assertTrue($controller->isReset());
		$this->assertEquals('game.php', $controller->getPage());
	}
	public function test_move() {
		$Steampunked = new Steampunked\Steampunked(self::SEED);
		$controller = new Steampunked\Controller($Steampunked, array('n' => ''));

		$this->assertFalse($controller->isReset());
		$this->assertEquals('game.php', $controller->getPage());

		$this->assertEquals(11, $$Steampunked->getCurrent()->getNdx());
	}
	public function test_post() {
		$Steampunked = new Steampunked\Steampunked(self::SEED);
		$controller = new Steampunked\Controller($Steampunked, array('n' => ''));

		$this->assertTrue($controller->isReset());
		$this->assertEquals('win.php', $controller->getPage());
	}
}

/// @endcond
?>
