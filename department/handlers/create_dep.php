<?php
session_start();
require_once '../../functions/functions.php';
require_once '../../functions/validations.php';
require_once '../Department.php';

$errors = [];

if (checkMethod('POST')) {
    // const
    // name
    define('NAME_MAX_SIZE', 15);
    define('NAME_MIN_SIZE', 3);




    // data and data sanitize 
    $department = new Validations($_POST['depart_name']);
    $department->sanitize();

    //data validations
    // department name validate 
    if ($department->required()) {
        $errors[] = 'department name is required';
    } elseif ($department->maxInputSize(NAME_MAX_SIZE)) {
        $errors[] = 'department name is too long, max size is : ' . NAME_MAX_SIZE;
    } elseif ($department->minInputSize(NAME_MIN_SIZE)) {
        $errors[] = 'department name is too short, min size is : ' . NAME_MIN_SIZE;
    } elseif ($department->numeric()) {
        $errors[] = 'department name must be a string';
    }

    // check for errors
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
    } else {
        $depart = new Department();
        $depart->department_name = $department->input;


        if (!$depart->createDepartment()) {
            $errors[] = 'department already exists';
            $_SESSION['errors'] = $errors;
        } else {
            $_SESSION['success'] = 'department created successfully';
        }
    }

    redirect('../add_department.php');

    // wrong method error
} else {
    $errors[] = 'wrong method';
    $_SESSION['errors'] = $errors;
    redirect('../../index.php');
}
