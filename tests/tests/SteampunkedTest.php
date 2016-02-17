<?php

/** @file
 * @brief Empty unit testing template
 * @cond 
 * @brief Unit tests for the class 
 */
require __DIR__ . "/../../vendor/autoload.php";

class ModelTest extends \PHPUnit_Framework_TestCase
{
	public function test_construct() {
		$game = new \Steampunked\Steampunked();
        $this->assertInstanceOf('Steampunked\Steampunked', $game);
        $game = new \Steampunked\Steampunked(1234);
        $this->assertInstanceOf('Steampunked\Steampunked', $game);
	}

    public function test_size() {
        $game = new \Steampunked\Steampunked();
        $player0 = new \Steampunked\Player('Tom');
        $player1 = new \Steampunked\Player('Mary');
        $this->assertEquals(0, $game->getSize());
        $game->createGame(6, $player0, $player1);
        $this->assertEquals(6, $game->getSize());
        $game->createGame(20, $player0, $player1);
        $this->assertEquals(20, $game->getSize());
    }

    public function test_getPlayer() {
        $game = new \Steampunked\Steampunked();
        $player0 = new \Steampunked\Player('Tom');
        $player1 = new \Steampunked\Player('Mary');
        $game->createGame(6, $player0, $player1);
        $this->assertEquals(null, $game->getPlayer(-1));
        $this->assertEquals($player0, $game->getPlayer(0));
        $this->assertEquals(null, $game->getPlayer(2));
        $game->createGame(6, $player0, $player1);
        $this->assertEquals($player1, $game->getPlayer(1));
    }

    public function test_turn() {
        $game = new \Steampunked\Steampunked();
        $player0 = new \Steampunked\Player('Tom');
        $player1 = new \Steampunked\Player('Mary');
        $game->createGame(6, $player0, $player1);
        $this->assertEquals(0, $game->getTurn());
        $game->nextTurn();
        $this->assertEquals(1, $game->getTurn());
        $game->nextTurn();
        $this->assertEquals(0, $game->getTurn());
    }
}

/// @endcond
?>
