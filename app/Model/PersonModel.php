<?php

namespace App\Model;

use Core\Helpers;

class PersonModel
{
    private $idPerson;
    private $idUser;
    private $desName;
    private $desEmail;
    private $dtRegister;
    private $dtUpdate;

    /**
     * PersonModel constructor.
     * @param array $data
     * @throws \Exception
     */
    public function __construct(array $data)
    {
        $helpers = new Helpers();
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                if ($helpers->catchErrors($key, $value)) {
                    $this->{$method}(trim($value));
                }
            }
        }

        if (!empty($helpers->getErrors())) {
            throw new \Exception("Existem campos vazios.");
        }
    }

    /**
     * @return mixed
     */
    public function getIdPerson()
    {
        return $this->idPerson;
    }

    /**
     * @param mixed $idPerson
     */
    public function setIdPerson($idPerson): void
    {
        $this->idPerson = $idPerson;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param mixed $idUser
     */
    public function setIdUser($idUser): void
    {
        $this->idUser = $idUser;
    }

    /**
     * @return mixed
     */
    public function getDesName()
    {
        return $this->desName;
    }

    /**
     * @param mixed $desName
     */
    public function setDesName($desName): void
    {
        $this->desName = $desName;
    }

    /**
     * @return mixed
     */
    public function getDesEmail()
    {
        return $this->desEmail;
    }

    /**
     * @param mixed $desEmail
     */
    public function setDesEmail($desEmail): void
    {
        $this->desEmail = $desEmail;
    }

    /**
     * @return mixed
     */
    public function getDtRegister()
    {
        return $this->dtRegister;
    }

    /**
     * @param mixed $dtRegister
     */
    public function setDtRegister($dtRegister): void
    {
        $this->dtRegister = $dtRegister;
    }

    /**
     * @return mixed
     */
    public function getDtUpdate()
    {
        return $this->dtUpdate;
    }

    /**
     * @param mixed $dtUpdate
     */
    public function setDtUpdate($dtUpdate): void
    {
        $this->dtUpdate = $dtUpdate;
    }
}