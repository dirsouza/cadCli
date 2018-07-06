<?php

namespace App\Dao;

use Core\Database;

class UserDao extends Database
{
    const SESSION = "User";

    /**
     * UserDao constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function getUser(int $id)
    {
        $sql = $this->db->prepare("SELECT * FROM vw_userperson WHERE idUser = ?");
        $sql->execute([$id]);
        $result = $sql->fetchAll();

        if (count($result) > 0) {
            $_SESSION[self::SESSION] = $result[0];
        } else {
            throw new \Exception("Não foi possível recuperar os dados do Usuário.");
        }
    }
}