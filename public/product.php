<?php
require_once __DIR__ . '/../src/init.php';
require_once __DIR__ . '/../public/actions/displayProducts.php';
require_once __DIR__ . '/../public/actions/displayDedicateProduct.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/products.css">
    <title>TechShop - Our Products</title>
    <style>body{width: 100vw;height: 90vh;}</style>
    <?php require_once __DIR__ . '/../src/partials/head_css.php'; ?>
</head>

<body>
    <?php require_once __DIR__ . '/../src/partials/menu.php'; ?>
    <?php require_once __DIR__ . '/../src/partials/show_error.php'; ?>

    <div id="container-PD" class="container">
        <div id="img-PD"></div>
        <div id="infos-PD">
            <!-- <p id="name-PD">Clavier</p>
            <p id="type-PD">Accessoire</p>
            <hr>
            <p id="price-PD">20 €</p>
            <p id="quantity-PD"><span>18</span> en stock</p>
            <button id="addCart-PD">Ajouter au panier</button>
            <hr>
            <p>Liste des avis :</p> -->
            
            <?= displayDediProduct($_POST["id"]) ?>
            <a href="./login.php"></a>
        </div>
    </div>
</body>

</html>