<?php
require_once('config.php');
require_once('database.php');
require_once('utils.php');
require_once('helpers.php');



$show_complete_tasks = rand(0, 1);
$content_main = include_template('main.php', [
  'categories' => $categories,
  'tasks' => $tasks,
  'show_complete_tasks' => $show_complete_tasks,
]);

$layout = include_template('layout.php', [
  'title' => "Дела в порядке", 'content' => $content_main
]);
echo $layout;

$user_id = 1;

/*$categories = select_categories($con, $user_id);
$all_tasks = [];
foreach ($categories as $category) {
  $all_tasks [] = [
    'name' => $category['title'],
    'tasks' => select_tasks($con, $user_id)
  ];
}
var_dump($all_tasks);*/


$categories = select_categories($con, $user_id);
$tasks = select_tasks($con, $user_id);

