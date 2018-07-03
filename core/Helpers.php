<?php

namespace Core;


class Helpers
{
    private $errors;

    public function catchErrors(string $field, string $value) {
        if (empty($value)) {
            $this->setErrors("O campo <b>" . ucfirst(str_replace('des', '', $field)) . "</b> não foi informado.");
            return false;
        }
        return true;
    }

    public function getErrors() {
        return $this->errors;
    }

    private function setErrors(string $error) {
        if (strlen($this->errors) == 0) {
            $this->errors = $error;
        } else {
            $this->errors .= "<hr>" . $error;
        }
    }
}