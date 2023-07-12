<?php

use Router\Router;
use App\Exceptions\NotFoundException;

require '../vendor/autoload.php';


define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('ACCESS', dirname($_SERVER['SCRIPT_NAME']) . 'assets/');


define('STRIPE_API_KEY', 'sk_test_51NBWfmJnaR8BBMgbib2WfoonHENEaOGy623dS669i0S4dsIFxHbb3wkogrn5k2LSPLpxJfScjrWqnTAcWzEWskVR00lKhUi3ri');
define('STRIPE_PUBLISHABLE_KEY', 'pk_test_51NBWfmJnaR8BBMgbad4VfLRnnTybklrQGI60dIaJ1qGh8Q1njJsFLLea4hp5YyQe8vC4fKEBs3WrJW3qskTocc2D009AYHKyaw');
define('STRIPE_SUCCESS_URL', 'http://wicookin_web_app.test/payment/success'); //Payment success URL 
define('STRIPE_CANCEL_URL', 'http://wicookin_web_app.test/payment/cancel'); //Payment cancel URL 

define('DB_NAME', 'wicookin');
define('DB_HOST', '51.75.200.114:3307');
define('DB_USER', 'debian');
define('DB_PWD', 'Wicookin2023');

$router = new Router($_GET['url']);

$router->get('/', 'App\Controllers\HomeController@welcome');
$router->get('/menu', 'App\Controllers\HomeController@menu');
$router->get('/events', 'App\Controllers\HomeController@events');
$router->get('/chefs', 'App\Controllers\HomeController@chefs');
$router->get('/contact', 'App\Controllers\HomeController@contact');
$router->get('/profile', 'App\Controllers\UserController@profile');
$router->get('/dashboard', 'App\Controllers\HomeController@dashboard');
$router->get('/subscription', 'App\Controllers\HomeController@subscription');
$router->get('/subscription/free', 'App\Controllers\SubscriptionController@free');
$router->get('/subscription/free/monthly', 'App\Controllers\SubscriptionController@freeMonthly');
$router->get('/subscription/free/yearly', 'App\Controllers\SubscriptionController@freeYearly');
$router->get('/subscription/starter', 'App\Controllers\SubscriptionController@starter');
$router->get('/subscription/starter/monthly', 'App\Controllers\SubscriptionController@starterMonthly');
$router->get('/subscription/starter/yearly', 'App\Controllers\SubscriptionController@starterYearly');
$router->get('/subscription/master', 'App\Controllers\SubscriptionController@master');
$router->get('/subscription/master/monthly', 'App\Controllers\SubscriptionController@masterMonthly');
$router->get('/subscription/master/yearly', 'App\Controllers\SubscriptionController@masterYearly');

$router->get('/payment/success', 'App\Controllers\PaymentController@success');
$router->get('/payment/cancel', 'App\Controllers\PaymentController@cancel');


$router->post('/profile/edit-profile', 'App\Controllers\UserController@editProfile');
$router->post('/profile/change-password', 'App\Controllers\UserController@changePassword');

$router->get('/register', 'App\Controllers\AuthController@register');
$router->post('/register', 'App\Controllers\AuthController@registerPost');

$router->get('/login', 'App\Controllers\AuthController@login');
$router->post('/login', 'App\Controllers\AuthController@loginPost');


$router->get('/confirmation', 'App\Controllers\AuthController@confirmation');


$router->get('/logout', 'App\Controllers\AuthController@logout');



try {
    $router->run();
} catch (NotFoundException $e) {
    echo ('404 Not Found');
}
