<?php
require_once(__DIR__ . '/../Logic/MainLogic.php');
require_once(__DIR__ . '/../Logic/Validator.php');

class Furniture extends MainLogic
{
    public $height, $width, $length, $Validate;

    public function __construct($height, $width, $length)
    {
        $this->height = $height ?? NULL;
        $this->width = $width ?? NULL;
        $this->length = $length ?? NULL;
        $this->validate_HWL();
    }

    public function validate_HWL()
    {
        $this->Validate = new Validator();
        if (!($this->Validate->required($this->length, "length"))) {
            if (!($this->Validate->max($this->length, "length", 5))) {
                $this->Validate->digits($this->length, "length");
            }
        }
        if (!($this->Validate->required($this->height, "height"))) {
            if (!($this->Validate->max($this->height, "height", 5))) {
                $this->Validate->digits($this->height, "height");
            }
        }
        if (!($this->Validate->required($this->width, "width"))) {
            if (!($this->Validate->max($this->width, "width", 5))) {
                $this->Validate->digits($this->width, "width");
            }
        }
    }
}