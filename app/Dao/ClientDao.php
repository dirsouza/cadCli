<?php

namespace App\Dao;

use App\Model\ClientModel;
use Core\Database;
use Core\Helpers;

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
     * Retorna os dados contidos no banco
     * @return array
     */
    public function get()
    {
        $sql = $this->db->prepare("SELECT * FROM vw_clientlist");
        $sql->execute();
        return $sql->fetchAll();
    }

    /**
     * Retorna os dados contidos no banco referente a um ID
     * @param int $id
     * @return array
     */
    public function getId(int $id)
    {
        $sql = $this->db->prepare("SELECT * FROM vw_clientlist WHERE idClient = ?");
        $sql->execute([$id]);
        return $sql->fetchAll();
    }

    /**
     * Inseri os dados no banco
     * @param ClientModel $f
     * @return mixed
     */
    public function insert(ClientModel $f)
    {
        $fields = array(
            'desName' => $f->getDesName(),
            'idAddress' => $f->getIdAddress(),
            'desNumber' => $f->getDesNumber(),
            'desComplement' => $f->getDesComplement(),
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

    /**
     * Valida se alguma informação a ser inserida no banco é única
     * @param ClientModel $f
     * @return bool
     */
    public function verifyData(ClientModel $f, array $fields)
    {
        $rule = $f->rules();
        $result = $this->get();

        foreach ($result as $key) {
            foreach ($rule['unique'] as $r => $value) {
                if ($key[$value] === $f->{'get' . ucfirst($value)}()) {
                    $helper = new Helpers();
                    $helper->setErrors("A informção do campo <b>" . ucfirst(preg_replace(['/des/', '/dt/'], '', $value)) . "</b> já consta no banco de dados.");
                    $helper->sessionErro($_SERVER['REQUEST_URI'], $fields);
                }
            }
        }
    }
}