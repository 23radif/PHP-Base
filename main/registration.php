<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$name = clearStr($_POST['name']);
	$dob = clearStr($_POST['dob']);
	$login = clearStr($_POST['login']);
	$password = clearStr($_POST['password']);
}
$content = <<<php
<form method="post">
    <input type="text" name="name" placeholder="Введите Ваше имя" style="width:220px;padding: 3px"><br>
	<input type="text" name="dob" placeholder="Введите Ваш день рождения" style="width:220px;padding: 3px"><br>
	<input type="text" name="login" placeholder="Придумайте оригинальный логин" style="width:220px;padding: 3px"><br>
    <input type="text" name="password" placeholder="Придумайте сложный пароль" style="width:220px;padding: 3px"><br>
    <input type="submit">
</form>
php;
?>