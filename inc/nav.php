<?php

define('URL', 'http://localhost/phpCourse/oop/L1/oop_simple_crud/');
define('ROOT', 'C:/xampp/htdocs/phpCourse/oop/L1/oop_simple_crud/');

?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= URL ?>">OOP CRUD</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?= URL ?>department/all_departments.php">All Departments</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>employee/add_emp.php">Add Employee</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>department/add_department.php">Add Department</a>
                </li>

            </ul>

        </div>
    </div>
</nav>