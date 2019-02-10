<?php
$domainPath = 'public_html';
const SOL = "b07152d234b79075b9640";

function passwordGen($pass) {
	return md5(md5($pass . SOL));
}

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

