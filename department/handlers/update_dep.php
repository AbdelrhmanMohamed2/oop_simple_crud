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
    $depart_id = new Validations($_POST['depart_id']);
    $depart_name = new Validations($_POST['depart_name']);

    $depart_id->sanitize();
    $depart_name->sanitize();



    //data validations
    // department name validate 
    if ($depart_name->required()) {
        $errors[] = 'department name is required';
    } elseif ($depart_name->maxInputSize(NAME_MAX_SIZE)) {
        $errors[] = 'department name is too long, max size is : ' . NAME_MAX_SIZE;
    } elseif ($depart_name->minInputSize(NAME_MIN_SIZE)) {
        $errors[] = 'department name is too short, min size is : ' . NAME_MIN_SIZE;
    } elseif ($depart_name->numeric()) {
        $errors[] = 'department name must be a string';
    }


    // department id validate 
    if ($depart_id->required()) {
        $errors[] = 'department id is missing';
    } elseif (!$depart_id->numeric()) {
        $errors[] = 'department id must be a number';
    }


    // check for errors
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
    } else {
        $depart = new Department();
        $depart->department_id = $depart_id->input;
        $depart->department_name = $depart_name->input;

        if (!$depart->updateDepartment()) {
            $errors[] = 'department already exists';
            $_SESSION['errors'] = $errors;
        } else {
            $_SESSION['success'] = 'department updated successfully';
        }
    }

    redirect($_SERVER['HTTP_REFERER']);

    // wrong method error
} else {
    $errors[] = 'wrong method';
    $_SESSION['errors'] = $errors;
    redirect('../../index.php');
}
