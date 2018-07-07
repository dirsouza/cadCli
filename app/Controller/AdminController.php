<?php

namespace App\Controller;

use App\Dao\LoginDao;
use App\Dao\UserDao;
use App\Model\PersonModel;
use Core\Config;
use Slim\Slim;

class AdminController
{
    public static function actionViewHome()
    {
        LoginDao::verifyLogin();
        $mPerson = new PersonModel($_SESSION[UserDao::SESSION]);
        $system = Config::getConfig('system');

        $slim = new Slim();
        $slim->render('admin/template/header.php', array(
            'desName' => $mPerson->getDesName(),
            'desPhoto' => $mPerson->getDesPhoto(),
            'dtRegister' => $mPerson->getDtRegister()
        ));
        $slim->render('admin/home/index.php');
        $slim->render('admin/template/footer.php', array(
            'version' => $system['version'],
            'abbrev' => $system['abbrev'],
            'name' => $system['name']
        ));
    }
}