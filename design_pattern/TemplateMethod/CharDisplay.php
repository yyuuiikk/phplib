<?php

namespace TemplateMethod;

require_once 'AbstractDisplay.php';

class CharDisplay extends AbstractDisplay
{
	private $ch;

	public function __construct($ch)
	{
		$this->ch = $ch;
	}

	public function open()
	{
		echo '<<' . PHP_EOL;
	}

	public function print()
	{
		echo $this->ch . PHP_EOL;
	}

	public function close()
	{
		echo '>>' . PHP_EOL;
	}
}
