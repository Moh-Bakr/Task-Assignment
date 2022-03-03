<?php
require_once(__DIR__ . '/MainLogic.php');
require_once(__DIR__ . '/Rules.php');
require_once(__DIR__ . '/../Database/database.php');

class validator extends MainLogic
{
    public $data;
    private $Rules;

    public function __construct($post_data)
    {
        $this->Rules = new Rules();
        $this->data = $post_data;
    }

    public function validateform()
    {
        $this->ValidateSku();
        $this->ValidateName();
        $this->ValidatePrice();
        $this->ProductType();

        if (empty($this->Rules->errors)) {
            parent::__construct($this->data);
            MainLogic::CreateProducts();
            header('Location: ' . '/');
        }
        return $this->Rules->errors;

    }

    private function ValidateSku()
    {
        $val = trim($this->data['sku']);
        $rule = '/^[a-zA-Z0-9_-]+$/';
        if (!$this->Rules->required($val, "sku")) {
            if (!($this->Rules->max($val, "sku", 30))) {
                if (!($this->Rules->regular_expression($rule, $val, "sku"))) {
                    $this->Rules->unique($val, "sku");
                }
            }
        }
    }

    private function ValidateName()
    {
        $val = trim($this->data['name']);
        $rule = '/^[a-zA-Z0-9_ -]+$/';
        if (!($this->Rules->required($val, "name"))) {
            if (!($this->Rules->max($val, "name", 25))) {
                $this->Rules->regular_expression($rule, $val, "name");
            }
        }
    }

    private function ValidatePrice()
    {
        $val = trim($this->data['price']);
        if (!($this->Rules->required($val, "price"))) {
            if (!($this->Rules->max($val, "price", 5))) {
                $this->Rules->digits($val, "price");
            }
        }
    }

    private function ProductType()
    {
        $val = trim($this->data['type']);
        $size = trim($this->data['size']);
        $weight = trim($this->data['weight']);
        $length = trim($this->data['length']);
        $height = trim($this->data['height']);
        $width = trim($this->data['width']);
        if (!empty($val) && $val != 'DVD' && $val != 'Furniture' && $val != 'Book') {
            $this->Rules->addError('type', 'Type is Required');
        } elseif ($val == 'DVD') {
            if (!($this->Rules->required($size, "size"))) {
                if (!($this->Rules->max($size, "size", 5))) {
                    $this->Rules->digits($size, "size");
                }
            }
        } elseif ($val == 'Book') {
            if (!($this->Rules->required($weight, "weight"))) {
                if (!($this->Rules->max($weight, "weight", 5))) {
                    $this->Rules->digits($weight, "weight");
                }
            }
        } elseif ($val == 'Furniture') {
            $this->Rules->Furniture($length, $height, $width);
        }
    }
}