<?php
session_start();
require "functions.php";
$email = $_POST["email"];
$password = $_POST["password"];

var_dump($email,$password);
$pdo = new PDO("mysql:host=localhost;dbname=qwert", "root", "");
$mysql = "SELECT * FROM login_table WHERE email=:email";
$statementmail = $pdo->prepare($mysql);
$statementmail->execute([
    "email" => $email,
]);
$mail = $statementmail->fetch(PDO::FETCH_ASSOC);

$state = "SELECT * FROM login_table WHERE password=:password";
$statementpass = $pdo->prepare($state);
$statementpass->execute([
    "password" => $password,
]);
$pass = $statementpass->fetch(PDO::FETCH_ASSOC);
if ($email!=$mail["email"] || $password!=$pass["password"]){
    echo "не верный логин";
}else{
    echo "верный логин";
}