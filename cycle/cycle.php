<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<ol>
	<?php 
	for ($i=0; $i < 5; $i++) { ?>
		<li><?php echo $i; ?></li>

<?php
	}
	 ?>
	</ol>
	<ol>
	<?php 
	$i = 0;
	while ($i<5) { ?>
		<li><?php echo $i ?></li>
<?php
$i++;
	}
	 ?>
	</ol>
	<ol>
		<?php 
		$i = 0;
		do { ?>
			<li><?php echo $i;?></li>
		<?php	
		$i++;
		} while ($i<5);
		 ?>
	</ol>
	<ol>
	<?php 
	for ($i=0; $i < 5; $i++) { ?>
		<li class="one"><?php echo $i; ?>Первое</li>
		<ol>
		<?php
		for ($j=0; $j < 5; $j++) { ?>
		 	<li class="two"><?php echo $j; ?>Второе</li>
		 	<ol>
		 		<?php
		 		for ($b=0; $b < 5; $b++) { ?>
		 			<li class="three"><?php echo $b++ ?>Третье</li>
		 		<?php	
		 		 } 
		 		 ?>
		 	</ol>
		 <?php
		 } 
		 ?>
		</ol>
	<?php	
	}
	 ?>
	</ol>
	<style type="text/css">
		.one{
			color: red;
		}
		.two{
			color: green;
		}
		.three{
			color: orange;
		}
	</style>
</body>
</html>