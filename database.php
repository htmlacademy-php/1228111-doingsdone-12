<?php

/**
 * function mysqli_connect получить ресурс соединения
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
    $query_categories = "SELECT title, id FROM categories WHERE users_id = $user_id";
    $res = mysqli_query($con, $query_categories);
    $categories = mysqli_fetch_all($res, MYSQLI_ASSOC);
    return $categories;
}

/**
 * function возвращает задачи для одной категории
 * @param mysqli $con идентификатор соединения, полученный с помощью mysqli_connect()
 * @param int $category_id идентификатор категории, для которого получаем все задачи
 * @return Array массив задач для одной категории
 */

function select_tasks($con,$category_id)
{
    $query_tasks = "SELECT put_date, status, deadline, user_id FROM tasks WHERE category_id = $category_id";
    $res = mysqli_query($con, $query_tasks);
    $tasks = mysqli_fetch_all($res, MYSQLI_ASSOC);
    return $tasks;
}
