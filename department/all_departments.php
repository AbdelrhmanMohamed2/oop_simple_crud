<?php

use JetBrains\PhpStorm\Deprecated;

require_once '../inc/header.php';

require_once 'Department.php';
$all_departments = new Department();
$result = $all_departments->getAllDepartments();


?>
<?php require_once '../inc/nav.php' ?>
<div class="container m-5">
    <div class="row">
        <div class="col-12">
            <h1>Departments</h1>
            <h4>All Departments in the Company</h4>

            <hr>
            <?php require_once '../inc/massages.php' ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#department id</th>
                        <th scope="col">Department Name</th>
                        <th scope="col">N. of Employee</th>
                        <th scope="col">Operations</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($department = mysqli_fetch_assoc($result)) : ?>
                        <tr>
                            <th scope="row"><?= $department['department_id'] ?></th>
                            <td><?= $department['department_name'] ?></td>
                            <td><?= $department['number_of_employee'] ?></td>
                            <td>
                                <a href="update_department.php?id=<?= $department['department_id'] ?>" class="btn btn-warning mx-3">Edit</a>
                                <a href="handlers/delete_dep.php?id=<?= $department['department_id'] ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require_once '../inc/footer.php' ?>