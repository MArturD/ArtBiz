
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="slick/slick.css">
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css">
	<title>Document</title>
</head>
<body>
	

<table>
		<tr>
			<th>Номер</th>
			<th>Имя</th>
			<th>Статус</th>
			<th>Возраст</th>
		</tr>
<?php
 $ISP =[
 	  [
 	  	"name" => "Artur",
 		"status" => "admin",
 		"years" => "19",
 		"link" => "https://www.citilink.ru",
 	],
 	[
 		"name" => "Dima",
 		"status" => "student",
 		"years"  => "18",
 		"link" => "https://www.citilink.ru",
 	],
 ];
 foreach($ISP as $number => $students){
 ?>

 <tr>
 	<td><i><?php echo $number ?></i></td>
 	<td class="name"><a href="<?php echo $students["link"] ?>"><?php echo $students["name"] ?></a></td>
 	<td class="status"><?php echo $students["status"] ?></td>
 	<td><?php echo $students["years"] ?></td>
 </tr>
<?php }
?>

</table>
<div class="dicrim">
	
<?php
 $a=1;
 $b=11;
 $c=1;
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
</div>
<div class="schoolboy">
	<table>
		<tr>
			<th>Статус</th>
			<th>Имя</th>
			<th>Возраст</th>
		</tr>
	<?php
	$group = [
		[
			"name" => "Artur",
			"years" => "19",
			"active" => true,
			"link" => "https://www.citilink.ru"
		],
		[
			"name" => "Dima",
			"years" => "18",
			"active" => false,
			"link" => "https://www.citilink.ru"

		],
	];
	foreach ($group as $key => $value) {
	 ?>
	 <?php if ($value["active"]){
	 	$std_status = "Молодец";
	 	$std_color = "green"; ?>
	 <?php } else{ 
	 	$std_status = "Прогульщик";
	 	$std_color = "red";  ?>
	<?php } ?>
	<tr>
	 	<td class="<?php echo $std_color ?>" ><?php echo $std_status?></td>
	 	<td><a href="<?php echo $value["link"] ?>" target="_blank"><?php echo $value["name"]?></a></td>
	 	<td><?php echo $value["years"] ?></td>
	</tr>

	  <?php 
	  } ?>
	</table>
</div>

<?php 
$merin = array('picture' => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRtok3DYZAMgRFYI1-SULOnQj1Eeo8f6hfWElPPmjEpWA&s" , );
 foreach ($merin as $key => $value) {
 ?>

  <div class="multiple-items">
    <div class="content"><img src="<?php echo $value["picture"] ?>"> your content</div>
  </div>


<?php } ?>


<style>
	table{
		border: 1px solid red;
	}
	th{
		border: 1px solid red;
	}
	td{
		border: 1px solid red;
	}
	.status{
		color: blue;
	}
	.name a{
		font-weight: bold;
		text-decoration: none;
		color: purple;
	}
	.dicrim{
	}
	.green{
		color: green;
	}
	.red{
		color: red;
	}
	.content{
		width: 250px;
		height: 250px;
	}
</style>

    <script type="text/javascript" src="jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.single-item').slick({

            });
        });
        $(document).ready(function() {
            $('.multiple-items').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
            });
        });
    </script>
</body>
</html>