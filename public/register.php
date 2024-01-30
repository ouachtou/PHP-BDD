<?php
require_once __DIR__ . '/../src/init.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <?php require_once __DIR__ . '/../src/partials/menu.php'; ?>
    <?php require_once __DIR__ . '/../src/partials/show_error.php'; ?>

    <form action="/actions/register.php" method="post">
        <div>
            <label for="email">Email:</label>
            <input type="text" name="email" id="email">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <label for="cpassword">Confirm Password:</label>
            <input type="cpassword" name="cpassword" id="cpassword">
        </div>
        <div>
            <label for="first_name">first_name:</label>
            <input type="first_name" name="first_name" id="first_name">
        </div>
        <div>
            <label for="name">name:</label>
            <input type="name" name="name" id="name">
        </div>
        <div>
            <label for="adress">adress:</label>
            <input type="adress" name="adress" id="adress">
        </div>
        <div>
            <button type="submit">Register NOW!</button>
        </div>
    </form>
</body>

</html>