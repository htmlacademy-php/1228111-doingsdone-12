<?php
require_once('config.php');
require_once('database.php');
require_once('utils.php');
require_once('helpers.php');


$show_complete_tasks = rand(0, 1);
$user_id = 1;
$categories = select_categories($con, $user_id);
$all_tasks = select_tasks($con, $user_id);
$active_category_id = null;

if (isset($_GET['category_id'])) {
    $active_category_id = ($_GET['category_id']);
    $filtered_tasks = filter_tasks_by_category($all_tasks, $active_category_id);
} else {
    $active_tasks = $all_tasks;
    $filtered_tasks     error     t_regist  для заполн  для заполнениdule7-nclude_template('button-user.php', []);clude_template('main.php', [lude_teleft_conude_template('button-regisude_template('left-registerude_teclude_template('layout.phpbuttone_template('left-contenaall_tasks,lude_template('main.php', [how_complete_tahow_complster
}
