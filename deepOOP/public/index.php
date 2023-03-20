<?php


if( !session_id() ) {
    session_start();
}

require '../vendor/autoload.php';

//if ($_SERVER['REQUEST_URI'] == '/deepOOP/public/home'){
//    require '../app/controllers/homepage.php';
//
//};


\Tamtamchik\SimpleFlash\flash()->message("kufjg");
// Create new Plates instance
$templates = new League\Plates\Engine('../app/views');

// Render a template
echo $templates->render('homepage', ['name' => 'Artur']);

//d($templates);