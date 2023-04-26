<?php require_once '../inc/header.php' ?>
<?php require_once '../inc/nav.php' ?>
<div class="container m-5">
    <div class="row">
        <div class="col-12">
            <h1>Add New Department</h1>
            <hr>
            <?php require_once '../inc/massages.php' ?>

            <form class="m-5" method="POST" action="handlers/create_dep.php">

                <div class="mb-3">
                    <label for="depart_name" class="form-label">Department Name</label>
                    <input type="text" name="depart_name" class="form-control" id="depart_name">
                </div>


                <button type="submit" class="btn btn-success">Add</button>
            </form>
        </div>
    </div>
</div>
<?php require_once '../inc/footer.php' ?>