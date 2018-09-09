<?php

namespace StandardTest;

use PHPUnit\Framework\TestCase;

/**
 * Class StandardTest
 * @package CollectionTest
 */
class StandardTest extends TestCase
{
	/**
	 * @test
	 */
	public function dummy()
	{
		$this->assertEquals(1, 1);
	}
}