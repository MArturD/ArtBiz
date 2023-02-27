<?php
include_once "Database.php";
//$users = Database::getInstance()->query("SELECT * FROM users WHERE user_name IN (? , ?)", ['Artur','Dima']);
$users = Database::getInstance()->get('users', ['user_name', '=', "Artur"]);
//$users = Database::getInstance()->delete('users', ['user_name', '=', "Dima"]);

//var_dump($users);


if ($users->error()){
    echo "This error";
}else{
    foreach ($users->result() as $user){
        echo $user['id'] . $user['user_name'] . "<br>";
    }
}