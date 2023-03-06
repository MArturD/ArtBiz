<?php
require_once "init.php";

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
            'email'          => [
                'required' => true,
                'email'    => true,
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

        if ($validation->passed()) {

            $user = new User();
            $user->create([
                'user_name' => Input::get('user_name'),
                'email'    => Input::get('email'),
                'password' => password_hash(Input::get('password'), PASSWORD_DEFAULT)
            ]);

            Session::flash('success', 'user register done');
            //			header('Location: test.php');
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
        <label for="username">Username</label>
        <input type="text" name="user_name" value="<?php echo Input::get('user_name'); ?>">
    </div>
    <div class="field">
        <label for="email">Email</label>
        <input type="text" name="email" value="<?php echo Input::get('email'); ?>">
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
