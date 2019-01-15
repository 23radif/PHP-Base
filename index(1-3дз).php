<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalabe=no, intial-scale=1.0, maximum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>

<?php
$name = "GeekBrains user";
$status = "active";
echo "Hello, $name! You status - $status.<br>";
?>

<?php
define('MY_CONST', 100);
define('S_CONST', 'Geek');
echo MY_CONST . ' ' .  S_CONST . '<br><br';
?>

<?php
$int10 = 42;
$int2 = 0b101010;
$int8 = 052;
$int16 = 0x2A;
echo "Десятеричная система $int10 <br>";
echo "Двоичная система $int2 <br>";
echo "Восьмеричная система $int8 <br>";
echo "Шестнадцатеричная система $int16 <br><br>";
?>

<?php
$precise1 = 1.5;
$precise2 = 1.5e4;
$precise3 = 6E-8;
echo "$precise1 | $precise2 | $precise3 <br><br>";
?>

<?php
$a = 1;
echo "$a <br>";
echo '$a <br><br>';
?>

<?php
$a = 10;
$b = (boolean) $a;
?>

<?php
$a = 'Hello, ';
$b = 'world';
$c = $a . $b;
echo $c . '<br><br>';
?>

<?php
$a = 4;
$b = 5;
echo $a + $b . '<br>';    // сложение
echo $a * $b . '<br>';    // умножение
echo $a - $b . '<br>';    // вычитание
echo $a / $b . '<br>';  // деление
echo $a % $b . '<br>'; // остаток от деления
echo $a ** $b . '<br>'; // возведение в степень
?>

<?php
$a = 4;
$b = 5;
$a += $b;
echo 'a = ' . $a . '<br>';
$a = 0;
echo $a++;     // Постинкремент
echo '<br>';
echo ++$a;    // Преинкремент
echo '<br>';
echo $a--;     // Постдекремент
echo '<br>';
echo ­-$a;    // Предекремент
echo '<br><br>';
?>

<?php
$a = 4;
$b = 5;
var_dump($a == $b);  // Сравнение по значению
echo '<br>';
var_dump($a === $b); // Сравнение по значению и типу
echo '<br>';
var_dump($a > $b);    // Больше
echo '<br>';
var_dump($a < $b);    // Меньше
echo '<br>';
var_dump($a <> $b);  // Не равно
echo '<br>';
var_dump($a != $b);   // Не равно
echo '<br>';
var_dump($a !== $b); // Не равно без приведения типов
echo '<br>';
var_dump($a <= $b);  // Меньше или равно
echo '<br>';
var_dump($a >= $b);  // Больше или равно
echo '<br><br>';
?>


<?php
$a = 5;
$b = '05';
var_dump($a == $b);                             // Почему true?  
echo '- Так как сравнение только по значению <br>';
var_dump((int)'012345');                        // Почему 12345?
echo '- Идёт приведение к числовому типу, целым числам <br>';
var_dump((float)123.0 === (int)123.0); // Почему false?
echo '- В первом случае приведение к дробному числу, во втором к целому числу, сравнение по значениею и типу <br>';
var_dump((int)0 === (int)'hello, world'); // Почему true?
echo '- Приведение к чилу, в обоих случаях 0, сравнение по значениею и типу <br>';
?>


</body>
</html>