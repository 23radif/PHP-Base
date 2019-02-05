<?php
$edit = (int)$_GET['edit'];
if (empty($edit)) {
    header('Location: ?page=3');
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $login = clearStr($_POST['login']);
    $name = clearStr($_POST['name']);
    $password = clearStr($_POST['password']);
    $dob = clearStr($_POST['dob']);
    $sql = "UPDATE users SET 
                name ='$name' ,
                login ='$login' ,
                password ='$password' ,
                dob ='$dob' 
             WHERE id = $edit";
    mysqli_query(connect(), $sql) or die(mysqli_error(connect()));
//    header('Location: '. $_SERVER['REQUEST_URI']);
    header('Location: ?page=3');
    exit;
}

$sql = "SELECT id, name, login, password, role, dob FROM users WHERE id = $edit";
$res = mysqli_query(connect(), $sql);
$row = mysqli_fetch_assoc($res);

$title = 'Редактирование пользователя';
$content = <<<php
<form method="post">
    <input type="text" name="name" placeholder="name" value="{$row['name']}">
    <input type="text" name="login" placeholder="login" value="{$row['login']}">
    <input type="text" name="password" placeholder="password" value="{$row['password']}">
    <input type="date" name="dob" placeholder="dob" value="{$row['dob']}">
    <input type="submit">
</form>
php;
