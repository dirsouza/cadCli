<?php

namespace App\Controller;

use App\Dao\LoginDao;
use App\Model\UserModel;
use Slim\Slim;

class LoginController
{
    public static function actionViewLogin()
    {
        $mUser = new UserModel($_SESSION[LoginDao::SESSION]);
        echo $mUser->getIdUser();
    }

    public static function actionLogin(array $data)
    {
        $mUser = new UserModel($data);
        $dLogin = new LoginDao();
        $dLogin->login($mUser->getDesLogin(), $mUser->getDesPass());
    }
}