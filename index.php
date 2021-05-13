<?php
require_once('config.php');
require_once('database.php');
require_once('utils.php');
require_once('helpers.php');


$show_complete_tasks = rand(0, 1);
$user_id = 1;
$categories = select_categories($con, $user_id);
$all_tasks = select_tasks($con, $user_id);

if (isset($_GET['category_id'])) {
    $active_category_id = ($_GET['category_id']);
    $filtered_tasks = filter_tasks_by_category($all_tasks, $active_category_id);
} else {
    $active_tasks = $all_tasks;
    $filtered_tasks = $all_tasks;
}

 $left_content = include_template('left-content.php', [
    'categories' => $categories,
    'all_tasks' => $all_tasks,
]);

$content_main = include_template('main.php', [
    'filtered_tasks' => $filtered_tasks,
    'active_category_id' => $active_category_id,
    'show_complete_tasks' => $show_complete_tasks,
   ]);

$layout = include_template('layout.php', [
    'title' => "Дела в порядке",
     'content' => $content_main,
     'left_content' => $left_content,

]);
 print($layout);


