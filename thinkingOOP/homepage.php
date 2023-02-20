<?php
include_once "function.php";
$db = include "database/start.php";
$posts = $db ->getAll("posts");
include "index.view.php";
echo "страница homepage";