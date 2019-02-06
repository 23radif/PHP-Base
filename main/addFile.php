<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $file = PUBLIC_DIR . '/img/' . $_FILES['userfile']['name'];
    copy($_FILES['userfile']['tmp_name'], $file);
    header('Location: '. $_SERVER['REQUEST_URI']);
    exit;
}

$title = 'Добавление файлов';
$content = <<<php
<p>
<form enctype="multipart/form-data" method="post">
    Отправить этот файл: <input name="userfile" type="file" >
    <input type="submit" value="Отправить файл" >
</form>
php;


