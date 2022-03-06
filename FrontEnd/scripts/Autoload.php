<?php

class Autoload
{
    public static function autoloader()
    {
        header('location: ' . (isset($_SERVER['HTTPS']) &&
            $_SERVER['HTTPS'] === 'on' ? "https" : "http") . '://'
            . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT']);
    }
}