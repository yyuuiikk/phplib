<?php

namespace Strategy;

class Hand
{
	const HANDVALUE_GUU = 0;
	const HANDVALUE_CHO = 1;
	const HANDVALUE_PAA = 2;

	public $hand_list = [];

	private $name = [
		'グー',
		'チョキ',
		'パー'
	];
	private $handvalue;

	public function __construct(int $handvalue)
	{
		$this->handvalue = $handvalue;
		$this->hand_list = [
			new Hand(self::HANDVALUE_GUU),
			new Hand(self::HANDVALUE_CHO),
			new Hand(self::HANDVALUE_PAA),
		];
	}

	public function getHand(int $handvalue)
	{
		return $this->hand_list[$handvalue];
	}

	public function isStrongerThan(Hand $h)
	{
		return $this->fight($h) === 1;
	}

	public function isWeakerThan(Hand $h)
	{
		return $this->fight($h) === -1;
	}

	private function fight(Hand $h)
	{
		if ($this === $h) {
			return 0;
		} else if (($this->handvalue + 1) % 3 === $h->handvalue) {
			return 1;
		} else {
			return -1;
		}
	}

	public function __toString()
	{
		return $this->name[$this->handvalue];
	}

}
