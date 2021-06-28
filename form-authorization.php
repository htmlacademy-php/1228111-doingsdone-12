<?php
require_once('config.php');
require_once('database.php');
require_once('helpers.php');
require_once('utils.php');

$email = $_POST['emai'];
$pass = md5($_POST['password']);

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (empty($_POST['password'])) {
        $errors['password'] = 'Заполните поле!';
    }

    if (empty($_POST['password'])) {
        $errors['password'] = 'Заполните поле!';
    }
      } if( $check_user = mysqli_query($con, "SELECT * FROM 'users' WHERE 'email' = $email AND 'password' = $pass")) {

           if(mysqli_num_rows($check_user)> 0){
           header('Location: index.php');
           }else {
           $authorization = include_template('authorization.php', [
            'errors' => $errors,
        ]);

        $button_register =  include_template('button-register.php', []);

        $left_register = include_template('left-register.php', []);

        $layout = include_template('layout.php', [
        'title' => "Дела в порядке",
        'authorization' => $authorization,
        'button_register' => $button_register,
        'left_register' => $left_register,
    ]);
        print($layout);

}
      }



    /*if ($errors) {

}
}*/
/*else {
    $authorization = include_template('authorization.php', [
        'errors' => $errors,
    ]);

$button_register =  include_template('button-register.php', []);

$left_register = include_template('left-register.php', []);

$layout = include_template('layout.php', [
    'title' => "Дела в порядке",
    'authorization' => $authorization,
    'button_register' => $button_register,
    'left_register' => $left_register,
]);

print($layout);

}
}*/
