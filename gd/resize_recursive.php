<?php

const TARGET_PATH = [
];

/**
 * 画像を半分のサイズにリサイズする
 *
 * @param $in_file
 * @param $out_file
 * @param $quality
 */
function resizeHalfImage($in_file, $out_file, $quality)
{
	// 元画像の縦横を取得
	list($w, $h) = getimagesize($in_file);
	// サムネイルサイズ（オリジナルの半分を指定）
	$thumb_h = $h / 2;
	$thumb_w = $w / 2;

	// 空のイメージを新規作成
	$thumbnail = imagecreatetruecolor($thumb_w, $thumb_h);
	// 元画像を読み込む
	$base_image = imagecreatefromjpeg($in_file);
	// 空のイメージに指定したサイズで元画像をコピーペーストする
	imagecopyresampled($thumbnail, $base_image, 0, 0, 0, 0, $thumb_w, $thumb_h, $w, $h);
	// 圧縮率を指定して出力
	imagejpeg($thumbnail, $out_file, $quality);
}

/**
 * 対象のフォルダ以下のファイルリストをフルパスで返す
 *
 * @param string $target_folder
 * @return array
 */
function getFileList($target_folder)
{
	$list = [];
	$files = scandir($target_folder, SCANDIR_SORT_ASCENDING);
	foreach ($files as $file) {
		// ドットファイルはスキップする
		if (preg_match('/^\.+/', $file)) continue;

		$fullpath = rtrim($target_folder, '/') . '/' . $file;
		if (is_file($fullpath)) {
			$list[] = $fullpath;
		}
		if (is_dir($fullpath)) {
			$list = array_merge($list, getFileList($fullpath));
		}
	}

	return $list;
}

$target_folder = TARGET_PATH;
$file_list = [];
// 画像の一覧を取得
foreach ($target_folder as $folder) {
	if (empty($file_list)) {
		$file_list = getFileList($folder);
	} else {
		$tmp = getFileList($folder);
		$file_list = array_merge($file_list, $tmp);
	}
}

foreach ($file_list as $item) {
	$paths = explode('/', $item);
	$last = count($paths) - 1;
	$filename = preg_replace('/\.jpg$/i', '', $paths[$last]);

	// 重複チェック
	// リサイズ後のファイルかどうかチェック
	$search1 = strpos($filename, '_half');
	if ($search1 !== false) continue;

	$check = true;
	foreach ($file_list as $value) {
		// リサイズ済みのファイルかどうかチェック
		$search2 = strpos($value, $filename . '_half.jpg');
		if ($search2 !== false) {
			$check = false;
			break;
		}
	}

	if ($check) {
		// 出力後のファイル名を定義
		$formated = preg_replace('/\.jpg$/i', '', $item);
		$out_file = $formated . '_half.jpg';
		// 変換処理
		resizeHalfImage($item, $out_file, 60);
	}
}
