<?php

/** @file
 * @brief Empty unit testing template
 * @cond 
 * @brief Unit tests for the class 
 */
require __DIR__ . "/../../vendor/autoload.php";

class ViewTest extends \PHPUnit_Framework_TestCase
{
	public function test_construct()
	{
		$steampunked = new Steampunked\Steampunked();
		$view = new Steampunked\View($steampunked);

		$this->assertInstanceOf('Steampunked\View', $view);
	}

	public function test_gridPresent()
	{
		$steampunked = new Steampunked\Steampunked();
		$steampunked->createGame(6, "Anthony", "Santoro");
		$view = new Steampunked\View($steampunked);
		$rows = $view->getSize(); // 6x6 grid
		$columns = $view->getSize(); // 6x6 grid
		$html = $view->createGrid();

		$this->assertContains('<p><img src="images/title.png"></p>', $html); // beginning of view
		$this->assertContains('<div class="row">', $html);
		$this->assertContains('<div class="cell">', $html);
		$this->assertEquals(6, $rows); //match 6x6 grid
		$this->assertEquals(6, $columns); //match 6x6 grid
	}

	public function test_buttonsPresent()
	{
		$steampunked = new Steampunked\Steampunked();
		$steampunked->createGame(6, "Anthony", "Santoro");
		$view = new Steampunked\View($steampunked);
		$html = $view->createOptionButtons();
		$num_radio = $view->createRadioButtons();

		$this->assertContains('<p class="option"><input type="button" name="rotate" value="Rotate"></p>', $html);
		$this->assertContains('<p class="option"><input type="button" name="discard" value="Discard"></p>', $html);
		$this->assertContains('<p class="option"><input type="button" name="open" value="Open Valve"></p>', $html);
		$this->assertContains('<p class="option"><input type="button" name="giveup" value="Give Up"></p>', $html);
		$this->assertContains('radio5', $num_radio); //assert 5 radio buttons present

	}

	public function test_PlayersPresent()
	{
		$steampunked = new Steampunked\Steampunked();
		$steampunked->createGame(6, "Anthony", "Santoro");
		$view = new Steampunked\View($steampunked);
		$name1 = $view->player1name();
		$name2 = $view->player2name();


		$this->assertContains('Anthony', $name1);
		$this->assertContains('Santoro', $name2);
		$this->assertNotContains('Wrong Player', $name1);
		$this->assertNotContains('Wrong Player', $name2);

	}


	public function test_StartbuttonsPresent()
	{
		$steampunked = new Steampunked\Steampunked();
		$view = new Steampunked\View($steampunked);
		$html = $view->startScreenButtons();
		$num_radio = $view->createRadioButtons();

		$this->assertContains('<input type="radio" name="gamesize" id="6" value="6">', $html); //6x6
		$this->assertContains('<input type="radio" name="gamesize" id="10" value="10">', $html);//10x10
		$this->assertContains('<input type="radio" name="gamesize" id="20" value="20">', $html);//20x20
		$this->assertContains('radio', $num_radio); //assert 5 radio buttons present
		$this->assertContains('<input type="text" name="player1" id="player1">', $html); // player 1
		$this->assertContains('<input type="text" name="player2" id="player2">', $html); // player 2

	}
}

/// @endcond
?>
