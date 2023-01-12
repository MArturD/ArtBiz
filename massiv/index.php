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
 		"link" => "https://www.mvideo.ru/?utm_source=advcake&utm_medium=cpa&utm_campaign=62ec5fde&utm_content=affiliate&advcake_params=41c1f73344482bbf1b938e79b125f080&utm_term=41c1f73344482bbf1b938e79b125f080&ab_test_value=D1",
 	],
 	[
 		"name" => "Dima",
 		"status" => "student",
 		"years"  => "18",
 		"link" => "https://www.mvideo.ru/?utm_source=advcake&utm_medium=cpa&utm_campaign=62ec5fde&utm_content=affiliate&advcake_params=41c1f73344482bbf1b938e79b125f080&utm_term=41c1f73344482bbf1b938e79b125f080&ab_test_value=D1",
 	],
 ];
 foreach($ISP as $number => $students){
 ?>

 <tr>
 	<td><i><?php echo $number ?></i></td>
 	<td class="name"><a href="<?php echo $value["link"] ?>"><?php echo $students["name"] ?></a></td>
 	<td class="status"><?php echo $students["status"] ?></td>
 	<td><?php echo $students["years"] ?></td>
 </tr>
<?php }
?>

</table>
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

</style