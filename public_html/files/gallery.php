<?php
$link = connect();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$name = clearStr($_POST["name"]);
	$review = clearStr($_POST["review"]);
	$id_images = (int)clearStr($_POST["id_images"]);
	$remove = clearStr($_POST["remove"]);
	$removeRev = clearStr($_POST["removeRev"]);
	
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

$sql = "SELECT id, url, size, name FROM images ORDER BY CountClick DESC ;";
$res = mysqli_query($link, $sql);

$dirImg = './img/';

while ($row = mysqli_fetch_assoc($res)) {
	$content .= <<<php
	<div style="float:left; margin: 0 5px; width: 200px">
		<a style="float:left" href="?page=8&url={$row['url']}&dirImg={$dirImg}&alt={$row['name']}&size={$row['size']}" 
			target='_blank'><img src={$dirImg}{$row['url']} 
			alt={$row['name']} width=200px></img></a>
		<figcaption>Размер изображения: <br>{$row['size']}<br><br>
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
$title = 'Каталог товаров. Добавление отзывов';

mysqli_close($link);
?>

