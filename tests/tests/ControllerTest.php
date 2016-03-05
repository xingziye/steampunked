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

	//Test Controller construction
	public function test_construct() {
		$steampunked = new \Steampunked\Steampunked(self::SEED);
		$controller = new \Steampunked\Controller($steampunked, array());

		//Test if Controller class constructs without error
		$this->assertInstanceOf('\Steampunked\Controller', $controller);
		$this->assertEquals('game.php', $controller->getPage());

		//test addPiece post
		$steampunked = new \Steampunked\Steampunked(self::SEED);
		$controller = new \Steampunked\Controller($steampunked, array('leak'=>''));

		$this->assertInstanceOf('\Steampunked\Controller', $controller);
		$this->assertEquals('game.php', $controller->getPage());
		$this->assertFalse($controller->isReset());

		//test rotatePiece post
		$steampunked = new \Steampunked\Steampunked(self::SEED);
		$controller = new \Steampunked\Controller($steampunked, array('rotate'=>'Rotate'));

		$this->assertInstanceOf('\Steampunked\Controller', $controller);
		$this->assertEquals('game.php', $controller->getPage());
		$this->assertFalse($controller->isReset());

		//test discardPiece post
		$steampunked = new \Steampunked\Steampunked(self::SEED);
		$controller = new \Steampunked\Controller($steampunked, array('discard'=>'Discard'));

		$this->assertInstanceOf('\Steampunked\Controller', $controller);
		$this->assertEquals('game.php', $controller->getPage());
		$this->assertFalse($controller->isReset());

		//test giveUp post
		$steampunked = new \Steampunked\Steampunked(self::SEED);
		$controller = new \Steampunked\Controller($steampunked, array('giveup'=>'Give Up'));

		$this->assertInstanceOf('\Steampunked\Controller', $controller);
		$this->assertEquals('game.php', $controller->getPage());
		//test newgame post
		$steampunked = new \Steampunked\Steampunked(self::SEED);
		$controller = new \Steampunked\Controller($steampunked, array('newgame'=>'New Game'));

		$this->assertInstanceOf('\Steampunked\Controller', $controller);
		$this->assertEquals('index.php', $controller->getPage());
	}
}

/// @endcond
?>
