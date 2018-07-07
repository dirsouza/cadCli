<?php

namespace App\Model;

use Core\Helpers;

class AddressModel
{
    private $idAddress;
    private $desZip;
    private $desStreet;
    private $desNumber;
    private $desComplement;
    private $desNeighborhood;
    private $desCity;
    private $desState;
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
            'required' => array('desZip', 'desStreet', 'desNeighborhood', 'desCity', 'desState'),
            'unique' => array('desZip')
        );
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
    public function setIdAddress($idAddress)
    {
        $this->idAddress = $idAddress;
    }

    /**
     * @return mixed
     */
    public function getDesZip()
    {
        return $this->desZip;
    }

    /**
     * @param mixed $desZip
     */
    public function setDesZip($desZip)
    {
        $this->desZip = $desZip;
    }

    /**
     * @return mixed
     */
    public function getDesStreet()
    {
        return $this->desStreet;
    }

    /**
     * @param mixed $desStreet
     */
    public function setDesStreet($desStreet)
    {
        $this->desStreet = $desStreet;
    }

    /**
     * @return mixed
     */
    public function getDesNumber()
    {
        return $this->desNumber;
    }

    /**
     * @param mixed $desNumber
     */
    public function setDesNumber($desNumber)
    {
        $this->desNumber = $desNumber;
    }

    /**
     * @return mixed
     */
    public function getDesComplement()
    {
        return $this->desComplement;
    }

    /**
     * @param mixed $desComplement
     */
    public function setDesComplement($desComplement)
    {
        $this->desComplement = $desComplement;
    }

    /**
     * @return mixed
     */
    public function getDesNeighborhood()
    {
        return $this->desNeighborhood;
    }

    /**
     * @param mixed $desNeighborhood
     */
    public function setDesNeighborhood($desNeighborhood)
    {
        $this->desNeighborhood = $desNeighborhood;
    }

    /**
     * @return mixed
     */
    public function getDesCity()
    {
        return $this->desCity;
    }

    /**
     * @param mixed $desCity
     */
    public function setDesCity($desCity)
    {
        $this->desCity = $desCity;
    }

    /**
     * @return mixed
     */
    public function getDesState()
    {
        return $this->desState;
    }

    /**
     * @param mixed $desState
     */
    public function setDesState($desState)
    {
        $this->desState = $desState;
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