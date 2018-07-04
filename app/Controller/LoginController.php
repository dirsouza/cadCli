<?php

namespace App\Controller;

use App\Dao\LoginDao;
use Slim\Slim;

class LoginController
{
    public static function actionViewLogin()
    {
        $slim = new Slim();
        $slim->render('login/login.php');
    }

    public static function actionViewForgot()
    {
        $slim = new Slim();
        $slim->render('login/forgot.php');
    }

    public static function actionLogin(array $data)
    {
        $mUser = new UserModel($data);
        $dLogin = new LoginDao();
        $dLogin->login($mUser->getDesLogin(), $mUser->getDesPass());
    }
}