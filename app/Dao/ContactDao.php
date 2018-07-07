<?php

namespace App\Dao;

use App\Model\ContactModel;
use Core\Database;

class ContactDao extends Database
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
     * @param ContactModel $f
     * @return mixed
     */
    public function insert(ContactModel $f)
    {
        $fields = array(
            'desPhone' => $f->getDesPhone(),
            'desMobile' => $f->getDesMobile()
        );

        for ($i = 0; $i < count(array_keys($fields)); $i++) {
            $q[] = "?";
        }

        $sql = $this->db->prepare(
            "INSERT INTO tbcontact (" . implode(',', array_keys($fields)) . ") VALUES (" . implode(',', array_values($q)) . ")"
        );
        $sql->execute(array_values($fields));

        return $this->db->lastInsertId();
    }
}