<?php
include_once "init.php";
//var_dump($_SESSION);
//var_dump(Config::get('session.user_session'));

$user = new User;
$anotherUser = new User(28);

if ($user->isLoggedIn){

}else{

}