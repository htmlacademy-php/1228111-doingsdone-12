<?php

/**
 * mysqli_connect получить ресурс соединения
 */
$con = mysqli_connect(SERVER_NAME, USER_NAME, PASSWORD, DATA_BASE);
if (!$con) {
    die("Connection failed:" . mysqli_connect_error());
}

/**
 * function возвращает категории для текущего пользователя
 * @param mysqli $con идентификатор соединения, полученный с помощью mysqli_connect()
 * @param int $user_id идентификатор пользователя, для которого получаем все проекты
 * @return Array массив категорий для текущего пользователя
 */
function select_categories($con, $user_id)
{
    $query_categories = "SELECT title, id, user_id FROM categories WHERE user_id = $user_id";
    $res = mysqli_query($con, $query_categories);
    $categories = mysqli_fetch_all($res, MYSQLI_ASSOC);
    return $categories;
}
/**
 * function возвращает задачи для одного поьзователя
 * @param mysqli $con идентификатор соединения, полученный с помощью mysqli_connect()
 * @param int $user_id идентификатор задач для одного пользователя
 * @return Array массив задач для одного поьзователя
 */
function select_tasks($con, $user_id)
{
    $query_tasks = "SELECT title, status, deadline, user_id, category_id FROM tasks WHERE user_id = $user_id";
    $res = mysqli_query($con, $query_tasks);
    $tasks = mysqli_fetch_all($res, MYSQLI_ASSOC);
    return $tasks;
}

/**
 * получаем задачи для конкретной категории
 * @param array $tasks массив всех задач
 * @param int $category_id - id категории, для которой ищем задачи
 * @return array $new_tasks- задачи для конкретной категории
 **/

function filter_tasks_by_category($tasks, $category_id)
{
    $new_tasks = [];
    foreach ($tasks as $task) {
        if ($task['category_id'] === $category_id) {
            array_push($new_tasks, $task);
        }
    }
    return $new_tasks;
}
