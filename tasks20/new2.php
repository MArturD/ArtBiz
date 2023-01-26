<?php
$text= $_POST['text'];
$pdo = new PDO("mysql:host=localhost;dbname=qwert;","root", "");
$sql = "INSERT INTO new_table (text) VALUES (:text)";
$statement = $pdo->prepare($sql);
$statement->execute(['text'=> $text]);


header('Location: /tasks20/new.php');
?>