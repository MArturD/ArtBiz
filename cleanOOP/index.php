<?php
include_once "init.php";
//var_dump($_SESSION);
//var_dump(Config::get('session.user_session'));

$user = new User;
echo Session::flash('success') . '<br>';
//$anotherUser = new User(28);
if($user->isLoggedIn()){
    echo "Привет, <a href='#'>{$user->data()->user_name}</a>";
    echo "<p><a href='logout.php'>Выйти</a></p>";
    echo "<p><a href='update.php'>Изменить имя</a><?>";
    echo "<p><a href='changepassword.php'>Изменить пароль</a><?>";

    if ($user->hasPermissions('moderator')){
        echo 'Вы модератор';
    }
//    var_dump(get('groups',['id', '=', '1']));

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