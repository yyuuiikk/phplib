<?php

namespace Strategy;

require_once 'OutputStrategyInterface.php';

class HtmlOutput implements \Strategy\OutputStrategyInterface
{
	public function output($text)
	{
		return '<div>' . htmlspecialchars($text, ENT_QUOTES, 'UTF-8') . '</div>';
	}
}
