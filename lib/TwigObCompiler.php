<?php

namespace Mitts11\Twig;

use Twig\Compiler;

class TwigObCompiler extends Compiler
{
	private $lastLine = null;
	
	/**
	 * @inheritdoc
	 */
	public function compile(\Twig_Node $node, $indentation = 0)
	{
		$this->lastLne = null;
		return parent::compile($node, $indentation);
	}
	
	/**
	 * @inheritdoc
	 */
	public function addDebugInfo(\Twig_Node $node)
	{
		if ($node->getTemplateLine() != $this->lastLine) {
			$this->write('ob_flush();flush();\t// flush'.PHP_EOL);
			$this->lastLine = $node->getTemplateLine();
		}
		return parent::addDebugInfo($node);
	}
}