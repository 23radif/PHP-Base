<?php
$link = connect();
$dirImg = './img/';
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$name = clearStr($_POST["name"]);
	$review = clearStr($_POST["review"]);
	$id_images = (int)clearStr($_POST["id_images"]);
	$remove = clearStr($_POST["remove"]);
	$removeRev = clearStr($_POST["removeRev"]);
	$AddToCart = clearStr($_POST["AddToCart"]);
	
	if ($remove == 'Удалить') {
		$sql = "DELETE FROM reviews WHERE reviews.num = {$removeRev}";
		mysqli_query($link, $sql);
	}
	
	if (!empty($name) && !empty($review) && !empty($id_images)) {
		$sql = "INSERT INTO reviews (id_images, name, review) 
			VALUES ('$id_images', '$name', '$review')";
			mysqli_query($link, $sql);
	}
	
	if (!empty($AddToCart)) {
		$id_images = (int)clearStr($_POST["id_images"]);
		$_SESSION['cart'][] = $id_images;
	}
	
	header('Location: '. $_SERVER['REQUEST_URI']);
    exit;
}

var_dump($_SESSION['cart']);
//foreach ($_SESSION['cart'] as $key => $value) {
//	$id_images = $value;
//}

$sql = "SELECT id, url, size, name FROM images ORDER BY CountClick DESC ;";
$res = mysqli_query($link, $sql);
$content = <<<php
	<h2>Корзина товаров:</h2>
php;
while ($row = mysqli_fetch_assoc($res)) {
	foreach ($_SESSION['cart'] as $key => $value) {
		if ($row['id'] == $value) {
			$content .= <<<php
			<a style="" href="?page=8&url={$row['url']}&dirImg={$dirImg}&alt={$row['name']}&size={$row['size']}">
				<img src={$dirImg}{$row['url']} 
					alt={$row['name']} width=100px></img></a>
php;
		}
	}
}

$content .= '<br><br><h2>Товары:</h2>';
$res = mysqli_query($link, $sql);
while ($row = mysqli_fetch_assoc($res)) {
	$content .= <<<php
	<div style="float:left; margin: 2px; width: 200px; border:1px solid gray; padding:3px">
		Название товара: <span style="color:green;font-weight:600">{$row['name']}</span><br>
		<a style="float:left" href="?page=8&url={$row['url']}&dirImg={$dirImg}&alt={$row['name']}&size={$row['size']}">
		<img src={$dirImg}{$row['url']} 
			alt={$row['name']} width=200px></img></a>
		<form action="" method="post">
				<input type="hidden" name="id_images" value="{$row['id']}">
				<input type="submit" name="AddToCart" value="Добавить в корзину">
		</form>
		<figcaption>Размер изображения: <br>{$row['size']}<br><br>
			Добавить отзыв:
			<form action="" method="post">
				<input type="text" name="name" placeholder="Имя" maxlength="50">
				<input type="text" name="review" placeholder="Отзыв" maxlength="500">
				<input type="hidden" name="id_images" value="{$row['id']}">
				<input type="submit">
			</form><br>Отзывы:<br><br>
php;
	$sqlRev = "SELECT num, id_images, name, review FROM reviews ORDER BY num DESC ";
	$resRev = mysqli_query($link, $sqlRev);
	while ($rowRev = mysqli_fetch_assoc($resRev)) {
		if ($row['id'] == $rowRev['id_images']) {
			$reviews = "<span style='color:green;font-weight:600; word-break: break-all'>Имя: {$rowRev['name']}</span><br>" . 
						"<span style='color:gray; word-break: break-all'>Отзыв: {$rowRev['review']}</span>" .
						"<form action='' method='post'>
							<input type='submit' name='remove' value='Удалить'>
							<input type='hidden' name='removeRev' value='{$rowRev['num']}'>
						</form><br>";
			
			$content .= $reviews;
		}
	}
	$content .= '</figcaption></div>';
}
$title = 'Каталог товаров. Добавление отзывов';

mysqli_close($link);



////////////////////////////////////////////////////////////////////////////////////////////////////////
//ДЗ из 4 урока: 
//3. *Создать логирование времени запроса пользователем главной страницы галереи. 
//4. *Модернизировать логирование так, чтоб последнии данные всегда логировались в файл log.txt. 
//Как только в данном файле будет 10 записей, данные из него должны быть перенесены в файл log1.txt. 
//Если он уже существует - в log2.txt итд.
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
//ДЗ из 4 урока. Добавление изображений сканированием директории
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
*/

//echo phpinfo();
?>

