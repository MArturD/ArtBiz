<?php
include_once "init.php";


$user = new User;

$validate = new Validate();
$validate -> check($_POST, [
    'user_name' => ['required' => true, 'min'=>2]
]);

if (Input::exists()){
    if (Token::check(Input::get('token'))){
        if ($validate->passed()){
            $user->update(['user_name' => Input::get('user_name')]);
            Redirect::to('update.php');
        }else{
            foreach ($validate->errors() as $error){
                echo $error . '<br>';
            }
        }
    }
}
//var_dump($_POST);
?>

<form action="" method="post">
    <div class="field">
        <label for="user_name">Email</label>
        <input type="text" name="user_name" value="<?php echo $user->data()->user_name; ?>">
    </div>
    <input type="hidden1" name="token" value="<?php echo Token::generate() ?>">

    <div class="field">
        <button type="submit">Submit</button>
    </div>
</form>
