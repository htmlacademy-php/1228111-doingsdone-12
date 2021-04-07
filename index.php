<?php
require_once('config.php');
require_once('database.php');
require_once('utils.php');
require_once('helpers.php');


$show_complete_tasks = rand(0, 1);
$user_id = 1;
$categories = select_categories($con, $user_id);
$tasks = select_tasks($con, $user_id);

if (isset($_GET['category_id'])) {
    $category_id = ($_GET['category_id']);
}

$filtered_tasks = filter_tasks_by_category($tasks, $category_id);


$content_main = include_template('main.php', [
    'categories' => $categories,
    'tasks' => $filtered_tasks,
    'show_complete_tasks' => $show_complete_tasks,
]);

$layout = include_template('layout.php', [
    'title' => "Дела в порядке", 'content' => $content_main
]);
echo $layout;


echo '<pre>';
var_dump($filtered_tasks);
