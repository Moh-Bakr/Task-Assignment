<?php
require_once(__DIR__ . '/../Logic/MainLogic.php');
require_once(__DIR__ . '/../Logic/Rules.php');

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
        $this->Validate = new Rules();
        $this->Validate->ValidateProduct($this->size, 'size');
    }
}