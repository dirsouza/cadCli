<?php
setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");

define("PATH_VIEW", $_SERVER['DOCUMENT_ROOT'] . "/app/View");

require_once("vendor/autoload.php");

session_start();

use Slim\Slim;
use App\Controller\LoginController;

$app = new Slim();
$app->config(array(
    'debug' => true,
    'templates.path' => 'app/View',
    'mode' => 'development'
));

/**
 * Index
 * Url: http://www.cadcli.com.br/index
 */
$app->get('/', function() use ($app) {
    LoginController::actionLogin(array(
        'desLogin' => 'admin',
        'desPass' => 'admin',
        'desType' => '1'
    ));
});

$app->get('/admin', function() {
    LoginController::actionViewLogin();
});

$app->run();