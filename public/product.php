<?php
require_once __DIR__ . '/../src/init.php';
require_once __DIR__ . '/../src/partials/head_css.php';
require_once __DIR__ . '/../public/actions/displayDedicatedProduct.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/products.css">
    <title>TechShop - Our Products</title>
    <style>
        body {
            width: 100vw;
            height: 90vh;
        }
    </style>
</head>

<body>
    <?php require_once __DIR__ . '/../src/partials/menu.php'; ?>
    <?php require_once __DIR__ . '/../src/partials/show_error.php'; ?>

    <div id="container-PD" class="container">
        <div id="img-PD"></div>
        <div id="infos-PD">
            <?= DisplayDedicatedProduct($_GET["product"], $_GET["category"]) ?>
            <a href="./login.php"></a>
        </div>
    </div>
</body>

</html>