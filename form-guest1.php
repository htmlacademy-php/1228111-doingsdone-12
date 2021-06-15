<?php
require_once('config.php');
require_once('database.php');
require_once('helpers.php');
require_once('utils.php');

$button_register =  include_template('button-register.php', [

]);

$left_register = include_template('left-register.php', [

]);

$guest = include_template('guest.php', [
    'errors' => $errors,
]);

$layout = include_template('layout.php', [
    'title' => "Дела в порядке",
    'guest' => $guest,
    'left_register' => $left_register,
    'button_register' => $button_register,

]);

print($layout);
