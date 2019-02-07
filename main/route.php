<?php
const ROOT_DIR = __DIR__;
include('../config/config.php');
include('../engine/my-functions.php');
session_start();

$page = (int)$_GET['page'];
switch ($page){
    case 1:
        include('home.php');
		fileLog('-home');
        break;
    case 2:
        include('addUser.php');
		fileLog('-addUser');
        break;
    case 3:
        include('users.php');
		fileLog('-users');
        break;
    case 4:
        include('editUser.php');
		fileLog('-editUser');
        break;
    case 5:
        include('addFile.php');
		fileLog('-addFile');
        break;
	case 6:
        include('calculator.php');
		fileLog('-calculator');
        break;
	case 7:
        include('gallery.php');
		fileLog('-gallery');
        break;
	case 8:
        include('img-full.php');
		fileLog('-img-full');
        break;
	case 9:
        include('authorization.php');
		fileLog('-authorization');
        break;
	case 10:
        include('personal-area.php');
		fileLog('-personal-area');
        break;
	case 11:
        include('registration.php');
		fileLog('-registration');
        break;
    default: 
		include('home.php');
		fileLog('-home');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <ul>
        <li><a href="?page=1">Главная</a></li>
        <li><a href="?page=3">Пользователи</a></li>
        <li><a href="?page=5">Файлы</a></li>
		<li><a href="?page=6">Калькулятор</a></li>
		<li><a href="?page=7">Галерея/товары/отзывы</a></li>
		<li><a href="?page=9">Авторизация</a></li>
		<li><a href="?page=10">Личный кабинет</a></li>
		<li><a href="?page=11">Регистрация</a></li>
    </ul>
    <h1><?= $title?></h1>
    <div><?= $content?></div>

</body>
</html>