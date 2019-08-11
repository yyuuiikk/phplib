<?php

namespace Strategy;

require_once 'OutputStrategyInterface.php';

class TextOutput implements \Strategy\OutputStrategyInterface
{
	public function output($text)
	{
		return $text;
	}
}
