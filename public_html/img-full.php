<?php

$dirImg = $_GET['dirImg'];
$url = $_GET['url'];
$alt = $_GET['alt'];
$size = $_GET['size'];

echo<<<php
<div style="text-align:center">
	<img style="margin:0 auto" src={$dirImg}{$url} alt={$alt}></img>
php;



$link = mysqli_connect('localhost', 'root', '', 'gbphp');
$sql = "SELECT id, url, size, name, CountClick FROM images ;";
$res = mysqli_query($link, $sql);

while ($row = mysqli_fetch_assoc($res)) {
	if ($row['url'] == $url) {
		$CountClick = (int)$row['CountClick'];
		$CountClick++;
		$id = (int)$row['id'];
		echo<<<php
		<figcaption>
		Число просмотров: <span style="color:red;font-weight:600">{$CountClick}</span>
		</figcaption>
		</div>
php;
		$sql = "UPDATE images SET 
				CountClick = $CountClick
				WHERE id = $id";
		$res = mysqli_query($link, $sql) or die(mysqli_error($link));
		break;
	}
}

mysqli_close($link);

