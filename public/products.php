<?php
require_once __DIR__ . '/../src/init.php';
require_once __DIR__ . '/../public/actions/displayProducts.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/bootstrap-5.3.2-dist/css/products.css">
    <title>TechShop - Our Products</title>
    <?php require_once __DIR__ . '/../src/partials/head_css.php'; ?>
</head>

<body>
    <?php require_once __DIR__ . '/../src/partials/menu.php'; ?>
    <?php require_once __DIR__ . '/../src/partials/show_error.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="cardsContainer">
                    <?= displayProduct() ?>
                    <?= displayProduct() ?>
                    <?= displayProduct() ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>