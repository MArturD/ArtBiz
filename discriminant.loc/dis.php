<?php
$a = $_POST['a'];
$b = $_POST['b'];
$c = $_POST['c'];
$d=($b * $b - 4 * $a * $c);
 if ($d == 0) {
 	$x = ($b / 2 * $a);
 	echo "Корень равен: " .$x;
 }elseif ($d > 0) {
 	$x1= (-$b + sqrt($d)) / 2 * $a . "<br>" ;
 	$x2= (-$b - sqrt($d)) / 2 * $a;
 	echo "Корень х1 равен: " .$x1;
 	echo "Корень x2 равен: " .$x2;

 }else{
 	echo "Нет корней";
 };

 ?>