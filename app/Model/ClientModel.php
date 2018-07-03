<?php

namespace App\Model;

use Core\Helpers;

class ClientModel
{
    private $idClient;
    private $desName;
    private $idAddress;
    private $idContact;
    private $desEmail;
    private $dtBirthday;
    private $dtRegister;
    private $dtUpdate;

    /**
     * ClientModel constructor.
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
    public function getIdClient()
    {
        return $this->idClient;
    }

    /**
     * @param mixed $idClient
     */
    public function setIdClient($idClient): void
    {
        $this->idClient = $idClient;
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
    public function getIdAddress()
    {
        return $this->idAddress;
    }

    /**
     * @param mixed $idAddress
     */
    public function setIdAddress($idAddress): void
    {
        $this->idAddress = $idAddress;
    }

    /**
     * @return mixed
     */
    public function getIdContact()
    {
        return $this->idContact;
    }

    /**
     * @param mixed $idContact
     */
    public function setIdContact($idContact): void
    {
        $this->idContact = $idContact;
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
    public function getDtBirthday()
    {
        return $this->dtBirthday;
    }

    /**
     * @param mixed $dtBirthday
     */
    public function setDtBirthday($dtBirthday): void
    {
        $this->dtBirthday = $dtBirthday;
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