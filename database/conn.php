<?php

define('HOST_NAME', 'localhost');
define('USER_NAME', 'root');
define('PASSWORD', '');
define('DATA_BASE', 'oop_crud');

// ##################################################
// create the data base to start
function createDataBase()
{
    $conn = mysqli_connect(HOST_NAME, USER_NAME, PASSWORD);
    $sql = 'CREATE DATABASE IF NOT EXISTS ' . DATA_BASE;

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
// ##################################################


// ##################################################
// create the data base to start
function getConnection()
{
    $conn = mysqli_connect(HOST_NAME, USER_NAME, PASSWORD, DATA_BASE);
    return $conn;
}
// ##################################################


// ##################################################
// create the data base to start
function createTables()
{
    $conn = getConnection();

    $tables = [
        'departments' => 'CREATE TABLE IF NOT EXISTS `departments` (
            `id` INT PRIMARY KEY AUTO_INCREMENT, 
            `name` VARCHAR(50) NOT NULL
        );',
        'employees' => 'CREATE TABLE IF NOT EXISTS `employees` (
            `id` INT PRIMARY KEY AUTO_INCREMENT, 
            `name` VARCHAR(50) NOT NULL, 
            `email` VARCHAR(50) NOT NULL UNIQUE, 
            `password` VARCHAR(50) NOT NULL, 
            `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, 
            `department_id` INT NOT NULL, 
            FOREIGN KEY (`department_id`) REFERENCES `departments`(`id`)
        );'
    ];

    foreach ($tables as $table) {
        var_dump(mysqli_query($conn, $table));
    }
    mysqli_close($conn);
}
// ##################################################


// ##################################################
// start the project 
function startProject()
{
    createDataBase();
    createTables();
}
// ##################################################

startProject();
