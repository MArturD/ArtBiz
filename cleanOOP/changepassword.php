<?php
include_once 'init.php';
$user = new User;

$validate = new Validate();
$validate -> check($_POST, [
    'current_password' => ['required' => true, 'min'=>3],
    'new_password' => ['required' => true, 'min'=>3],
    'new_password_again' => ['required' => true, 'min'=>3, 'matches' => 'new_password'],
]);

if (Input::exists()){
    if (Token::check(Input::get('token'))){
        if ($validate->passed()){

            if (password_verify(Input::get('current_password'), $user->data()->password)){
                $user->update(['password' => password_hash(Input::get('new_password'), PASSWORD_DEFAULT)]);
                Session::flash('success', 'Password has been updated');
                Redirect::to('index.php');
            }else{
                echo 'Invalid current password';
            }
        }else{
            foreach ($validate->errors() as $error){
                echo $error . '<br>';
            }
        }
    }
}

?>

<form action="" method="post">
    <div class="field">
        <label for="current_password">Password</label>
        <input type="text" name="current_password">
    </div>
    <div class="field">
        <label for="new_password">New Password</label>
        <input type="text" name="new_password">
    </div>
    <div class="field">
        <label for="new_password_again">Password again</label>
        <input type="text" name="new_password_again">
    </div>
    <input type="hidden1" name="token" value="<?php echo Token::generate() ?>">

    <div class="field">
        <button type="submit">Submit</button>
    </div>
</form>
