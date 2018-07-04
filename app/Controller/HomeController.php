<?php

namespace App\Controller;

use App\Dao\LoginDao;
use App\Dao\UserDao;

class HomeController
{
    public static function home()
    {
        LoginDao::verifyLogin();

        if ($_SESSION[UserDao::SESSION]['desType'] == '1') {
            header("location: /admin");
            exit;
        }
    }
}