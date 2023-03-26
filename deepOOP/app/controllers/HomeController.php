<?php


namespace App\controllers;
use App\QueryBuilder;
use Exception;
use League\Plates\Engine;





class HomeController{
    private $templates;
    public function __construct(){
        $this->templates = new Engine('../app/views');
    }

    public function index($vars){

        $db = new QueryBuilder();

        $posts = $db->getAll('posts');

        echo $this->templates->render('homepage', ['postsView' => $posts]);

    }

    public function about($vars){

        try {
            $this->withdraw(15);
        }catch (Exception $exception){
            \Tamtamchik\SimpleFlash\flash()->error($exception->getMessage());
        }
        echo $this->templates->render('about', ['name' => 'THIS ABOUT']);

    }

     public function withdraw($amount = 1){
        $total = 10;

        if ($amount > $total){
            throw new Exception('Нет денег');
        }
    }
}



