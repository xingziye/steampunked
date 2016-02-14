<?php

/** @file
 * @brief Empty unit testing template
 * @cond 
 * @brief Unit tests for the class 
 */
require __DIR__ . "/../../vendor/autoload.php";

class ViewTest extends \PHPUnit_Framework_TestCase
{
	public function test_construct() {
		$steampunked = new Steampunked\Steampunked();
		$view = new Steampunked\View($steampunked);

		$this->assertInstanceOf('Steampunked\View', $view);
	}
}

/// @endcond
?>
