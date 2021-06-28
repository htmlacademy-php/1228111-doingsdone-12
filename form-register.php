<?php

require_once('config.php');
require_once('database.php');
require_once('helpers.php');
require_once('utils.php');

$errors = [];
//var_dump($_POST);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //проверка наличия имени

    if (empty($_POST['email'])) {
        $errors['email'] = '