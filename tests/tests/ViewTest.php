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
		$view = new Steampunked\View($steampunked);
		$rows = $view->numRows(); // 6x6 grid
		$columns = $view->numCols(); // 6x6 grid
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
		$view = new Steampunked\View($steampunked);
		$html = $view->createButtons();
		$num_radio = $view->radioButtons();

		$this->assertContains('<p class="option"><input type="button" name="rotate" value="Rotate"></p>', $html);
		$this->assertContains('<p class="option"><input type="button" name="discard" value="Discard"></p>', $html);
		$this->assertContains('<p class="option"><input type="button" name="open" value="Open Valve"></p>', $html);
		$this->assertContains('<p class="option"><input type="button" name="giveup" value="Give Up"></p>', $html);
		$this->assertContains('<input type="radio"', $html); ///assert that radio buttons exist
		$this->assertEquals(5, $num_radio); //assert 5 radio buttons present

	}
}

/// @endcond
?>
