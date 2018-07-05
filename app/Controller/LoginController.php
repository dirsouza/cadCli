<?php

namespace App\Controller;

use App\Model\UserModel;
use App\Dao\LoginDao;
use Slim\Slim;

class LoginController
{
    public static function actionViewLogin()
    {
        $slim = new Slim();
        $slim->render('login/login.php');
    }

    public static function actionLogin(array $data)
    {
        $mUser = new UserModel($data);
        $dLogin = new LoginDao();
        $dLogin->login($mUser->getDesLogin(), $mUser->getDesPass());
    }

    public static function actionLogout()
    {
        LoginDao::logout();
        header("location: /login");
        exit;
    }

    public static function actionViewForgot()
    {
        $slim = new Slim();
        $slim->render('login/forgot.php');
    }
}