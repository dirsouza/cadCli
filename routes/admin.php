<?php

use App\Controller\AdminController;
use App\Controller\ClientController;

$app->group('/admin', function() use ($app) {
    $app->get('/', function() {
        AdminController::actionViewHome();
    });

    $app->group('/client', function() use ($app) {
        $app->get('/', function() {
            ClientController::actionList();
        });

        $app->group('/create', function() use ($app) {
            $app->get('/', function() {
                ClientController::actionFormCreate();
            });

            $app->post('/', function() {
                ClientController::actionFormCreate($_POST);
            });
        });
    });
});