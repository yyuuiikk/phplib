<?php

// zipファイル名
$zip_file = '';
// 圧縮ファイル名
$comp_file = '';

$zip = new ZipArchive();
$res = $zip->open($zip_file, ZipArchive::CREATE);
if ($res === true) {
	$zip->addFile($comp_file);
	$zip->close();
}
