<?php
include_once "init.php";
//var_dump($_SESSION);
//var_dump(Config::get('session.user_session'));

$user = new User;

//$anotherUser = new User(28);
if($user->isLoggedIn()){
    echo "Привет, <a href='#'>{$user->data()->user_name}</a>";
    echo "<p><a href='logout.php'>Выйти</a></p>";
}else{
    echo "<a href='login.php'>Вход</a> или <a href='register.php'>Зарегестрироваться</a>";
}
//var_dump($user);

//echo $user->data()->user_name;
//var_dump($user->data());

//if ($user->isLoggedIn()){
//
//}else{
//
//}