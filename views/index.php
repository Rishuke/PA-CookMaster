<?php
use Router\Router;
use App\Exceptions\NotFoundException;

require '../vendor/autoload.php';

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('ACCESS', dirname($_SERVER['SCRIPT_NAME']) . 'assets/');
// define('ACCESS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR);
// define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);
define('DB_NAME', 'wicookin');
define('DB_HOST', 'localhost:49215');
define('DB_USER', 'root');
define('DB_PWD', 'Wicookin2023@root');

$router = new Router($_GET['url']);

$router->get('/', 'App\Controllers\HomeController@welcome');

$router->get('/register', 'App\Controllers\UserController@register');
$router->post('/register', 'App\Controllers\UserController@registerPost');

$router->get('/login', 'App\Controllers\UserController@login');
$router->post('/login', 'App\Controllers\UserController@loginPost');

$router->get('/logout', 'App\Controllers\UserController@logout');



try {
    $router->run();
} catch (NotFoundException $e) {
     echo ('404 Not Found');
}