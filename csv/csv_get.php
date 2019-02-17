<?php

// ローカル上のファイル名を定義
$csv = '';

// SJISのCSVファイルをUTF-8変換
file_put_contents($csv, mb_convert_encoding(file_get_contents($csv), 'UTF-8', 'SJIS'));

// CSVファイルの内容を取得
$file = new SplFileObject($csv, 'r');
$file->setFlags(SplFileObject::READ_CSV);
$header = [];
foreach ($file as $row) {
	// 最終行をスキップ
	if ($row === null) continue;
	// ヘッダーを取得
	if (empty($header)) {
		$header = $row;
		continue;
	}

	// csvヘッダーをキーにして値を格納
	$item[] = array_combine($header, $row);
}
