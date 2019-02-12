<?php
session_start();

include('../config/config.php');
include('../engine/my-functions.php');

$page = !empty($_GET['page']) ? $_GET['page'] : 'index';
$func = !empty($_GET['func']) ? $_GET['func'] : 'index';

$dir = __DIR__ . '/';

if (!file_exists($dir . $page . '.php')) {
    $page = 'index';
}

include($dir . $page . '.php');

if (!function_exists($func)) {
    $func = 'index';
}
$content = $func();
//var_dump($_SESSION);

$template = file_get_contents($dir . 'tmpl/' . template());

$goods = !empty($_SESSION['goods']) ? count($_SESSION['goods']) : 0;
$title = !empty($_SESSION['title']) ? $_SESSION['title'] : '';
	$newDate = [
        '{CONTENT}' => $content,
        '{___MSG_}' => getMsg(),
        '{__COUNT}' => $goods,
        '{__TITLE}' => $title
    ];

   echo strtr($template, $newDate);




