<?php
$name = 'Радиф';
$age = 27;
$age1 = ++$age;
$age2 = ++$age;
$date = date ('d-m-Y H:i');
?>

<?php
echo $im = "<p>Меня зовут {$name}</p>
<p>Через год мне будет {$age1} лет, а еще через год {$age2}</p>
<p>На моих часах сейчас: {$date}<hr>";

echo str_replace(' ', '_', $im);

echo strpos($im, "<p>На моих");
echo substr ($im, strpos($im, "<p>На моих"));
?>