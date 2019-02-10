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

include('../templates/public.html');
