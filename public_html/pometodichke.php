<?php
$file = fopen("file.txt","r");
if(!$file){
  echo("Ошибка открытия файла");
}
else{
  $buffer = '';
  while (!feof($file)) {
    $buffer .= fread($file, 1);
  }
  echo $buffer;
  fclose($file);
}
?>

<?php
/*
echo file_get_contents("file.txt");
*/
?>

<?php
$filename="file.txt";
file_put_contents($filename, "Some Data");
?>