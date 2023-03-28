<?php


namespace App\controllers;
use App\exceptions\AccountIsBlockedException;
use App\exceptions\NotEnoughMoneyExceptions;
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
            $this->withdraw($vars['amount']);
        }catch (NotEnoughMoneyExceptions $exception){
            \Tamtamchik\SimpleFlash\flash()->error('Ваш баланс меньше чем' . $vars['amount']);
        }catch (AccountIsBlockedException $exception){
            \Tamtamchik\SimpleFlash\flash()->error('Ваш аккаунт временно заблокирован');
        }
        echo $this->templates->render('about', ['name' => 'THIS ABOUT']);

    }

     public function withdraw($amount = 1){
        $total = 10;

//        throw new AccountIsBlockedException('Ваш аккаунт в бане,выйди от сюда');

        if ($amount > $total){
            throw new NotEnoughMoneyExceptions('Нет денег' . $amount);
        }
    }
}



