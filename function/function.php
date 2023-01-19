<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php
	function dis($a, $b, $c)
	 {
	$d=($b * $b - 4 * $a * $c);
	$res = $d;
	 	if ($d == 0) {
	 		$x = ($b / 2 * $a);
	 		$res = $x;
	 	}elseif ($d > 0) {
 			$x1= (-$b + sqrt($d)) / 2 * $a . "<br>" ;
 			$x2= (-$b - sqrt($d)) / 2 * $a;
 			$res = $x1 . $x2;
	 	}else
	 	$res .= "Нет корней";
	 	return $res;
	 } 
	 
	  echo dis(1,11,1);
	 ?>
</body>
</html>