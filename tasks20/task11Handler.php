<?php
session_start();

$text= $_POST["text"];
$pdo = new PDO("mysql:host=localhost;dbname=qwert;","root", "");

$sql = "SELECT * FROM new_table WHERE text=:text";
$statement = $pdo->prepare($sql);
$statement->execute(["text" => $text]);
$task = $statement ->fetch(PDO::FETCH_ASSOC);

if (!empty($task)) {
    $_SESSION['danger'] = "Данная запись уже присутствует";
//    $danger = "Введенная запись уже присутствует";
//    $_SESSION['danger'] = $danger;
    
    header('Location: /tasks20/task_11.php');  
    exit;
};





$sql = "INSERT INTO new_table (text) VALUES (:text)";
$statement = $pdo->prepare($sql);
$statement->execute(['text' => $text]);


header('Location: /tasks20/task_11.php');
?>