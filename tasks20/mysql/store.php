<?php 
// var_dump($_POST);
$pdo = new PDO('mysql:host=localhost;dbname=qwert;','root', '');
$sql = "INSERT INTO user (name) VALUES (:name)";
$statement = $pdo->prepare($sql);
$statement->execute($_POST);


header('Location: /tasks20/mysql/index.php');
?>