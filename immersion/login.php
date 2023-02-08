<?php
session_start();
require "functions.php";
$email = $_POST["email"];
$password = $_POST["password"];

var_dump($email,$password);

login($email,$password);
