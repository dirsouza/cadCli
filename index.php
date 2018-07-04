<?php
setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");

define("PATH_VIEW", $_SERVER['DOCUMENT_ROOT'] . "/app/View");

require_once("vendor/autoload.php");

session_start();

use Slim\Slim;
use App\Controller\HomeController;
use App\Controller\LoginController;

$app = new Slim();
$app->config(array(
    'debug' => true,
    'mode' => 'development'
));

/**
 * Index
 * Url: http://www.cadcli.com.br/index
 */
$app->get('/', function() {
    HomeController::home();
});

$app->get('/login', function() {
    LoginController::actionViewLogin();
});

$app->post('/login', function() {
    print_r($_POST);
});

$app->get('/forgot', function() {
    LoginController::actionViewForgot();
});

$app->post('/forgot', function() {
    echo "E-mail enviado.";
});

$app->get('/admin', function() {
    echo 'Administrador';
});

$app->run();