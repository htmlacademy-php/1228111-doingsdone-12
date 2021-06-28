<?php
require_once('config.php');
require_once('database.php');
require_once('helpers.php');
require_once('utils.php');

$email = $_POST['emai'];
$pass = md5($_POST['password']);
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$check_user = mysqli_query($con, "SELECT * FROM 'users' WHERE 'email' = $email AND 'password' = $pass");
if($check_user > 0){

    $user = mysqli_fetch_assoc($check_user);

}
} else {
    $_SESSION['message'] = 'Неверный меил и пароль';
    header('Location: form-autho.php');
   $button_register =  include_template('button-register.php', [

    ]);

    $left_register = include_template('left-register.php', [

    ]);

    $autho = include_template('authorization.php', [
        'errors' => $errors,
    ]);

    $layout = include_template('layout.php', [
        'title' => "Дела в порядке",
        'autho' => $autho,
        'left_register' => $left_register,
        'button_register' => $button_register,

    ]);

    print($layout);
}

 print_r($user);
    print_r($check_user);


