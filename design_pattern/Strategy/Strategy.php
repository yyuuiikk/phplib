<?php


namespace Strategy;


interface Strategy
{
	public function nextHand();
	public function study(bool $win);
}
