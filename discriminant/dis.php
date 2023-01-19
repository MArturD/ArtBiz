<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div class="wrap"> 
<?php
$a = (int)$_POST['a'];
$b = (int)$_POST['b'];
$c = (int)$_POST['c'];
$d=($b * $b - 4 * $a * $c);
 if ($d == 0) {
 	$x = ($b / 2 * $a);
    ?> 
    <div class="wrap_root"> 
    <div class="root_x">
    <p class="ddd">Корень равен: <?php echo $x; ?></p>
    </div>
    </div>
<?php }elseif ($d > 0) {
 	$x1= (-$b + sqrt($d)) / 2 * $a . "<br>" ;
 	$x2= (-$b - sqrt($d)) / 2 * $a;
    ?>
    <div class="root_x12">
 	<p class="root_x1">Корень х1: <?php echo $x1; ?></p>
 	<p class="root_x2">Корень х2: <?php echo $x2; ?></p>
    </div>

<?php }else{ ?>
    
    <div class="root_no">
 	<p><?php echo "Нет корней"; ?></p>
    </div>

<?php
 };
 ?>
</div>

 <style>
    *{
        margin: 0;
        padding: 0;
    }
    .root_x{
        margin: 20px;
        padding: 20px;
        border-radius: 25px;
        background-color: #ff53ff;
        color: black;
    }
    .wrap_root{
        background: red;
    }
    .wrap{
        display: flex;
        justify-content: center;
        max-width: 1100px;
    }
    .root_x12{
        margin: 20px;
        padding: 20px;
        border-radius: 25px;
        background-color: orange;
    }
    .root_x1{
        font-size: 20px;
    }
    .root_x2{
        font-size: 20px;
        margin-top: 10px;
    }
    .root_no{
        margin: 20px;
        padding: 20px;
        border-radius: 25px;
        background-color: #ff5353;
        color: black;
    }
 </style>
 </body>
</html>
