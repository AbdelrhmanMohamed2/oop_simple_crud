<?php require_once 'inc/header.php' ?>
<?php
require_once 'employee/Employee.php';
$emp = new Employee();
$result = $emp->getAllEmployee();

?>
<?php require_once 'inc/nav.php' ?>
<div class="container m-5">
    <div class="row">
        <div class="col-12">
            <h1>Home Page</h1>
            <h4>All Employees in the Company</h4>
            <hr>
            <?php require_once 'inc/massages.php' ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#emp id</th>
                        <th scope="col">Employee Name</th>
                        <th scope="col">Employee Email</th>
                        <th scope="col">Employee Password</th>
                        <th scope="col">Employee Department</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Operations</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($employee = mysqli_fetch_assoc($result)) : ?>
                        <tr>
                            <th scope="row"><?= $employee['employee_id'] ?></th>
                            <td><?= $employee['employee_name'] ?></td>
                            <td><?= $employee['email'] ?></td>
                            <td><?= $employee['password'] ?></td>
                            <td><?= $employee['department_name'] ?></td>
                            <td><?= $employee['created_at'] ?></td>
                            <td>
                                <a href="<?= URL ?>employee/update_emp.php?id=<?= $employee['employee_id'] ?>" class="btn btn-warning mx-3">Edit</a>
                                <a href="<?= URL ?>employee/handlers/delete_emp.php?id=<?= $employee['employee_id'] ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require_once 'inc/footer.php' ?>