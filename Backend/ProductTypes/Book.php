<?php
require_once(__DIR__ . '/../Logic/MainLogic.php');
require_once(__DIR__ . '/../Logic/Rules.php');

class Book extends MainLogic
{
    public $weight, $Validate;

    public function __construct($weight)
    {
        $this->weight = $weight ?? NULL;
        $this->validate_weight();
    }

    public function validate_weight()
    {
        $this->Validate = new Rules();
        $this->Validate->ValidateProduct($this->weight, 'weight');
    }
}