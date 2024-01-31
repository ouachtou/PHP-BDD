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
                <input placeholder="E-mail" type="email" name="email" id="email">
            </div>
            <div>
                <input placeholder="Password" type="password" name="password" id="password">
            </div>
            <div>
                <input placeholder="Confirm Password" type="password" name="cpassword" id="cpassword">
            </div>
            <div>
                <input placeholder="First name" type="text" name="first_name" id="first_name">
            </div>
            <div>
                <input placeholder="Name" type="text" name="name" id="name">
            </div>
            <div>
                <input placeholder="adress" type="text" name="adress" id="adress">
            </div>
            <div>
                <button type="submit">Register NOW!</button>
            </div>
        </form>
    </div>
</body>

</html>