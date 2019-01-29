<?php

$link = mysqli_connect('localhost', 'root', '', 'gbphp');
$sql = "SELECT id, url, size, name FROM images ;";
$res = mysqli_query($link, $sql);

$dirImg = './img/';
$imgFull = 'img-full.php';

$sql = "SELECT * FROM images ORDER BY CountClick DESC ;";
$res = mysqli_query($link, $sql);

while ($row = mysqli_fetch_assoc($res)) {
    echo<<<php
	<div style="float:left; margin: 0 5px">
		<a style="float:left" href="{$imgFull}?url={$row['url']}&dirImg={$dirImg}&alt={$row['name']}&size={$row['size']}" 
			target='_blank'><img src={$dirImg}{$row['url']} 
			alt={$row['name']} width=200px></img></a>
		<figcaption>Размер изображения: <br>{$row['size']}</figcaption>
	</div>
php;
}

mysqli_close($link);

/*
$dirImg = __DIR__ . '/img';
$imagesSccandir = scandir($dirImg);
for ($i = 0;$i < count($imagesSccandir);$i++) {
	if ($i > 1) {
		echo "<a href=img/{$imagesSccandir[$i]} target='_blank'><img src=img/{$imagesSccandir[$i]} 
		alt={$imagesSccandir[$i]} width=200px></img></a><br>";
		echo 'width: ' . getimagesize($dirImg . '/' . ($i - 1) . '.jpg')[0] . '<br>'; 
		echo 'height: ' . getimagesize($dirImg . '/' . ($i - 1) . '.jpg')[1] . '<br>'; 
	}
}

$fileLog = 'log.txt';
$file = fopen($fileLog, 'a');
fwrite($file,date('H:i:s d-m-Y') . PHP_EOL);
//$str = file_get_contents($fileLog);

if (file_exists($fileLog)) {
	$file_arr = file($fileLog);
	if (count($file_arr) >= 10) {
		for ($i = 1;file_exists("log{$i}.txt");$i++) {}
		fopen("log{$i}.txt", 'a');
		copy($fileLog, "log{$i}.txt");
		file_put_contents($fileLog, '');
	}
}

fclose($file);
*/

//echo phpinfo();
?>
