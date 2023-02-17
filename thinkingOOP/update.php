<?php
include "function.php";
$db = include "database/start.php";
$id = $_GET['id'];
$post = $db ->update("posts", $_POST,$id);
var_dump($post);
var_dump($id);

