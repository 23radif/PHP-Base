<?php

$link = connect();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$name = clearStr($_POST["name"]);
	$review = clearStr($_POST["review"]);
	$id_images = (int)clearStr($_POST["id_images"]);
	$remove = clearStr($_POST["remove"]);
	$removeRev = clearStr($_POST["removeRev"]);
	$edit = clearStr($_POST["edit"]);
	
	if ($remove == 'Удалить') {
		$sql = "DELETE FROM reviews WHERE reviews.num = {$removeRev}";
		mysqli_query($link, $sql);
	}
	
    $sql = "INSERT INTO reviews (id_images, name, review) 
			VALUES ('$id_images', '$name', '$review')";
	mysqli_query($link, $sql);
	header('Location: '. $_SERVER['REQUEST_URI']);
    exit;
}

if ($edit == 'Редактиовать') {
		$sql = "UPDATE reviews SET 
					num=[value-1],
					id_images=[value-2],
					name=[value-3],
					review=[value-4] 
				WHERE 1";
		mysqli_query($link, $sql);
	}

$dirImg = clearStr($_GET['dirImg']);
$url = clearStr($_GET['url']);
$alt = clearStr($_GET['alt']);
$size = clearStr($_GET['size']);

$content .= <<<php
<div style="text-align:center">
	<img style="margin:0 auto" src={$dirImg}{$url} alt={$alt}></img>
php;



$link = connect();
$sql = "SELECT id, url, size, name, CountClick, ProductDescription FROM images ;";
$res = mysqli_query($link, $sql);

while ($row = mysqli_fetch_assoc($res)) {
	if ($row['url'] == $url) {
		$CountClick = (int)$row['CountClick'];
		$CountClick++;
		$id = (int)$row['id'];
		$content .= <<<php
		<figcaption>
			Название товара: <span style="color:green;font-weight:600">{$row['name']}</span><br>
			Число просмотров: <span style="color:red;font-weight:600">{$CountClick}</span><br>
			Описание товара: <span style="color:gray;font-weight:600">{$row['ProductDescription']}</span><br><br>
			Добавить отзыв:
			<form action="" method="post">
				<input type="text" name="name" placeholder="Имя">
				<input type="text" name="review" placeholder="Отзыв">
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
}
$title = 'Описание товара. Отзывы';

$title = 'Описание товара';

mysqli_close($link);
?>

