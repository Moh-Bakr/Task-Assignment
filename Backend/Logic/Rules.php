<?php

require_once(__DIR__ . '/IRules.php');

class Rules implements IRules
{
    public $errors = [];

    public function required($val, $key)
    {
        if (empty($val)) {
            $this->addError($key, "$key is required");
            return true;
        }
    }

    public function regular_expression($rule, $val, $key)
    {
        if (!preg_match($rule, $val)) {
            $this->addError($key, "only letters, numbers and ( _ or - ) are Allowed");
            return true;
        }
    }

    public function max($val, $key, $max)
    {
        if (strlen($val) > $max) {
            $this->addError($key, "$key must not exceed $max char");
            return true;
        }
    }

    public function unique($val, $key)
    {
        $sql = "SELECT COUNT(*) sku from products WHERE sku ='" . $val . "'";
        $database = new database();
        $db = $database->getConnection();
        $count = $db->prepare($sql);
        $count->execute();
        if ($count->fetchColumn() > 0) {
            $this->addError($key, "$key aleady exists , must be unique");
        }
    }


    public function digits($val, $key)
    {
        if (!is_numeric($val)) {
            $this->addError($key, "$key must be a number");
        }
    }

    public function Furniture($length, $height, $width)
    {
        $this->ValidateProduct($length, 'length');
        $this->ValidateProduct($height, 'height');
        $this->ValidateProduct($width, 'width');
    }

    public function ValidateProduct($val, $key)
    {
        if (!($this->required($val, $key))) {
            if (!($this->max($val, $key, 5))) {
                $this->digits($val, $key);
            }
        }
    }

    public function ValidateString($val, $key, $rule)
    {
        if (!($this->required($val, $key))) {
            if (!($this->max($val, $key, 25))) {
                $this->regular_expression($rule, $val, $key);
            }
        }
    }

    public function ValidateUnique($val, $key, $rule)
    {
        $this->ValidateString($val, $key, $rule);
        $this->unique($val, $key);
    }

    public function addError($key, $val)
    {
        $this->errors[$key] = $val;
    }

}