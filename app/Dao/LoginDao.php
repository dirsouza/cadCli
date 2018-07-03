<?php

namespace App\Dao;

use Core\Database;
use App\Model\UserModel;

class LoginDao extends Database
{
    const SESSION = "User";

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
            $_SESSION[self::SESSION] = $result[0];

            if ($_SESSION[self::SESSION]['desType'] == 1) {
                self::setUser();
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
        unset($_SESSION[self::SESSION]);
    }

    /**
     * Verifica se a sessão do usuário ainda está ativa
     * @throws \Exception
     */
    public static function verifyLogin()
    {
        if (
            !isset($_SESSION[self::SESSION]) ||
            !empty($_SESSION[self::SESSION]) ||
            (int)$_SESSION[self::SESSION]['idUser'] > 0
        ) {
            if (isset($_SESSION[self::SESSION])) {
                throw new \Exception("Usuário não está logado!");
            } else {
                header("location: /login");
                exit;
            }
        }
    }
}