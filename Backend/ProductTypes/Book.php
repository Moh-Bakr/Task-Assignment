<?php
require_once(__DIR__ . '/../Logic/MainLogic.php');
require_once(__DIR__ . '/../Logic/Validator.php');

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
        $this->Validate = new Validator();
        if (!($this->Validate->required($this->weight, "weight"))) {
            if (!($this->Validate->max($this->weight, "weight", 5))) {
                $this->Validate->digits($this->weight, "weight");
            }
        }
    }
}