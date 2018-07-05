<?php
use App\Controller\AdminController;

$app->group('/admin', function() use ($app) {
    $app->get('/', function() {
        AdminController::actionViewHome();
    });
});