<?php 
// var_dump($_POST);
$pdo = new PDO('mysql:host=localhost;dbname=qwert;','root', '');
$sql = "UPDATE user SET name=:name, email=:email  WHERE id=:id";
$statement = $pdo->prepare($sql);
$statement->execute($_POST);
   

header('Location: /tasks20/mysql/index.php');
?>