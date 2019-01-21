<?php
$now = 'evening';
switch ($now){
   case 'night':
   echo 'Доброй ночи!';
   break;
case 'morning':
   echo 'Доброе утро!';
   break;
case 'evening':
   echo 'Добрый вечер!';
   break;
default:
   echo 'Добрый день!';
   break;
}
?>
<br>
<?php
$now = 'evening';
if ($now == 'night'){
   echo 'Доброй ночи!';
}
else if ($now == 'morning'){
   echo 'Доброе утро!';
}
else if ($now == 'evening'){
   echo 'Добрый вечер!';
}
else{
   echo 'Добрый день!';
}
?>
<br>
<?php
$x = 10;
$y = 15;
echo $max = ($x > $y) ? $x : $y;
?>
<br>
<?php
function compare_numbers($x, $y){
   if ($x > $y)
      echo "$x > $y<br>";
   else if ($x < $y)
      echo "$x < $y<br>";
   else
      echo "$x = $y<br>";
}
compare_numbers(10, 20);
compare_numbers(20, 10);
compare_numbers(20, 20);
?>
<br>
<?php 
/*
15 1 0
14 1 1
13 2 1
12 3 2
11 5 3
10 8 5
9 13 8
...*/
function fibonacci($n, $prev1 = 1, $prev2 = 0){
	$current = $prev1 + $prev2;
	echo "$current ";
	if($n > 1) {
		fibonacci($n - 1, $current, $prev1);
	echo "<br> n {$n} <br> prev1 {$prev1} <br> prev2 {$prev2} <br> current {$current}";
	};
}
fibonacci(15);
?>
<br>
<br>
<?php
function changeX($x){
   $x += 5;
   echo $x;
}
$x = 1;
echo $x;         // выводит 1
changeX($x); // выводит 6
echo $x;        // выводит 1
?>
<br>
<br>
<?php
$a = 'test';
var_dump($a);
?>
<br>
<br>
<?php
$name = 'Alex';
$string = 'Hello, ' . $name;
$otherString = str_replace('Hello', 'Goodbye', $string);
echo $otherString;
?>




