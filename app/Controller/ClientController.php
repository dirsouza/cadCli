<?php

namespace App\Controller;

use App\Dao\AddressDao;
use App\Dao\ClientDao;
use App\Dao\ContactDao;
use App\Dao\LoginDao;
use App\Dao\UserDao;
use App\Model\AddressModel;
use App\Model\ClientModel;
use App\Model\ContactModel;
use App\Model\PersonModel;
use Core\Config;
use Slim\Slim;

class ClientController
{
    public static function actionList()
    {
        LoginDao::verifyLogin();
        $mPerson = new PersonModel($_SESSION[UserDao::SESSION]);
        $dClient = new ClientDao();
        $system = Config::getConfig('system');

        $slim = new Slim();
        $slim->render('admin/template/header.php', array(
            'desName' => $mPerson->getDesName(),
            'desPhoto' => $mPerson->getDesPhoto(),
            'dtRegister' => $mPerson->getDtRegister()
        ));
        $slim->render('admin/client/index.php', array(
            'clients' => $dClient->get()
        ));
        $slim->render('admin/template/footer.php', array(
            'version' => $system['version'],
            'abbrev' => $system['abbrev'],
            'name' => $system['name']
        ));
    }

    public static function actionFormCreate(array $data = array())
    {
        LoginDao::verifyLogin();

        if (empty($data)) {
            $mPerson = new PersonModel($_SESSION[UserDao::SESSION]);
            $system = Config::getConfig('system');

            $slim = new Slim();
            $slim->render('admin/template/header.php', array(
                'desName' => $mPerson->getDesName(),
                'desPhoto' => $mPerson->getDesPhoto(),
                'dtRegister' => $mPerson->getDtRegister()
            ));
            $slim->render('admin/client/create.php');
            $slim->render('admin/template/footer.php', array(
                'version' => $system['version'],
                'abbrev' => $system['abbrev'],
                'name' => $system['name']
            ));
        } else {
            $i = [
                'idAddress' => 1,
                'idContact' =>1
            ];

            $mV = new ClientModel($data+$i);
            $dV = new ClientDao();
            $dV->verifyData($mV, $data);

            $mAddress = new AddressModel($data);
            $dAddress = new AddressDao();
            $id['idAddress'] = $dAddress->insert($mAddress);

            $mContact = new ContactModel($data);
            $dContact = new ContactDao();
            $id['idContact'] = $dContact->insert($mContact);

            $mClient = new ClientModel($data+$id);
            $dClient = new ClientDao();
            $dClient->insert($mClient);

            header("location: /admin/client");
            exit;
        }
    }

    public static function actionFormUpdate(array $data = array(), int $id)
    {
        LoginDao::verifyLogin();

        if (empty($data)) {
            $mPerson = new PersonModel($_SESSION[UserDao::SESSION]);
            $system = Config::getConfig('system');

            $dC = new ClientDao();
            $result = $dC ->getId($id);

            print_r($result[0]); exit;

            $slim = new Slim();
            $slim->render('admin/template/header.php', array(
                'desName' => $mPerson->getDesName(),
                'desPhoto' => $mPerson->getDesPhoto(),
                'dtRegister' => $mPerson->getDtRegister()
            ));
            $slim->render('admin/client/create.php');
            $slim->render('admin/template/footer.php', array(
                'version' => $system['version'],
                'abbrev' => $system['abbrev'],
                'name' => $system['name']
            ));
        } else {
            $mAddress = new AddressModel($data);
            $dAddress = new AddressDao();
            $id['idAddress'] = $dAddress->insert($mAddress);

            $mContact = new ContactModel($data);
            $dContact = new ContactDao();
            $id['idContact'] = $dContact->insert($mContact);

            $mClient = new ClientModel($data+$id);
            $dClient = new ClientDao();
            $dClient->insert($mClient);

            header("location: /admin/client");
            exit;
        }
    }
}