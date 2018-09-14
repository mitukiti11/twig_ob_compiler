<?php

namespace StandardTest;

use Mitts11\Twig\TwigObCompiler;
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
		$compiler = new TwigObCompiler(new \Twig_Environment($this->getMockBuilder('Twig_LoaderInterface')->getMock()));
		
		$locale = setlocale(LC_NUMERIC, 0);
		if (false === $locale) {
			$this->markTestSkipped('Your platform does not support locales.');
		}
		
		$required_locales = array('fr_FR.UTF-8', 'fr_FR.UTF8', 'fr_FR.utf-8', 'fr_FR.utf8', 'French_France.1252');
		if (false === setlocale(LC_NUMERIC, $required_locales)) {
			$this->markTestSkipped('Could not set any of required locales: '.implode(', ', $required_locales));
		}
		
		$this->assertEquals('1.2', $compiler->repr(1.2)->getSource());
		$this->assertContains('fr', strtolower(setlocale(LC_NUMERIC, 0)));
		
		setlocale(LC_NUMERIC, $locale);
	}
	
	/**
	 * @test
	 * @runInSeparateProcess
	 * @expectedException        \Twig_Error_Syntax
	 * @expectedExceptionMessage Value for argument "from" is required for filter "replace" at line 1.
	 */
	public function compile () {
		
		$compiler = new TwigObCompiler(new \Twig_Environment($this->getMockBuilder('Twig_LoaderInterface')->getMock()));
		$value = new \Twig_Node_Expression_Constant(0, 1);
		$node = $this->createFilter($value, 'replace', array(
			'to' => new \Twig_Node_Expression_Constant('foo', 1),
		));
		$compiler->compile($node);
		
		$this->assertEquals('0', ob_get_level());
	}
	
	protected function createFilter($node, $name, array $arguments = array())
	{
		$name = new \Twig_Node_Expression_Constant($name, 1);
		$arguments = new \Twig_Node($arguments);
		
		return new \Twig_Node_Expression_Filter($node, $name, $arguments, 1);
	}
}