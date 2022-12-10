<?php
session_start();
// if (!isset($_SESSION["roles"]) || (isset($_SESSION["roles"]) && $_SESSION["roles"] !== 1))
//     header("Location: ../index.php");
print_r($_SESSION);
$name = isset($_SESSION["userName"]) ? $_SESSION["userName"] : "Anonymous"; //ternary operator
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
    <div class="row">
        <div class="col-md-10"></div>
        <div class="col-md-2">
            <span style="color:purple;"><?php echo "Hello $name"; ?></span>
            <?php
            isset($_SESSION["userName"]) ? print '<form method="POST" action="./logout.php">
                <button class="btn btn-warning" type="submit" name="submit">Logout</button>
            </form>' :
                print '<form method="POST" action="./login.php">
                <button class="btn btn-warning" type="submit" name="submit">Log in</button>
            </form>';

            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 mt-5">

            <?=
            isset($_SESSION["userName"]) ?
                "<h1 style='
                text-align: center;
                background-color:skyblue;
                color:red;
                padding:10px;
                border:5px double red;
                border-radius:5px;
                box-shadow:3px 3px 8px gray;'>$name Page</h1>" :
                "<h1 style='
                text-align: center;
                background-color:purple;
                color:white;
                padding:10px;
                border:5px double white;
                border-radius:5px;
                box-shadow:3px 3px 8px gray;'>Try to login</h1>";
            ?>
            </h1>
        </div>
        <div class="col-md-4"></div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>