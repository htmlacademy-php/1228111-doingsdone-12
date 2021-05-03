<?php
require_once('config.php');
require_once('helpers.php');
require_once('database.php');

if (isset($_POST['done'])) {
    if (!empty($_POST)) {

        foreach ($_POST as $field) {
            $field_task = $_POST['name'];
            $field_project = $_POST['project'];
            $field_date = $_POST['date'];
        }

        $field_task = htmlspecialchars($field_task);
        $field_project = htmlspecialchars($field_project);
        $field_date = htmlspecialchars($field_date);

        $field_task = urldecode($field_task);
        $field_project = urldecode($field_project);
        $field_date = urldecode($field_date);

        $field_task = trim($field_task);
        $field_project = trim($field_project);
        $field_date = trim($field_date);
    } else {
        $error_field = [];
    }
}

/*function is_date_valid(string $date) : bool {
    $format_to_check = 'Y-m-d';
    $dateTimeObj = date_create_from_format($format_to_check, $date);

    return $dateTimeObj !== false && array_sum(date_get_last_errors()) === 0;
}*/
