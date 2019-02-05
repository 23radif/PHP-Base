<?php
$del = (int)$_GET['del'];
if (! empty($del)) {
    $sql = "DELETE FROM users WHERE id = $del";
    mysqli_query(connect(), $sql);
    header('Location: ?page=3');
    exit;
}

$title = 'Добавление пользователя';
$sql = "SELECT id, name, login, password, role, dob 
        FROM users
        ORDER BY id DESC";
$res = mysqli_query(connect(), $sql);
$content = '<a href="?page=2">Добавить</a>';

while($row = mysqli_fetch_assoc($res)){
    $content .= <<<php
    <p>
    Login: {$row['login']} Name: {$row['name']} 
    | <a href="?page=3&del={$row['id']}">del</a>
    | <a href="?page=4&edit={$row['id']}">edit</a>
    <br>
    </p>

php;
}

