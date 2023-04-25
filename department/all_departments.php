<?php require_once '../inc/header.php' ?>
<?php require_once '../inc/nav.php' ?>
<div class="container m-5">
    <div class="row">
        <div class="col-12">
            <h1>Departments</h1>
            <h4>All Departments in the Company</h4>

            <hr>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#department id</th>
                        <th scope="col">Department Name</th>
                        <th scope="col">Operations</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>BackEnd</td>
                        <td>
                            <a href="" class="btn btn-warning mx-3">Edit</a>
                            <a href="" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require_once '../inc/footer.php' ?>