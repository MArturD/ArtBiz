<?php
use App\QueryBuilder;

if (!session_id()) {
    session_start();
}

require '../vendor/autoload.php';

//if ($_SERVER['REQUEST_URI'] == '/deepOOP/public/home'){
//    require '../app/controllers/HomeController.php';
//
//};


//\Tamtamchik\SimpleFlash\flash()->message("ОШИБКА ПЕРЕСТАНЬ ПРОГРАММИРОВАТЬ", 'success');
//// Create new Plates instance
//$templates = new League\Plates\Engine('../app/views');
//
//// Render a template
//echo $templates->render('homepage', ['name' => 'Artur']);
//
//d($templates);


$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/deepOOP/public/home', ['App\controllers\HomeController', 'index']);
    $r->addRoute('GET', '/deepOOP/public/about', ['App\controllers\HomeController', 'about']);
    // {id} must be a number (\d+)
    $r->addRoute('GET', '/deepOOP/user/{id:\d+}', ['App\controllers\HomeController', 'index']);
    // The /{title} suffix is optional
    $r->addRoute('GET', '/deepOOP/articles/{id:\d+}[/{title}]', 'get_article_handler');
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];

        $controller = new $handler[0];

        call_user_func([$controller, $handler[1]], $vars);
        break;
}

function get_all_users_handler()
{
    echo 123;
}

function get_user_handler()
{
    echo 4321;
}


