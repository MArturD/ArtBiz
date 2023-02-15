<?php
include "function.php";
$db = include "database/start.php";

$posts = $db ->getAllPosts();
include "index.view.php";

?>
