<?php
$config = include_once "config.php";
include_once "database/QueryBuilder.php";
include_once "database/ConnectionBD.php";

//$connection = new Connection();
//$pdo = $connection ->make();
//$pdo = Connection::make();

return new QueryBuilder(Connection::make($config['database']));

