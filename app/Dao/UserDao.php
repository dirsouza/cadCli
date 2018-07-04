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
        $sql = $this->db->prepare("SELECT a.idUser,
                                                   a.desLogin,
                                                   a.desPass,
                                                   a.desType,
                                                   a.dtRegister,
                                                   b.desName,
                                                   b.desEmail,
                                                   b.dtRegister,
                                                   b.dtUpdate
                                            FROM tbuser a
                                            INNER JOIN tbperson b
                                            USING (idUser)
                                            WHERE b.idUser = ?");
        $sql->execute([$id]);
        $result = $sql->fetchAll();

        if (count($result) > 0) {
            foreach ($result[0] as $key => &$value) {
                if ($key == 'dtRegister' || $key == 'dtUpdate') {
                    $date = new \DateTime($value);
                    $value = $date->format('d/m/Y');
                }
            }
            $_SESSION[self::SESSION] = $result[0];
        } else {
            throw new \Exception("Não foi possível recuperar os dados do Usuário.");
        }
    }
}