<?php

namespace Core;

class Helpers
{
    private $errors;

    public function catchErrors(string $field, string $value, array $rules = array())
    {
        if (!empty($rules)) {
            foreach ($rules['required'] as $key => $r) {
                if ($r === $field) {
                    if (empty($value)) {
                        $this->setErrors("O campo <b>" . ucfirst(preg_replace(['/des/', '/dt/'], '', $field)) . "</b> não foi informado.");
                        return false;
                    }
                }
            }
        }
        return true;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function setErrors(string $error)
    {
        if (strlen($this->errors) == 0) {
            $this->errors = $error;
        } else {
            $this->errors .= "<hr>" . $error;
        }
    }

    /**
     * @param string|null $url
     * @param array $data
     */
    public function sessionErro(string $url = null, array $data = array())
    {
        if ($url === null) {
            $url = "/";
        }

        $_SESSION['erro'] = array(
            'msg' => $this->getErrors(),
            'fields' => $data
        );

        header("location: " . $url);
        exit;
    }
}