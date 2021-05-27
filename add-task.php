<?php
require_once('config.php');
require_once('database.php');
require_once('helpers.php');
require_once('utils.php');

$user_id = 1;
$categories = select_categories($con, $user_id);
$errors = [];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (empty($_POST['name'])) {
        $errors['name'] = 'Имя обязательное поле для заполнения';
    }

    $categories_id = array_search($_POST['project'], array_column($categories, 'id'));
    if ($categories_id) {
        $errors['project'] = 'Такого проекта не существует';
    }

    if (!is_date_valid($_POST['date'])) {
        $errors['date'] = 'Введите корректное время';
    }

    if ($_POST['date'] < date('Y-m-d')) {
        $errors['date'] = 'Вы ввели дату в прошлом';
    }

    //загрузка файла
    $file = $_FILES['file'];

    //валидация
    $types_file = ['image/jpeg', 'image/png', 'image/svg'];
    if (!in_array($file['type'], $types_file)) {
        $errors['file'] = 'Загрузите файл в формате jpeg, png, svg';
    }

    $size_file = $file['size'] / 1000000;
    $max_size = 1; //mb
    if ($size_file > $max_size) {
        $errors['file'] = 'Большой размер файла';
    }

    if (!is_dir('upload')) {
        mkdir('upload', 0777, true);
    };
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $file_name = time() . '.' . $extension;
    move_uploaded_file($file['tmp_name'], 'upload/' . $file_name);
}
if (isset($_POST['done'])) {
    $field_task = add_tasks($con, $_POST['name'], $_POST['project'], $_POST['date'], $_POST['file'], $user_id);
}

if ($errors) {
    $all_tasks = select_tasks($con, $user_id);

    $left_content = include_template('left-content.php', [
        'all_tasks' => $all_tasks,
        'categories' => $categories,
        'active_category_id' => $active_category_id,
    ]);

    $content_main = include_template('form-task.php', [
        'categories' => $categories,
        'errors' => $errors,
    ]);

    $layout = include_template('layout.php', [
        'title' => "Дела в порядке",
        'content' => $content_main,
        'left_content' => $left_content,
    ]);

    print($layout);
    }
    //Добавляем запись в БД

 else {
    $all_tasks = select_tasks($con, $user_id);
    $left_content = include_template('left-content.php', [
        'all_tasks' => $all_tasks,
        'categories' => $categories,
        'active_category_id' => $active_category_id,
    ]);

    $content_main = include_template('form-task.php', [
        'categories' => $categories,
    ]);

    $layout = include_template('layout.php', [
        'title' => "Дела в порядке",
        'content' => $content_main,
        'left_content' => $left_content,
    ]);

    print($layout);
}

