<?php

namespace App\Dao;

use App\Model\ClientModel;
use Core\Database;

class ClientDao extends Database
{
    /**
     * ClientDao constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param ClientModel $f
     * @return mixed
     */
    public function insert(ClientModel $f)
    {
        $fields = array(
            'desName' => $f->getDesName(),
            'idAddress' => $f->getIdAddress(),
            'idContact' => $f->getIdContact(),
            'desEmail' => $f->getDesEmail(),
            'dtBirthday' => $f->getDtBirthday()
        );

        for ($i = 0; $i < count(array_keys($fields)); $i++) {
            $q[] = "?";
        }

        $sql = $this->db->prepare(
            "INSERT INTO tbclient (" . implode(',', array_keys($fields)) . ") VALUES (" . implode(',', array_values($q)) . ")"
        );
        $sql->execute(array_values($fields));
    }

    public function get()
    {
        $sql = $this->db->prepare("SELECT * FROM vw_clientlist");
        $sql->execute();
        $result = $sql->fetchAll();

        return $result;
    }
}