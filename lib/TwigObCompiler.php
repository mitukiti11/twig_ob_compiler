<?php

namespace Mitts11\Twig;

use Twig\Compiler;

class TwigObCompiler extends Compiler
{
	private $lastLine;
	
	public function compile(\Twig_Node $node, $indentation = 0)
	{
		mb_http_output("UTF-8");
		echo str_pad("\n ",4096), PHP_EOL;
		ob_end_flush();
		ob_start('mb_output_handler');
		
		$this->lastLine = null;
		return parent::compile($node, $indentation);
	}
	
	public function addDebugInfo(\Twig_Node $node)
	{
		if ($node->getTemplateLine() != $this->lastLine) {
			$this->write('ob_flush();'.PHP_EOL);
			$this->write('flush();'.PHP_EOL);
			$this->lastLine = $node->getTemplateLine();
		}
		return parent::addDebugInfo($node);
	}
}