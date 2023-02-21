<?php
include_once "Database.php";
$users = Database::getInstance()->query("SELECT * FROM users");
//var_dump($users);


if ($users->error()){
    echo "This error";
}else{
    foreach ($users->result() as $user){
        echo $user['id'] . ['user_name'] . "<br>";
    }
}