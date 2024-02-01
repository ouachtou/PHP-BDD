<?php
// Inclusion du fichier d'initialisation
require_once __DIR__ . '/../src/init.php';
// Inclusion du fichier de styles CSS pour l'en-tête
require_once __DIR__ . '/../src/partials/head_css.php';
// Inclusion du script d'affichage du produit dédié
require_once __DIR__ . '/../public/actions/displayDedicatedProduct.php';
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
</body>

</html>
