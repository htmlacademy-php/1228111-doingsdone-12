<?php
function count_task_categories($category_id, $tasks)
{
  $count = 0;
  foreach ($tasks as $task) {
    if ($category_id === $task['category_id']) {
      $count++;
    }
  }
  return $count;
}


/**
 * Проверка задачи на важность
 * @param Array $task — текущая задача
 * @return boolean — true, если мешьше 24-х часов осталось, либо false
 */

function is_task_important($task_date)
{ //создали функцию с параметром $task_date. В нее попадет аргумент $task['date']

  $current = new DateTime('now'); //получаем текущее время
  $diff = date_diff(new DateTime($task_date), $current); // получаем разницу м/у заданной конечной датой и текущим временем
  if ($task_date && $diff->days <= 1) { // если эта разница меньше или равна 24 ч , то правда, если нет-то ложь
    return true;
  }
  return false;
}
