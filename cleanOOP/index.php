<?php
include_once "init.php";
//var_dump($_SESSION);
//var_dump(Config::get('session.user_session'));

$user = new User;
//$anotherUser = new User(28);

echo $user->data()->user_name;
var_dump($user->data());

//if ($user->isLoggedIn()){
//
//}else{
//
//}