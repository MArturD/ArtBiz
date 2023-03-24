<?php
$this->layout('layout', ['title' => 'User Profile'])
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>User Profile</h1>
<p>Это Index</p>
<?=$this->section('content') ?>
<p>Hello, <?= $this->e($nameHome) ?></p>
<?php
foreach ($postsView as $post){
    echo $post['title'];
}
?>
</body>
</html>


