<?php
const SOL = "b07152d234b79075b9640";
$domainPath = 'public_html';

function connect() {
    static $link;
    if (empty($link)) {
        $link = mysqli_connect('localhost', 'root', '', 'gbphp');
    }
    return $link;
}

function clearStr($str) {
    return mysqli_real_escape_string(connect(), strip_tags(trim($str)));
}

function isAdmin(){
    return $_SESSION['isAdmin'] == 'YES';
}

function getMsg(){
    if (! empty($_SESSION['msg'])){
        echo  $_SESSION['msg'];
        $_SESSION['msg'] = '';
    }
}

function fileLog ($pagePath = '') {
	$fileLog = "../log/log{$pagePath}.txt";
	$file = fopen($fileLog, 'a');
	fwrite($file,date('H:i:s d-m-Y') . PHP_EOL);
	//$str = file_get_contents($fileLog);

	if (file_exists($fileLog)) {
		$file_arr = file($fileLog);
		if (count($file_arr) >= 10) {
			for ($i = 1;file_exists("../log/log{$pagePath}{$i}.txt");$i++) {}
			fopen("../log/log{$pagePath}{$i}.txt", 'a');
			copy($fileLog, "../log/log{$pagePath}{$i}.txt");
			file_put_contents($fileLog, '');
		}
	}

	fclose($file);
}