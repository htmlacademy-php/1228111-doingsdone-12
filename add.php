<?php
require_once('config.php');
require_once('database.php');
require_once('helpers.php');
require_once('utils.php');

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$nameErr = $projectErr = $dateErr = '';
$name = $project = $date = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['done']) {
        $user_id = 1;
        $categories = select_categories($con, $user_id);
        $all_tasks = select_tasks($con, $user_id);
    }
    if (!empty($_POST['name'])) {

        $name = test_input($_POST['name']);
    } else {
        return $nameErr;
    }
    if (!empty($_POST['project'])) {
        $project = test_input($_POST['project']);
    } else {

        $projectErr;
    }
    if (!empty($_POST['date'])) {
        is_date_valid($_POST['date']);
    }
} else {
    $user_id = 1;
    $categories = select_categories($con, $user_id);
    $all_tasks = select_tasks($con, $user_id);
}



$left_content = include_template('left-content.php', [
    'all_tasks' => $all_tasks,
    'categories' => $categories,
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
