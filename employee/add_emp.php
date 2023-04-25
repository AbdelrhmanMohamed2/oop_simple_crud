<?php require_once '../inc/header.php' ?>
<?php require_once '../inc/nav.php' ?>
<div class="container m-5">
    <div class="row">
        <div class="col-12">
            <h1>Add New Employee</h1>
            <hr>
            <form class="m-5">

                <div class="mb-3">
                    <label for="emp_name" class="form-label">Emp Name</label>
                    <input type="text" name="emp_name" class="form-control" id="emp_name">
                </div>

                <div class="mb-3">
                    <label for="emp_email" class="form-label">Emp Email</label>
                    <input type="email" name="emp_email" class="form-control" id="emp_email">
                </div>


                <div class="mb-3">
                    <label for="emp_password" class="form-label">Emp Password</label>
                    <input type="password" name="emp_password" class="form-control" id="emp_password">
                </div>

                <select class="form-select mb-3" name="department">
                    <option selected>Choose Department</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>

                <button type="submit" class="btn btn-success">Add</button>
            </form>
        </div>
    </div>
</div>
<?php require_once '../inc/footer.php' ?>