


<?php
$images = [
['src' => '1.jpg', 'alt' => '1', 'width' => '200px', 'target' => '_blank'],
['src' => '2.jpg', 'alt' => '2', 'width' => '200px', 'target' => '_blank'],
['src' => '3.jpg', 'alt' => '3', 'width' => '200px', 'target' => '_blank'],
['src' => '4.jpg', 'alt' => '4', 'width' => '200px', 'target' => '_blank'],
['src' => '5.jpg', 'alt' => '5', 'width' => '200px', 'target' => '_blank'],
['src' => '6.jpg', 'alt' => '6', 'width' => '200px', 'target' => '_blank'],
['src' => '7.jpg', 'alt' => '7', 'width' => '200px', 'target' => '_blank'],
];

for ($i = 0;$i < count($images);$i++) {
	echo "<a href=img/{$images[$i]['src']} target={$images[$i]['target']}><img src=img/{$images[$i]['src']} 
	alt={$images[$i]['alt']} width={$images[$i]['width']}></img></a>";
}
$dirImg = __DIR__ . '/img';
$imagesSccandir = scandir($dirImg);
for ($i = 0;$i < count($imagesSccandir);$i++) {
	if ($i > 1) {
		echo "<a href=img/{$imagesSccandir[$i]} target='_blank'><img src=img/{$imagesSccandir[$i]} 
		alt={$imagesSccandir[$i]} width=200px></img></a>";
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
?>
