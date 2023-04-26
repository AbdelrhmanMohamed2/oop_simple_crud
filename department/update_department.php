<?php require_once '../inc/header.php';
require_once 'Department.php';
$department = new Department();
$department->department_id = $_GET['id'];

?>
<?php require_once '../inc/nav.php' ?>
<div class="container m-5">
    <div class="row">
        <div class="col-12">
            <h1>Update Department</h1>
            <hr>
            <?php require_once '../inc/massages.php' ?>

            <form class="m-5" method="POST" action="handlers/update_dep.php">

                <div class="mb-3">
                    <label for="depart_name" class="form-label">Department Name</label>
                    <input type="text" value="<?= $department->getInfo()[0]['name'] ?>" name="depart_name" class="form-control" id="depart_name">
                    <input type="number" value="<?= $department->getInfo()[0]['id'] ?>" name="depart_id" hidden>
                </div>


                <button type="submit" class="btn btn-success">Edit</button>
            </form>
        </div>
    </div>
</div>
<?php require_once '../inc/footer.php' ?>