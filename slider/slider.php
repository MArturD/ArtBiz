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
<?php
$slik = array('slik' => "awds" , );
foreach ($slik as $key => $val) {
 echo $val;
}
 ?>

	<div class="wrap">
		<div class="multiple-items">
		<div class="content"></div>
		<div class="content"><p>2</p></div>
		<div class="content"><p>3</p></div>
		</div>
	</div>

	<style>
		
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
                slidesToScroll: 1
            });
        });
    </script>
</body>
</html>