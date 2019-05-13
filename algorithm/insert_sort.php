<?php

function insert_sort(array $a)
{
	$len = count($a);
	for ($i = 1; $i < $len; $i++) {
		$v = $a[$i];
		$j = $i - 1;
		while ($j >= 0 && $a[$j] > $v) {
			$a[$j+1] = $a[$j];
			$j--;
		}
		$a[$j+1] = $v;
	}

	return $a;
}

$a = [5, 1, 3, 2];
insert_sort($a);