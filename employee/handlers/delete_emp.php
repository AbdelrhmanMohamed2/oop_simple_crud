<?php
session_start();
require_once '../../functions/functions.php';
require_once '../../functions/validations.php';
require_once '../Employee.php';

$errors = [];

if (checkMethod('GET') && isset($_GET['id'])) {

    // data 
    $emp_id = new Validations($_GET['id']);
    $emp_id->sanitize();

    if ($emp_id->required()) {
        $errors[] = 'employee id is missing';
    } elseif (!$emp_id->numeric()) {
        $errors[] = 'employee id must be number';
    } else {
        $emp = new Employee();
        $emp->employee_id = $emp_id->input;
        if (!$emp->deleteEmployee()) {
            $errors[] = 'employee may not exists';
        } else {
            $_SESSION['success'] = 'employee deleted successfully';
        }
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
    }

    redirect('../../index.php');

    // wrong method error
} else {
    $errors[] = 'wrong method';
    $_SESSION['errors'] = $errors;
    redirect('../../index.php');
}
