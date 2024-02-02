<?php
// Inclusion du fichier d'initialisation
require_once __DIR__ . '/../src/init.php';
// Inclusion du fichier de styles CSS pour l'en-tête
require_once __DIR__ . '/../src/partials/head_css.php';
// Inclusion du script d'affichage du produit dédié
require_once __DIR__ . '/../public/actions/displayDedicatedProduct.php';

$select = $pdo->prepare('SELECT * FROM Products WHERE name = ? AND type = ?');
$select->execute([$_GET["product"], $_GET["category"]]);

$prod = $select->fetch();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/products.css">
    <title>TechShop - <?= $_GET["product"] ?></title>
    <style>
        body {
            width: 100vw;
            height: 90vh;
        }
    </style>
</head>

<body>
    <?php
    // Inclusion du menu
    require_once __DIR__ . '/../src/partials/menu.php';
    // Inclusion du gestionnaire d'erreurs
    require_once __DIR__ . '/../src/partials/show_error.php';
    ?>

    <div id="container-PD" class="container">
        <!-- Affichage du produit dédié -->
        <?= DisplayDedicatedProduct($pdo, $_GET["product"], $_GET["category"]) ?>
    </div>
    <div id="container-PD" class="container">
        <?php if ($user['admin']) { ?>

            <form action="/actions/modifyProduct.php" method="post">
                <input type="hidden" name="id" value="<?= $prod['id'] ?>">
                <div>
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" value="<?= $prod['name'] ?>">
                </div>
                <div>
                    <label for="type">Type:</label>
                    <input type="text" name="type" id="type" value="<?= $prod['type'] ?>">
                </div>
                <div>
                    <label for="price">Price:</label>
                    <input type="text" name="price" id="price" value="<?= $prod['price'] ?>">
                </div>
                <div>
                    <label for="quantity">Quantity:</label>
                    <input type="text" name="quantity" id="quantity" value="<?= $prod['quantity'] ?>">
                </div>
                <div>
                    <label for="reduction">Reduction:</label>
                    <input type="text" name="reduction" id="reduction" value="<?= $prod['reduction'] ?>">
                </div>
                <div>
                    <button type="submit">Modify</button>
                </div>
            </form>
        <?php } ?>

        <form action="./actions/deleteProduct.php">
            <input type="hidden" name="id" value="<?= $prod['id'] ?>">
            <button type="submit">
                <img style="width: 50px;" src="https://cdn-icons-png.flaticon.com/512/9790/9790368.png" alt="">
            </button>
        </form>

    </div>


</body>

</html>