<?php require_once '../inc/header.php' ?>
<?php
require_once '../functions/functions.php';
require_once 'Employee.php';
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    redirect('../index.php');
}
$emp = new Employee();
$emp->employee_id = $_GET['id'];
$data = $emp->getInfo();
if (!$data) {
    redirect('../index.php');
}


?>
<?php require_once '../inc/nav.php' ?>
<div class="container m-5">
    <div class="row">
        <div class="col-12">
            <h1>Update Employee</h1>
            <hr>
            <?php require_once ROOT . 'inc/massages.php' ?>

            <form class="m-5" method="POST" action="handlers/edit_emp.php">

                <div class="mb-3">
                    <label for="emp_name" class="form-label">Emp Name</label>
                    <input type="text" value="<?= $data[0]['name'] ?>" name="emp_name" class="form-control" id="emp_name">
                </div>

                <div class="mb-3">
                    <label for="emp_email" class="form-label">Emp Email</label>
                    <input type="email" value="<?= $data[0]['email'] ?>" name="emp_email" class="form-control" id="emp_email">
                </div>

                <div class="mb-3">
                    <label for="emp_password" class="form-label">Emp Password</label>
                    <input type="password" name="emp_password" class="form-control" id="emp_password">
                    <input type="text" hidden name="emp_id" value="<?= $_GET['id'] ?>">
                </div>




                <select class="form-select mb-3" name="emp_department">
                    <option <?php if ($data[0]['department_id'] === 1) : ?> selected <?php endif ?>value="1">IT</option>
                    <option <?php if ($data[0]['department_id'] === 2) : ?> selected <?php endif ?> value="2">CS</option>
                </select>

                <button type="submit" class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
</div>
<?php require_once '../inc/footer.php' ?>