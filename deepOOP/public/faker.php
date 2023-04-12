<!--<!doctype html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="utf-8">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1">-->
<!--    <title>Faker</title>-->
<!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">-->
<!--</head>-->
<!--<body>-->
<!---->

<?php require_once "../vendor/autoload.php";

use App\QueryBuilder;
use Aura\SqlQuery\QueryFactory;
use JasonGrimes\Paginator;

//// use the factory to create a Faker\Generator instance
//$faker = Faker\Factory::create();
//// generate data by calling methods
//echo $faker->jobTitle();
//// 'Vince Sporer'
//echo $faker->email();
//// 'walter.sophia@hotmail.com'
//echo $faker->text(100);
//// 'Numquam ut mollitia at consequuntur inventore dolorem.'

$db = new QueryBuilder();
$pdo = $db->pdo;
//var_dump($pdo);
$queryFactory = new QueryFactory('mysql');

$insert = $queryFactory->newInsert();

//insert into this table
$insert->into('posts');



//for ($i=0; $i <30 ; $i++) {
//    $title = $faker->jobTitle();
//    $content = $faker->text();
//    $insert->cols([
//        'title'=> $title,
//        'content'=>$content
//    ]);
//    $insert->addRow();
//}

$sth = $pdo->prepare($insert->getStatement());
$sth->execute($insert->getBindValues());



?>
