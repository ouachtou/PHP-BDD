<?php
require_once __DIR__ . '/../src/init.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechShop - Home</title>
    <?php require_once __DIR__ . '/../src/partials/head_css.php'; ?>
</head>

<body>
    <?php require_once __DIR__ . '/../src/partials/menu.php'; ?>
    <?php require_once __DIR__ . '/../src/partials/show_error.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Hello</h1>
                <div class="alert alert-success">
                    Welcome to TechShop !
                </div>
            </div>
        </div>
    </div>
    

</body>

</html>