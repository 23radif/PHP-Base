<?php
$a = random_int(-9999999, 999999);
$b = random_int(-9999999, 999999);
echo 'Домашнее задание №1<br><br>';
echo "Выбраны 2 рандомных числа в диапазоне: [-9999999, 999999], равные: \$a = {$a} и \$b = {$b}, для которых выполняются условия:<br>
если \$a и \$b положительные, вывести их разность;<br> 
если \$а и \$b отрицательные, вывести их произведение;<br>
если \$а и \$b разных знаков, вывести их сумму;<br>
Результат: ";

/*
if ($a >= 0 && $b >= 0) {
	echo $a - $b;
} else if ($a < 0 && $b < 0) {
	echo $a * $b;
} else {
	echo $a + $b;
};
*/
//Оптимизированный вариант:
if ($a >= 0 XOR $b >= 0) {
	echo $a + $b;
} else if ($a < 0) {
	echo $a * $b;
} else {
	echo $a - $b;
};

echo '<hr>Домашнее задание №2. Оператор switch.<br><br>';
$a = random_int(0, 15);;

echo 'Здесь идут числа по порядку, от рандомно выбранного: ', $a, ' до: 15<br>';
switch($a){
	case 0:
		echo $a++, ' ';
	case 1:
		echo $a++, ' ';
	case 2:
		echo $a++, ' ';
	case 3:
		echo $a++, ' ';
	case 4:
		echo $a++, ' ';
	case 5:
		echo $a++, ' ';
	case 6:
		echo $a++, ' ';
	case 7:
		echo $a++, ' ';
	case 8:
		echo $a++, ' ';
	case 9:
		echo $a++, ' ';
	case 10:
		echo $a++, ' ';
	case 11:
		echo $a++, ' ';
	case 12:
		echo $a++, ' ';
	case 13:
		echo $a++, ' ';
	case 14:
		echo $a++, ' ';
	default:
		echo 15;
};

echo '<hr>Домашнее задание №3. В коде используется функция с 2 параметрами.<br><br>';

$a = random_int(-9999999, 999999);
$b = random_int(-9999999, 999999);

function sum($a, $b){
	return $a + $b;
};
echo "Выбраны 2 рандомных числа в диапазоне: [-9999999, 999999], равные: \$a = {$a} и \$b = {$b}, для которых выполняются условия:<br>
При сложении {$a} и {$b} получим: ", sum($a, $b), '<br>';

function sub($a, $b){
	return $a - $b;
};
echo "При вычитании из числа {$a} число {$b} получим: ", sub($a, $b), '<br>';

function mult($a, $b){
	return $a * $b;
};
echo "При умножении {$a} на {$b} получим: ", mult($a, $b), '<br>';

function div($a, $b){
	return $b != 0 ? $a / $b : '<b style="color: red">на ноль делить нельзя!</b>';
};
echo "При делении числа {$a} на {$b} получим: ", div($a, $b), '<br>';



echo '<hr>Домашнее задание №4. В коде используется функция с 3 параметрами<br><br>';

$a = random_int(-9999999, 999999);
$b = random_int(-9999999, 999999);

echo "Выбраны 2 рандомных числа в диапазоне: [-9999999, 999999], равные: \$a = {$a} и \$b = {$b}, для которых выполняются условия:<br>";
function mathOperation($arg1, $arg2, $operation){
	if ($operation == 'sum') {
		return sum($arg1, $arg2);
	} else if ($operation == 'sub') {
		return sub($arg1, $arg2);
	} else if ($operation == 'mult') {
		return mult($arg1, $arg2);
	} else if ($operation == 'div') {
		return div($arg1, $arg2);
	} else {
	return "{$operation} - <b style='color: red'>некорректная операция</b>";
	};
};

echo "При сложении {$a} и {$b} получим: ", mathOperation($a, $b, 'sum'), '<br>';
echo "При вычитании из числа {$a} число {$b} получим: ", mathOperation($a, $b, 'sub'), '<br>';
echo "При умножении {$a} на {$b} получим: ", mathOperation($a, $b, 'mult'), '<br>';
echo "При делении числа {$a} на {$b} получим: ", mathOperation($a, $b, 'div'), '<br><br>Дополнительно:<br>';
echo "При делении числа {$a} на 0 получим: ", mathOperation($a, 0, 'div'), '<br>';
echo "При sfafsa числа {$a} на {$b} получим: ", mathOperation($a, $b, 'sfafsa'), '<br>';

echo '<hr>Домашнее задание №5. Подключение html файла и вывод в подвал текущего года.<br>';

$html = file_get_contents('date.html');
$today = date("Y"); 
echo str_replace('<div id="date"></div>',"Текущий год: {$today}", $html);



echo '<hr>Домашнее задание №6. Возведение в степень при помощи рекурсии. Рандомные числа [-9, 9]. Рандомная степень [-5, 5]<br><br>';

$val = random_int(-9, 9);
$pow = random_int(-5, 5);
echo 'При возведении числа: ', $val, ' в степень: ', $pow, ', получим: ', power($val, $pow);

function power($val, $pow){
	if ($val == 0) {
		return $val;
	};
	if ($pow < 0) {
		return power(1 / $val, -$pow);
		} else if ($pow <= 1){
			return $val;
		};
	return $val * power($val, $pow - 1);
};



echo '<hr>Домашнее задание №7. Склонение текущих часов и минут при помощи функций.<br><br>';
/*
$hours = date("H ");
$minutes = date("i ")
*/;
//Оптимизированный вариант:
$time = time();
$hours = date("H ", $time);
$minutes = date("i ", $time);

/*
if (($hours % 10 == 1) && ($hours % 100 != 11)) {
	echo 'Текущее время: ', $hours, $h, $minutes, $m;
} else if ((($hours % 100) > 4) && (($hours % 100) < 21)) {
	echo 'Текущее время: ', $hours, $h2, $minutes, $m1;
} else {
	echo 'Текущее время: ', $hours, $h1, $minutes, $m1;
};
*/

/*
function numbersDecline($number, $suf1, $suf2, $suf5) {
	if (($number % 10 == 1) && ($number % 100 != 11)) {
		return $suf1;
} else if ((($number % 10) < 5) && $number != 11 && $number != 12 && $number != 13 && $number != 14 && ($number % 10) != 0) {
		return $suf2;
	} else {
		return $suf5;
	};
};
*/

if ($time > 20) {
	$time %= 10;
}

function numbersDecline($number, $suf1, $suf2, $suf5) {
	if ($number == 1) {
		$string = $suf1;
} else if ($number > 1 && $number < 5) {
		$string = $suf2;
	} else {
		$string = $suf5;
	};
	return $string;
};
echo 'Текущее время: ', $hours, numbersDecline($hours, 'час ', 'часа ', 'часов '), $minutes, numbersDecline($minutes, 'минута', 'минуты', 'минут');
	