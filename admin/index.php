<?php
session_start();
if (!isset($_SESSION["roles"]) || (isset($_SESSION["roles"]) && $_SESSION["roles"] !== 1))
    header("Location: ../user/index.php");
print_r($_SESSION);
echo gettype($_SESSION["roles"]);
$name = $_SESSION["userName"]
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>
    <div class="container mt-5">

        <form method="POST" action="../logout.php" class="d-flex">
            <span style="color:purple; margin:auto;margin-right:10px;"><?php echo "Hello $name"; ?></span>
            <button class="btn btn-warning" type="submit" name="submit">Logout</button>
        </form>
        <form class="row g-3 needs-validation" id="userData" novalidate>
            <div class="col-3"></div>
            <div class="col-md-2">
                <label for="userName" class="form-label">User Name</label>
                <input type="text" class="form-control" id="userName" name="userName" placeholder="User Name" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-2">
                <label for="pass" class="form-label">Password</label>
                <input type="password" class="form-control" id="pass" name="pass" placeholder="Password" autocomplete="false" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-2">
                <label for="roles" class="form-label">Roles</label>
                <select class="form-select" id="roles" name="roles" required>
                    <option selected disabled value="">Choose...</option>
                    <option value="1">Admin</option>
                    <option value="2">User</option>
                </select>
                <div class="invalid-feedback">
                    Please select a valid state.
                </div>
            </div>
            <div class="col-3"></div>
            <div class="col-4"></div>
            <div class="col-2">
                <input class="btn btn-warning mt-2" type="button" name="addUser" id="addUser" value="Add User">
            </div>
            <div class="col-2">
                <input class="btn btn-info mt-2" type="button" name="userDetails" id="userDetails" value="Users Details">
            </div>
            <div class="col-4"></div>
        </form>
        <div id="resInfo"></div>
        <!-- table -->
        <table class="table table-bordered border-warning mt-5 w-50 m-auto text-center">
            <thead>
                <th>User Name</th>
                <th>Password</th>
                <th>Roles</th>
                <th>Action</th>
            </thead>
            <tbody id="details"></tbody>
            <!-- <tfoot>
                <th colspan="2">Total</th>
                <th colspan="2"></th>
            </tfoot> -->
        </table>
    </div>
    <script src="../js/app.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script>
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>

</html>