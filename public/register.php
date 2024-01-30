<?php
require_once __DIR__ . '/../src/init.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap-5.3.2-dist/css/style.css">
    <title>Register</title>
</head>

<body>
    <?php require_once __DIR__ . '/../src/partials/menu.php'; ?>
    <?php require_once __DIR__ . '/../src/partials/show_error.php'; ?>

    <div class="form_box">
        <form action="/actions/register.php" method="post">
            <div>
                <input placeholder="E-mail" type="text" name="email" id="email">
            </div>
            <div>
                <input placeholder="password" type="password" name="password" id="password">
            </div>
            <div>
                <input placeholder="Confirm Password" type="cpassword" name="cpassword" id="cpassword">
            </div>
            <div>
                <input placeholder="first_name" type="first_name" name="first_name" id="first_name">
            </div>
            <div>
                <input placeholder="first_name" type="name" name="name" id="name">
            </div>
            <div>
                <input placeholder="adress" type="adress" name="adress" id="adress">
            </div>
            <div>
                <button type="submit">Register NOW!</button>
            </div>
        </form>
    </div>
</body>

</html>