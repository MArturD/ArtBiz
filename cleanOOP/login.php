<?php
session_start();
include_once "init.php";

if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validation = $validate->check($_POST, [
            'email' => [
                'required' => true,
                'min' => 2,
                'max' => 35,
            ],
            'password' => [
                'required' => true,
                'min' => 3,
            ],
        ]);

        //	var_dump($validation->errors());

        if ($validation->passed()){
            $user = new User();
            $login = $user->login(Input::get('email'), Input::get('password'));

            if ($login){
                echo 'Успешный логин';
            }else{
                echo 'Не успешный логин';
            }
        } else {
            foreach ($validation->errors() as $error) {
                echo $error . '<br>';
            }
        }
    }
}

?>


<form action="" method="post">
    <div class="field">
        <label for="email">Email</label>
        <input type="email" name="email" value="<?php echo Input::get('email'); ?>">
    </div>
    <div class="field">
        <label for="password">Password</label>
        <input type="text" name="password">
    </div>
    <div class="field">
        <label for="checkbox">Запомнить меня</label>
        <input type="checkbox" name="remember">
    </div>
    <input type="hidden1" name="token" value="<?php echo Token::generate() ?>">
    <div class="field">
        <button type="submit">Submit</button>
    </div>
</form>