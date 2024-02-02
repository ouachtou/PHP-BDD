<?php
// Inclusion du fichier d'initialisation
require_once __DIR__ . '/../src/init.php';
// Inclusion du script d'affichage des produits
require_once __DIR__ . '/../public/actions/displayProducts.php';
// Inclusion du fichier de styles CSS pour l'en-tête
require_once __DIR__ . '/../src/partials/head_css.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/products.css">
    <title>TechShop - Our Products</title>
</head>

<body>
    <?php
    // Inclusion du menu
    require_once __DIR__ . '/../src/partials/menu.php';
    // Inclusion du gestionnaire d'erreurs
    require_once __DIR__ . '/../src/partials/show_error.php';
    ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <!-- Formulaire de recherche -->
                <div class="search_container">
                    <form action="productsList.php" method="POST">
                        <input name="search" type="text" placeholder="Rechercher ...">
                        <input type="submit" value="Search">
                    </form>
                </div>
                <!-- Conteneur des cartes de produits -->
                <div class="cardsContainer">
                    <?= DisplayProducts($pdo) ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>