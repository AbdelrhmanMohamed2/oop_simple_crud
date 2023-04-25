<?php
session_start();
require_once '../../functions/functions.php';
require_once '../../functions/validations.php';
require_once '../Employee.php';

$errors = [];

if (checkMethod('POST')) {
    // const
    // name
    define('NAME_MAX_SIZE', 15);
    define('NAME_MIN_SIZE', 3);
    // password
    define('PASSWORD_MAX_SIZE', 20);
    define('PASSWORD_MIN_SIZE', 6);



    // data and data sanitize 
    foreach ($_POST as $key => $value) {
        // $$key = sanitize($value);
        $$key = new Validations($value);
        $$key->sanitize();
    }

    //data validations
    // employee name validate 
    if ($emp_name->required()) {
        $errors[] = 'employee name is required';
    } elseif ($emp_name->maxInputSize(NAME_MAX_SIZE)) {
        $errors[] = 'employee name is too long, max size is : ' . NAME_MAX_SIZE;
    } elseif ($emp_name->minInputSize(NAME_MIN_SIZE)) {
        $errors[] = 'employee name is too short, min size is : ' . NAME_MIN_SIZE;
    } elseif ($emp_name->numeric()) {
        $errors[] = 'employee name must be a string';
    }


    // employee email validate 
    if ($emp_email->required()) {
        $errors[] = 'employee email is required';
    } elseif (!filter_var($emp_email->input, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'invalid employee email';
    }



    // employee password validate 
    if ($emp_password->required()) {
        $errors[] = 'employee password is required';
    } elseif ($emp_password->maxInputSize(PASSWORD_MAX_SIZE)) {
        $errors[] = 'employee password is too long, max size is : ' . PASSWORD_MAX_SIZE;
    } elseif ($emp_password->minInputSize(PASSWORD_MIN_SIZE)) {
        $errors[] = 'employee password is too short, min size is : ' . PASSWORD_MIN_SIZE;
    }


    // employee department validate 
    if ($emp_department->required()) {
        $errors[] = 'employee department is required';
    } elseif (!$emp_department->numeric()) {
        $errors[] = 'employee department must be a number';
    }



    // check for errors
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
    } else {
        $emp = new Employee();
        $emp->employee_name = $emp_name->input;
        $emp->employee_email = $emp_email->input;
        $emp->employee_password = $emp_password->input;
        $emp->employee_department = $emp_department->input;

        if (!$emp->createEmployee()) {
            $errors[] = 'Employee already exists';
            $_SESSION['errors'] = $errors;
        } else {
            $_SESSION['success'] = 'Employee added successfully';
        }
    }

    redirect('../add_emp.php');

    // wrong method error
} else {
    $errors[] = 'wrong method';
    $_SESSION['errors'] = $errors;
    redirect('../../index.php');
}
