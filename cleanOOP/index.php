<?php
include_once "Config.php";
include_once "Database.php";
include_once "Validate.php";
include_once "Input.php";
//$users = Database::getInstance()->query("SELECT * FROM users WHERE user_name IN (? , ?)", ['Artur','Dima']);
//$users = Database::getInstance()->get('users', ['user_name', '=', "Artur"]);
//$users = Database::getInstance()->delete('users', ['user_name', '=', "Dima"]);
//Database::getInstance()->insert('users', [
//    "user_name" => "Dima",
//    "password" => "321321"
//]);
//$id = 3;
//Database::getInstance()->update('users', $id, [
//    "user_name" => "Misha",
//    "password" => "000"
//]);

$GLOBALS["config"] = [
    'mysql' => [
        "host" => "localhost",
        "username" => "root",
        "password" => "",
        "database" => "marlin_clean_oop",
        "something" => [
            "no" => [
                "foo" => [
                    "bar" => [
                        "bar" => "baz"
                    ]
                ]
            ]
        ]
    ]
];

$users = Database::getInstance()->get('users', ['user_name', '=', 'Artur']);

//var_dump($users->first());


if ($users->error()){
    echo "This error";
}else{
    foreach ($users->result() as $user){
        echo $user['id'] . $user['user_name'] . "<br>";
    }
}

?>

<?php

if (Input::exists()){
    $validate = new Validate();

    $validation = $validate->check($_POST, [
            'username' =>[
                    'required' => true,
                    'min' => 2,
                    'max' => 15,
                    'unique' => 'users',
            ],
            'password' => [
                    'required' => true,
                    'min' => 3,
            ],
            'password_again' => [
                    'required' => true,
                    'matches' => 'password'
            ]
    ]);
    if ($validation->passed()){
        echo 'passed';
    }else{
        foreach ($validation->errors() as $error){
            echo $error . "<br>";
        }
    }
}

?>
<form action="#" method="post">
    <labbel>Имя
    <input type="text" name="username" value="<?php echo Input::get('username')?>">
    </labbel> <br>
    <labbel>Пароль
        <input type="text" name="password">
    </labbel> <br>
    <labbel>Повторите Пароль
        <input type="text" name="password_again">
    </labbel> <br>
    <button type="submit">Отправить</button>
</form>
