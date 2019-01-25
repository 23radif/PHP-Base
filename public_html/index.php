


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
$dir = './img';
$imagesSccandir = scandir($dir);
for ($i = 0;$i < count($imagesSccandir);$i++) {
	if ($i > 1) {
		echo "<a href=img/{$imagesSccandir[$i]} target='_blank'><img src=img/{$imagesSccandir[$i]} 
		alt={$imagesSccandir[$i]} width=200px></img></a>";
	}
}
?>
