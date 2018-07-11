<?php

namespace App\Dao;

use App\Model\AddressModel;
use Core\Database;

class AddressDao extends Database
{
    /**
     * ClientDao constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $sql = $this->db->prepare("SELECT * FROM tbaddress");
        $sql->execute();
        return $sql->fetchAll();
    }

    /**
     * @param AddressModel $f
     * @return mixed
     */
    public function insert(AddressModel $f)
    {
        $fields = array(
            'desZip' => $f->getDesZip(),
            'desStreet' => $f->getDesStreet(),
            'desNeighborhood' => $f->getDesNeighborhood(),
            'desCity' => $f->getDesCity(),
            'desState' => $f->getDesState()
        );

        foreach ($this->get() as $zipCode) {
            foreach ($zipCode as $field => $value) {
                if ($value == $fields['desZip']) {
                    return $zipCode['idAddress'];
                }
            }
        }

        for ($i = 0; $i < count(array_keys($fields)); $i++) {
            $q[] = "?";
        }

        $sql = $this->db->prepare(
            "INSERT INTO tbaddress (" . implode(',', array_keys($fields)) . ") VALUES (" . implode(',', array_values($q)) . ")"
        );
        $sql->execute(array_values($fields));

        return $this->db->lastInsertId();
    }
}