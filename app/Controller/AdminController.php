<?php

namespace App\Controller;

use Slim\Slim;

class AdminController
{
    public static function actionViewHome()
    {
        $slim = new Slim();
        $slim->render('admin/home/index.php');
    }
}