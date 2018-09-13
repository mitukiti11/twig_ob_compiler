<?php

namespace Mitts11\Twig;

use Twig\Compiler;

class TwigObCompiler extends Compiler
{
	private $lastLine;
	
	/**
	 * @inheritdoc
	 */
	public function compile(\Twig_Node $node, $indentation = 0)
	{
		mb_http_output($this->getEnvironment()->getCharset());
		echo str_pad("\n ",4096), PHP_EOL;
		ob_end_flush();
		ob_start('mb_output_handler');
		
		$this->lastLne = null;
		$result = parent::compile($node, $indentation);
		
		ob_flush();
		flush();
		
		return $result;
	}
	
	/**
	 * @inheritdoc
	 */
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