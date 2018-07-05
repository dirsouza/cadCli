<?php
use App\Controller\LoginController;

$app->get('/login', function() {
    LoginController::actionViewLogin();
});

$app->post('/login', function() {
    LoginController::actionLogin($_POST);
    unset($_POST);
});

$app->get('/logout', function() {
    LoginController::actionLogout();
});

$app->get('/forgot', function() {
    LoginController::actionViewForgot();
});

$app->post('/forgot', function() {
    echo "E-mail enviado.";
});