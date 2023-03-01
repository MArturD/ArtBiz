<?php
session_start();
include_once "Config.php";
include_once "Database.php";
include_once "Validate.php";
include_once "Input.php";
include_once "Token.php";
include_once "Session.php";
include_once "test.php";
include_once "User.php";
include_once "Redirect.php";

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
    ]
];


$users = Database::getInstance()->get('users', ['username', '=', 'Marlin']);
//Database::getInstance()->delete('users', ['username', '=', 'name2']);


//if ($users->error()) {
//	echo "This Error";
//} else {
//	foreach ($users->result() as $user) {
//		echo $user["id"] . ". " . $user["username"] . "<br>";
//		//		echo $user . "<br>";
//	}
//}

Redirect::to(404);

if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validation = $validate->check($_POST, [
            'user_name'       => [
                'required' => true,
                'min'      => 2,
                'max'      => 15,
                'unique'   => 'users'
            ],
            'password'       => [
                'required' => true,
                'min'      => 3,
            ],
            'password_again' => [
                'required' => true,
                'matches'  => 'password'
            ],
        ]);

        //	var_dump($validation->errors());

        if ($validation->passed()){
            $user = new User;

            $user->create([
                    'user_name' => Input::get('user_name'),
                    'password' => password_hash(Input::get('password'), PASSWORD_DEFAULT)
            ]);
            Session::flash('success', 'register success');
            Redirect::to('test.php');
//            header('Location: test.php');
        } else {
            foreach ($validation->errors() as $error) {
                echo $error . '<br>';
            }
        }
    }

}

?>


<form action="" method="post">
       <?php echo Session::flash('success'); ?>
    <div class="field">
        <label for="user_name">Username</label>
        <input type="text" name="user_name" value="<?php echo Input::get('user_name'); ?>">
    </div>
    <div class="field">
        <label for="password">Password</label>
        <input type="text" name="password">
    </div>
    <div class="field">
        <label for="password_again">Password again</label>
        <input type="text" name="password_again">
    </div>
    <input type="hidden1" name="token" value="<?php echo Token::generate() ?>">

    <div class="field">
        <button type="submit">Submit</button>
    </div>
</form>
