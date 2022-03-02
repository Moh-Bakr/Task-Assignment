<?php
require_once(__DIR__ . '/../../Backend/Logic/Validator.php');
if (isset($_POST['submit'])) {
    $validator = new validator($_POST);
    $errors = $validator->validateform();
}