<?php

interface IRules
{
    public function required($val, $key);

    public function max($val, $key, $max);

    public function unique($val, $key);

    public function regular_expression($rule, $val, $key);

    public function digits($val, $key);

    public function Furniture($length, $height, $width);

    public function addError($key, $val);

}