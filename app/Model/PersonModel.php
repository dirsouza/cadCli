<?php

namespace App\Model;

use Core\Helpers;

class PersonModel
{
    private $idPerson;
    private $idUser;
    private $desName;
    private $desEmail;
    private $desPhoto;
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
                if ($helpers->catchErrors((string)$key, (string)$value, self::rules())) {
                    $this->{$method}(trim($value));
                }
            }
        }

        if (!empty($helpers->getErrors())) {
            throw new \Exception("Existem campos vazios." . $helpers->getErrors());
        }
    }

    /**
     * Regras
     * @return array
     */
    private function rules()
    {
        return array(
            'required' => array('idPerson', 'idUser', 'desName', 'desEmail'),
            'unique' => array('desEmail')
        );
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
    public function setIdPerson($idPerson)
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
    public function setIdUser($idUser)
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
    public function setDesName($desName)
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
    public function setDesEmail($desEmail)
    {
        $this->desEmail = $desEmail;
    }

    /**
     * @return mixed
     */
    public function getDesPhoto()
    {
        return $this->desPhoto;
    }

    /**
     * @param mixed $desPhoto
     */
    public function setDesPhoto($desPhoto)
    {
        $this->desPhoto = $desPhoto;
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
    public function setDtRegister($dtRegister)
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
    public function setDtUpdate($dtUpdate)
    {
        $this->dtUpdate = $dtUpdate;
    }
}