<?php

namespace App\Model;

use Core\Helpers;

class UserModel
{
    private $idUser;
    private $desLogin;
    private $desPass;
    private $desType;
    private $dtRegister;
    private $dtUpdate;

    /**
     * UserModel constructor.
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
    public function getDesLogin()
    {
        return $this->desLogin;
    }

    /**
     * @param mixed $desLogin
     */
    public function setDesLogin($desLogin): void
    {
        $this->desLogin = $desLogin;
    }

    /**
     * @return mixed
     */
    public function getDesPass()
    {
        return $this->desPass;
    }

    /**
     * @param mixed $desPass
     */
    public function setDesPass($desPass): void
    {
        $this->desPass = $desPass;
    }

    /**
     * @return mixed
     */
    public function getDesType()
    {
        return $this->desType;
    }

    /**
     * @param mixed $desType
     */
    public function setDesType($desType): void
    {
        $this->desType = $desType;
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