<?php

namespace App\Model;

use Core\Helpers;

class ContactModel
{
    private $idContact;
    private $desPhone;
    private $desMobile;
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
                if ($helpers->catchErrors((string)$key, (string)$value, self::rules())) {
                    $this->{$method}(trim($value));
                }
            }
        }

        if (!empty($helpers->getErrors())) {
            throw new \Exception("Existem campos vazios.");
        }
    }

    /**
     * Regras
     * @return array
     */
    private function rules()
    {
        return array(
            'required' => array('desMobile')
        );
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
    public function setIdContact($idContact)
    {
        $this->idContact = $idContact;
    }

    /**
     * @return mixed
     */
    public function getDesPhone()
    {
        return $this->desPhone;
    }

    /**
     * @param mixed $desPhone
     */
    public function setDesPhone($desPhone)
    {
        $this->desPhone = $desPhone;
    }

    /**
     * @return mixed
     */
    public function getDesMobile()
    {
        return $this->desMobile;
    }

    /**
     * @param mixed $desMobile
     */
    public function setDesMobile($desMobile)
    {
        $this->desMobile = $desMobile;
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