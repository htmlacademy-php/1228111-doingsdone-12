<?php
/**
 * function подсчет количества задач сщщтветствующих категории
*/
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
{
$current = new DateTime('now');
  $diff = date_diff(new DateTime($task_date), $current);
  if ($task_date && $diff->days <= 1) {
    return true;
  }
  return false;
}
