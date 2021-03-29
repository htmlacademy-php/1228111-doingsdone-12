<?php
require_once('config.php');
require_once('database.php');
require_once('utils.php');
//require_once('link-category.php');
require_once('helpers.php');


$show_complete_tasks = rand(0, 1);
$user_id = 1;
$categories = select_categories($con, $user_id);
$tasks = select_tasks($con, $user_id);




$content_main = include_template('main.php', [
    'categories' => $categories,
    'tasks' => $tasks,
    'show_complete_tasks' => $show_complete_tasks,
]);

$layout = include_template('layout.php', [
    'title' => "Дела в порядке", 'content' => $content_main
]);
echo $layout;



//В сценарии index.php добавить проверку на существования параметра запроса с
//идентификатором проекта. Если параметр присутствует, то показывать только те задачи,
//что относятся к этому проекту.$categiry



if(isset($_GET['category_id'])) {
$category_id = ($_GET['category_id']);
}
echo '<pre>';
var_dump($tasks);
var_dump($categories);
var_dump($_GET);

/*function is_category() {
foreach($categories as $category){
if (array_key_exists('id', $categories)) {
return true;
}
}*/







