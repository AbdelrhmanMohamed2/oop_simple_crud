<?php require_once 'inc/header.php' ?>
<?php require_once 'inc/nav.php' ?>
<div class="container m-5">
    <div class="row">
        <div class="col-12">
            <h1>Home Page</h1>
            <h4>All Employees in the Company</h4>
            <hr>
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
                    <tr>
                        <th scope="row">1</th>
                        <td>Ali</td>
                        <td>Ali@mail.com</td>
                        <td>123456</td>
                        <td>Back End</td>
                        <td>2023</td>
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
<?php require_once 'inc/footer.php' ?>