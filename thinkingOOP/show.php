<?php
include "function.php";
$db = include "database/start.php";
$id = $_GET['id'];
$post = $db ->getOne("posts", $id);
var_dump($post);
?>
<h1><?php echo $post["title"]; ?></h1>