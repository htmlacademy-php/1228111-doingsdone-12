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
        $errors['email'] = 'Поле обязательное для заполнения';
    }
     /* $sanitized_email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if (filter_var($sanitized_email, FILTER_VALIDATE_EMAIL)) {
            $_POST['email'];
        } else {
           $errors['email'] = 'Email указан неверно';

        }*/



    if (empty($_POST['password'])) {
        $errors['password'] = 'Поле обязательное  для заполнения';
    } else {

        $pwd = $_POST['password'];
        if (strlen($pwd) < 8) {
            $errors['password'] = 'Пароль короткий!';
        }

        if (strlen($pwd) > 15) {
            $errors['password'] = 'Пароль длинный!';
        }

        if (!preg_match("#[0-9]+#", $pwd)) {
            $errors['password'] = 'Пароль должен включать хотя бы одну цифру!';
        }

        if (!preg_match("#[a-zA-Z]+#", $pwd)) {
            $errors['password'] = 'Пароль должен включать хотя бы одну букву!';
        }
    }


    if (empty($_POST['name'])) {
        $errors['name'] = 'Поле обязательное  для заполнения';
    } else {
        //$name = $_POST['name'];
        if (strlen($_POST['name']) > 30) {
            $errors['name'] = 'Имя длинное!';
        }

        if (strlen($_POST['name']) < 4) {
            $errors['name'] = 'Имя слишком короткое!';
        }
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
        $add_user = add_user($con, $_POST['email'], md5($_POST['password']), $_POST['name']);
        header('Location: form-autho.php');
    }
} else {

    $button_register =  include_template('button-register.php', []);

    $left_register = include_template('left-register.php', []);

    $register = include_template('register.php', []);

    $layout = include_template('layout.php', [
        'title' => "Дела в порядке",
        'register' => $register,
        'left_register' => $left_register,
        'button_register' => $button_register,

    ]);

    print($layout);
}
