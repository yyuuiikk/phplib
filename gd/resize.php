<?php

const TARGET_PATH =  '';

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

// 画像の保存先を指定
$target_folder = TARGET_PATH;
// フォルダ以下のファイルを取得
$file_list = glob($target_folder . '/*');

foreach ($file_list as $item) {
	$paths = explode('/', $item);
	$last = count($paths) - 1;
	$filenames = explode('.', $paths[$last]);
	if (!file_exists($target_folder . '/resize/')) mkdir($target_folder . '/resize/', 0700);
	// 出力後のファイル名を定義
	$out_file = $target_folder . '/resize/' . $filenames[0] . '_half.jpg';

	// 変換処理
	resizeHalfImage($item, $out_file, 60);
}
