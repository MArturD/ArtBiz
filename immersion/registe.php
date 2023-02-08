<?php
session_start();
require "functions.php";
$email = $_POST["email"];
$password = $_POST["password"];

creat_user($email,$password);