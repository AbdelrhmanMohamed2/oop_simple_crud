<?php
session_start();
require_once '../../functions/functions.php';
require_once '../../functions/validations.php';
require_once '../Department.php';

$errors = [];

if (checkMethod('GET') && isset($_GET['id'])) {

    // data 
    $dep_id = new Validations($_GET['id']);
    $dep_id->sanitize();

    if ($dep_id->required()) {
        $errors[] = 'department id is missing';
    } elseif (!$dep_id->numeric()) {
        $errors[] = 'department id must be number';
    } else {
        $depart = new Department();
        $depart->department_id = $dep_id->input;
        if (!$depart->deleteDepartment()) {
            $errors[] = 'department may not exists';
        } else {
            $_SESSION['success'] = 'department deleted successfully';
        }
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
    }

    redirect('../all_departments.php');

    // wrong method error
} else {
    $errors[] = 'wrong method';
    $_SESSION['errors'] = $errors;
    redirect('../../index.php');
}
