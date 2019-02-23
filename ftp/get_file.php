<?php

// FTPサーバ等の定義
$ftp_server = 'example.com';
$ftp_user = 'hoge';
$ftp_pass = 'hoge';
$ftp_target_dir = '/data/';

// FTP接続を行う
$connect_id = ftp_connect($ftp_server);
if (!ftp_login( $connect_id, $ftp_user, $ftp_pass)) {
	ftp_close( $connect_id );
	exit;
}
// パッシブモードをONにする
ftp_pasv($connect_id, true);
// フォルダ移動
if (ftp_chdir($connect_id, $ftp_target_dir)) {
	if ($ftp_file_list = ftp_nlist($connect_id , ".")) {
		foreach ($ftp_file_list as $ftp_file) {
			if (fnmatch('hoge*.csv', $ftp_file)) {
				// ファイル取得
				ftp_get($connect_id , '/home/hoge/log/' . "${ftp_file}", $ftp_file , FTP_BINARY);
			}
		}
	}
} else {
	ftp_close($connect_id);
	exit;
}
ftp_close($connect_id);