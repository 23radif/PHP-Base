<?php
$login = $_SESSION['login'];
if (!empty($login )) {
	$sql = "SELECT id, name, login, password, role, dob 
			FROM users 
			WHERE login = '$login'";
	$res = mysqli_query(connect(), $sql);
	$row = mysqli_fetch_assoc($res);
	
	$content = "Добро пожаловать {$row['name']} в Ваш личный кабинет!<br>
	Ваш логин: <span style='color:gray;font-weight:600'>{$row['login']}</span><br>
	Ваш день рождения: <span style='color:gray;font-weight:600'>{$row['dob']}</span>";
}
$title = 'Личный кабинет';

?>