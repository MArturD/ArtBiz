<?php


namespace App\controllers;
use App\exceptions\AccountIsBlockedException;
use App\exceptions\NotEnoughMoneyExceptions;
use App\QueryBuilder;
use Exception;
use League\Plates\Engine;
use PDO;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


class HomeController{
    private $templates, $pdo, $auth, $db;
    public function __construct(QueryBuilder $db){
        $this->db = $db;
        $this->templates = new Engine('../app/views');
        $this->pdo = new PDO("mysql:host=localhost;dbname=app3;", "root", "");
        $this->auth = new \Delight\Auth\Auth($this->pdo);

    }

    public function index(){

//        $db = new QueryBuilder(); // замена
//        $this->auth->logOut();
//        d($this->db);
        $this->auth->login('12113qwe@gmail.com', '1122');
        d($this->auth->getRoles());
        $this->auth->admin()->addRoleForUserById(3, \Delight\Auth\Role::ADMIN);

        $posts = $this->db->getAll('posts');

        echo $this->templates->render('homepage', ['postsView' => $posts]);

        echo $this->auth->getUsername();

    }

    public function about($vars){


        try {
            $userId = $this->auth->register('12113qwe@gmail.com', '1122', 'Artur22', function ($selector, $token) {
                echo 'Send ' . $selector . ' and ' . $token . ' to the user (e.g. via email)';
                echo '  For emails, consider using the mail(...) function, Symfony Mailer, Swiftmailer, PHPMailer, etc.';
                echo '  For SMS, consider using a third-party service and a compatible SDK';
            });

            echo 'We have signed up a new user with the ID ' . $userId;
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
            die('Invalid email address');
        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
            die('Invalid password');
        }
        catch (\Delight\Auth\UserAlreadyExistsException $e) {
            die('User already exists');
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            die('Too many requests');
        }
//        try {
//            $this->withdraw($vars['amount']);
//        }catch (NotEnoughMoneyExceptions $exception){
//            \Tamtamchik\SimpleFlash\flash()->error('Ваш баланс меньше чем' . $vars['amount']);
//        }catch (AccountIsBlockedException $exception){
//            \Tamtamchik\SimpleFlash\flash()->error('Ваш аккаунт временно заблокирован');
//        }
        echo $this->templates->render('about', ['name' => 'THIS ABOUT']);

    }

     public function withdraw($amount = 1){
        $total = 10;

//        throw new AccountIsBlockedException('Ваш аккаунт в бане,выйди от сюда');

        if ($amount > $total){
            throw new NotEnoughMoneyExceptions('Нет денег' . $amount);
        }
    }

    public function email_verification(){
        try {
            $this->auth->confirmEmail('PGFU3f8lNiFL5CE_', 'nmvTqNqzkEM4D6TN');

            echo 'Email address has been verified';
        }
        catch (\Delight\Auth\InvalidSelectorTokenPairException $e) {
            die('Invalid token');
        }
        catch (\Delight\Auth\TokenExpiredException $e) {
            die('Token expired');
        }
        catch (\Delight\Auth\UserAlreadyExistsException $e) {
            die('Email address already exists');
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            die('Too many requests');
        }
    }

    public function login(){
        try {
            $this->auth->login('12113qwe@gmail.com', '1122');

            echo 'User is logged in';
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
            die('Wrong email address');
        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
            die('Wrong password');
        }
        catch (\Delight\Auth\EmailNotVerifiedException $e) {
            die('Email not verified');
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            die('Too many requests');
        }
    }

    public function mailer(){

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.yandex.ru';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'Gidrol126@yandex.ru';                     //SMTP username
            $mail->Password   = '*******';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('Gidrol126@yandex.ru', 'Mailer');
            $mail->addAddress('SQUADCC12@yandex.ru', 'Artur Gidrol');     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Artur Gidrol';
            $mail->Body    = 'Misht <b>Hay</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}



