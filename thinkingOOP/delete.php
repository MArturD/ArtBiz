<?php
include "function.php";
$db = include "database/start.php";
$id= $_GET['id'];
$post = $db ->delete("posts",$id);


header('Location: index.php');
?>