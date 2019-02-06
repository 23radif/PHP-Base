<?php
const SOL = "b07152d234b79075b9640";
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	if (empty($_POST['login']) || empty($_POST['password'])){
		$_SESSION['msg'] = 'Не все параметры переданы';
		header('Location: /' . $domainPath . '/?page=9');
		exit;
	}

    $login = $_POST['login'];
	
	$sql = "SELECT id, name, login, password, role, dob 
			FROM users 
			WHERE login = '$login'";
	$res = mysqli_query(connect(), $sql);
	$row = mysqli_fetch_assoc($res);
	$password = md5(md5($_POST['password'] . SOL));
//        $passwordSql = '21db9c15a75962a0865d5a39fe7fb9ff';
	$passwordSql = $row['password'];
	if ($password == $passwordSql){
		$_SESSION['isAdmin'] = 'YES';
		$_SESSION['msg'] = 'Успешная авторизация! Нажмите Exit для выхода';
		$_SESSION['login'] = $row['login'];
		$_SESSION['msgGallery'] = 'Вы авторизованный пользователь. Можете покупать товары';
		$_SESSION['msgGalleryErr'] = '';
		header('Location: /' . $domainPath . '/?page=10');
		exit;
	}
	$_SESSION['msg'] = 'Неверные логин или пароль';
	header('Location: /' . $domainPath . '/?page=9');
	exit;
}

if (! empty($_GET['exit'])){
    session_destroy();
    header('Location: /' . $domainPath . '/?page=9');
    exit;
}

$title = 'Авторизация пользователя';
if(!empty($_SESSION['msg'])) {
	$content .= "<span style='color:red'>{$_SESSION['msg']}!</span><br>";
}

if ($_SESSION['isAdmin'] == 'YES') { 
    $content .= "<a href='?page=9&exit=1'>Exit</a>";
} else {
	$content .= "
	<form method='post'>
		<input type='text' name='login' placeholder='login'>
		<input type='text' name='password' placeholder='password'>
		<input type='submit'>
	</form>";
}
?>





<!-- 
<? if ($_SESSION['isAdmin'] == 'YES'){ ?>
    <a href="?page=9&exit=1">Exit</a>
<? } else { ?>
<form method="post">
    <input type="text" name="login" placeholder="login">
    <input type="text" name="password" placeholder="password">
    <input type="submit">
</form>
<? } ?>
-->
<?
//var_dump(md5(md5('123' . SOL)));




