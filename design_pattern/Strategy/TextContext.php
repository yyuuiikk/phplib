<?php


namespace Strategy;

require_once 'OutputStrategyInterface.php';


class TextContext
{
	private $output;

	public function setOutputStrategy(\Strategy\OutputStrategyInterface $output)
	{
		$this->output = $output;
	}

	public function render($text)
	{
		echo $this->output->output($text);
	}
}
