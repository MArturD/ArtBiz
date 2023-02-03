<?php
session_start();
require "functions.php";
$email = $_POST["email"];
$password = $_POST["password"];
//function get_user($email,$password)
//{
//    $pdo = new PDO("mysql:host=localhost;dbname=qwert", "root", "");
//    $sql = "SELECT * FROM login_table WHERE email=:email";
//    $statement = $pdo->prepare($sql);
//    $statement->execute(["email" => $email]);
//    $user = $statement->fetch(PDO::FETCH_ASSOC);
//    if (!empty($user)) {
//        $_SESSION["danger"] = "Этот эл. адрес уже занят другим пользователем.";
//        header("Location: page_register.php");
//        exit;
//    }
//    $sql = "INSERT INTO  login_table (email,password) VALUES (:email,:password)";
//    $statement = $pdo->prepare($sql);
//    $statement->execute([
//        "email" => $email,
//        "password" => password_hash($password, PASSWORD_DEFAULT),
//    ]);
//
//    $_SESSION["success"] = "Регистрация успешна";
//    header("Location: page_login.php");
//    exit;
//}

get_user($email,$password);