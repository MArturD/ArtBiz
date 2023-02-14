<?php
$name = $_POST['name'];
$jobs = $_POST['jobs'];
$number = $_POST['number'];
$adress = $_POST['adress'];
$email = $_POST['email'];
$password = $_POST['password'];

$pdo = new PDO("mysql:host=localhost;dbname=qwert", "root", "");
$sql = "INSERT INTO  login_table (name,jobs,number,adress,email,password) VALUES (:name,:jobs,:number,:adress,:email,:password)";
$statement = $pdo->prepare($sql);
$statement->execute([
    "name" => $name,
    "jobs" => $jobs,
    "number" => $number,
    "adress" => $adress,
    "email" => $email,
    "password" => $password
]);

