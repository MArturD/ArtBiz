<?php
session_start();
include_once "classes/Config.php";
include_once "classes/Database.php";
include_once "classes/Cookie.php";
include_once "classes/Validate.php";
include_once "classes/Input.php";
include_once "classes/Token.php";
include_once "classes/Session.php";
include_once "test.php";
include_once "classes/User.php";
include_once "classes/Redirect.php";


//Database::getInstance()->insert('users', [
//	'username' => 'Marlin',
//	'password' => 'pass',
//]);
//Database::getInstance()->update('users', 5, [
//	'username' => 'Marlin2',
//	'password' => 'pass2',
//]);

$GLOBALS["config"] = [
    'mysql'   => [
        "host"      => "localhost",
        "username"  => "root",
        "password"  => "",
        "database"  => "marlin_clean_oop",
        "something" => [
            "no" => [
                "foo" => [
                    "bar" => "baz"
                ]
            ]
        ]
    ],
    'session' => [
        'token_name' => 'token',
        'user_session' => 'user'
    ],
    'cookie' => [
        'cookie_name' => 'hash',
        'cookie_expiry' => 604800,
    ]

];
if (Cookie::exists(Config::get('cookie.cookie_name')) && !Session::exists(Config::get('session.user_session'))){
    $hash = Cookie::get(Config::get('cookie.cookie_name'));
    $hashCheck = Database::getInstance()->get('user_session', ['hash', '=', $hash]);

    if ($hashCheck->count()){
        $user = new User($hashCheck->first()->user_id);
        $user->login();
    }
}

$users = Database::getInstance()->get('users', ['user_name', '=', 'Artur']);
//Database::getInstance()->delete('users', ['username', '=', 'name2']);


//if ($users->error()) {
//	echo "This Error";
//} else {
//	foreach ($users->result() as $user) {
//		echo $user["id"] . ". " . $user["username"] . "<br>";
//		//		echo $user . "<br>";
//	}
//}

//Redirect::to(404);





