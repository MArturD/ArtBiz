<?php
$config = include "config.php";
include "database/QueryBuilder.php";
include "database/ConnectionBD.php";

//$connection = new Connection();
//$pdo = $connection ->make();
//$pdo = Connection::make();

return new QueryBuilder(Connection::make($config['database']));

