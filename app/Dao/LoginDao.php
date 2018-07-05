<?php

namespace App\Dao;

use Core\Database;

class LoginDao extends Database
{
    /**
     * LoginDao constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Verifica se os dados de Usuário e Senha estão corretos.
     * @throws \Exception
     */
    public function login(string $user, string $pass)
    {
        $sql = $this->db->prepare("SELECT * FROM tbuser WHERE desLogin = ?");
        $sql->execute([$user]);
        $result = $sql->fetchAll();

        if (count($result) === 0) {
            throw new \Exception("Usuário ou senha incorreta.");
        }

        if (password_verify($pass, $result[0]['desPass'])) {
            $dUser = new UserDao();
            $dUser->getUser($result[0]['idUser']);

            if ($result[0]['desType'] == 1) {
                header('location: /admin');
                exit;
            }
        } else {
            throw new \Exception("Usuário ou senha incorreta.");
        }
    }

    /**
     * Destroi a sessão de login
     */
    public static function logout()
    {
        unset($_SESSION[UserDao::SESSION]);
    }

    /**
     * Verifica se a sessão do usuário ainda está ativa
     * @throws \Exception
     */
    public static function verifyLogin()
    {
        if (
            !isset($_SESSION[UserDao::SESSION]) ||
            empty($_SESSION[UserDao::SESSION]) ||
            !(int)$_SESSION[UserDao::SESSION]['idUser'] > 0
        ) {
            if (isset($_SESSION[UserDao::SESSION])) {
                LoginDao::logout();
                throw new \Exception("Usuário não está logado!");
            } else {
                header("location: /login");
                exit;
            }
        }
    }
}