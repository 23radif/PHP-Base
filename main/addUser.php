<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $login = clearStr($_POST['login']);
    $name = clearStr($_POST['name']);
    $password = clearStr($_POST['password']);
    $dob = clearStr($_POST['dob']);
    $sql = "INSERT INTO users(name, login, password, dob) 
            VALUES ('$name', '$login', '$password', '$dob')";
    mysqli_query(connect(), $sql);
//    header('Location: '. $_SERVER['REQUEST_URI']);
    header('Location: ?page=3');
    exit;
}
$title = 'Добавление пользователя';
$content = <<<php
<p>
Вы ввели: <br>
Login: $login <br>
Name: $name <br>
</p>

<form method="post">
    <input type="text" name="name" placeholder="name">
    <input type="text" name="login" placeholder="login">
    <input type="text" name="password" placeholder="password">
    <input type="date" name="dob" placeholder="dob">
    <input type="submit">
</form>
php;


