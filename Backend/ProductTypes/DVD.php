<?php
require_once(__DIR__ . '/../Logic/MainLogic.php');
require_once(__DIR__ . '/../Logic/Validator.php');

class DVD extends MainLogic
{
    public $size, $Validate;

    public function __construct($size)
    {
        $this->size = $size ?? NULL;
        $this->validate_size();
    }

    public function validate_size()
    {
        $this->Validate = new Validator();
        if (!($this->Validate->required($this->size, "size"))) {
            if (!($this->Validate->max($this->size, "size", 5))) {
                $this->Validate->digits($this->size, "size");
            }
        }
    }
}