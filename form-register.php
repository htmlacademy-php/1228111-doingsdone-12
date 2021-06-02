<?php
session_start();
require_once('config.php');
require_once('database.php');
require_once('helpers.php');
require_once('utils.php');

$errors = [];
//var_dump($_POST);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //проверка наличия имени
    if (empty($_POST['email'])) {
        $errors['email'] = 'Поле обязательное  для заполнения';
    }

    if (empty($_POST['password'])) {
        $errors['password'] = 'Поле обязательное  для заполнения';
    }

    if (empty($_POST['name'])) {
        $errors['name'] = 'Поле обязательное  для заполнения';
    }

    if ($errors) {

        $register = include_template('register.php', [
            'errors' => $errors,
        ]);

        $button_register =  include_template('button-register.php', []);

        $left_register = include_template('left-register.php', []);

        $layout = include_template('layout.php', [
            'title' => "Дела в порядке",
            'register' => $register,
            'button_register' => $button_register,
            'left_register' => $left_register,
        ]);

        print($layout);


    } else {
        $add_user = add_user($con, $_POST['email'], $_POST['password'], $_POST['name']);
        header('Location: index.php');
    }
} else {


    $button_register =  include_template('button-register.php', []);

    $left_register = include_template('left-register.php', []);

    $register = include_template('register.php', [

    ]);

    $layout = include_template('layout.php', [
        'title' => "Дела в порядке",
        'register' => $register,
        'left_register' => $left_register,
        'button_register' => $button_register,

    ]);

    print($layout);
}
