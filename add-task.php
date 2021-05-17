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

    if (is_date_valid($_POST['date']) === false) {
        $errors['date'] = 'Введите корректное время';
    }

    if ($_POST['date'] < date('Y-m-d')) {
        $errors['date'] = 'Вы ввели дату в прошлом';
    }

    //загрузка файда

    var_dump($_FILES['file']);
    if (isset($_FILES['file'])) {
        $fileName = $_FILES['file']['file'];

        // echo 'Файл: ' . $fileName . '<br>';

        //Загрузка файла на сервер
        $uploadDir = '/files/'; //Директория на сервере, для загружаемых файлов

        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadDir . $fileName)) {
            echo 'Файл успешно загружен на сервер.<br>';
        } else {
            $errors['file'] = 'Загрузка файла не удалась!<br>';
            var_dump($errors);
        }
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
    } elseif (isset($_POST['done']) && !$errors) {

        $query_tasks = "INSERT tasks (title, file, deadline, category_id) VALUES('name', 'file', 'date', 'project')";
        $res = mysqli_query($con, $query_tasks);
        $all_tasks = mysqli_fetch_all($res, MYSQLI_ASSOC);
    }

    /* $left_content = include_template('left-content.php', [
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

        print($layout);*/
} else {
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
